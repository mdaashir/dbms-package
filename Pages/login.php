<?php require __DIR__ . '/partials/header.php'; ?>
<?php require __DIR__ . '/partials/navbar.php'; ?>
<?php

function loginUser($conn) {
    if (isset($_POST['submit'])) {
        $email_or_phone = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email_or_phone) || empty($password)) {
            echo "<script>alert('Please fill out all fields.');</script>";
        } else {

            if (filter_var($email_or_phone, FILTER_VALIDATE_EMAIL)) {
                $condition = "email_id = '$email_or_phone'";
            } else {
                $condition = "phone_number = '$email_or_phone'";
            }

            $query = "SELECT * FROM users WHERE $condition";
            $result = pg_query($conn, $query);

            if ($result) {
                $row = pg_fetch_assoc($result);
                $hashed_password = $row['password_hash'];

                if (password_verify($password, $hashed_password)) {
                    $_SESSION['email_or_phone'] = $email_or_phone;
                    $_SESSION['role'] = $row['role'];
                    if ($_SESSION['role'] == 'admin') {
                        echo "<script>alert('Admin inserted successfully');</script>";
                        // header("Location: admin_homepage.php");
                    } else {
                        echo "<script>alert('Data inserted successfully');</script>";
                        // header("Location: ../index.php");
                    }
                    exit();
                } else {
                    echo "<script>alert('Incorrect email/phone number or password.');</script>";
                }
            } else {
                echo "<script>alert('Error accessing database.');</script>";
            }
        }
    }
}
?>
        <!-- Login Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Login</h5>
                    <h1 class="mb-5">Welcome Back</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6 wow slideLeft" data-wow-delay="0.1s">
                        <div class="position-relative bg-white rounded-top p-5">
                            <div class="d-flex align-items-center justify-content-center bg-primary mb-5 w-100 rounded-circle" style="height: 150px;">
                                <i class="fa fa-user-edit fa-3x text-white"></i>
                            </div>
                            <h3 class="mb-4">Customer Login</h3>
                            <form method="post" action="">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Your Email">
                                    <label for="email">Email address</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-lg" name="submit" type="submit">Login</button>
                                    <!-- ON CLICKING LOGIN DATA MUST BE ADDED CHECK AND THEN IF IT IS ADMIN ..Goto admin homepage else ../index.php -->
                                </div>
                                <br>

                                <p class="mb">   New User ?...  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                                <a class="section-title ff-secondary text-center text-primary fw-normal" href="signup.php">Sign Up</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login End -->

<?php require __DIR__ . '/partials/footer.php'; ?>
