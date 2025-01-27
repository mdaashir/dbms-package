<?php require __DIR__ . '/partials/header.php'; ?>
<?php require __DIR__ . '/partials/navbar.php'; ?>
<?php

if (!isset($_SESSION['username']) || $_SESSION['role'] === 'admin') {
}
else {
	header("location: ../index.php");
}

use Services\UserService;

if (isset($_POST['submit_user'])){

        $user_name = $_POST['user_name'];
        $email_id = $_POST['email_id'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $password_hash = $_POST['confirmPassword'];
        $role = $_POST['role'] ?? '';

        if (empty($user_name) || empty($phone_number) || empty($password_hash) || empty($password) || empty($email_id)) {
            echo "<script>alert('Please fill out all fields.');</script>";
            return;
        }

        if ($password !== $password_hash) {
            echo "<script>alert('Passwords do not match. Please try again.');</script>";
            return;
        }
        $data = [
            'user_name' => $user_name,
            'phone_number' => $phone_number,
            'email_id' => $email_id,
            'password_hash' => $password_hash,
            'role' => $role ?? ''
        ];

        try {
            $result = UserService::createUser($data);
        } catch (Exception $e) {
            echo "<script>alert('Error inserting data');</script>";
        }

        if ($result) {
            // echo "<script>alert('Data inserted successfully');</script>";
            $_SESSION['username'] = $user_name;
            $_SESSION['uid'] = $result->id;
            $_SESSION['role'] = $role ?? $result->role;
            header("Location: ../index.php");
        } else {
            echo "<script>alert('Error inserting data');</script>";
        }
    }
?>
        <!-- Sign Up Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal mb-4">Sign Up</h5>
                    <h1 class="mb-5">Create Your Account</h1>
                </div>
                <div class="row g-5 justify-content-center">
                    <div class="col-lg-6 wow slideLeft" data-wow-delay="0.1s">
                        <div class="position-relative bg-white rounded-top p-5">
                            <div class="d-flex align-items-center justify-content-center bg-primary mb-5 w-100 rounded-circle" style="height: 150px;">
                                <i class="fa fa-user-edit fa-3x text-white"></i>
                            </div>
                            <h3 class="mb-4">Customer Registration</h3>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username">
                                    <label for="user_name">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="email_id" name="email_id" placeholder="Your Email">
                                    <label for="email_id">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number">
                                    <label for="">Phone Number</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                                    <label for="confirmPassword">Confirm Password</label>
                                </div>

                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-lg" name="submit_user" type="submit">Register</button>
                                </div>
                            </form>
                            <br>
                            <p class="mb">   Existing User ?...  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                            <a class="section-title ff-secondary text-center text-primary fw-normal" href="login.php">Login</a>
                            </p>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
        <!-- Sign Up End -->
<?php require __DIR__ . '/partials/footer.php'; ?>