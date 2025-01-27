<?php include("inc/connect.inc.php"); ?>
<?php
session_start();
// Fetch data from various tables
$menu_query = pg_query($conn, "SELECT * FROM sample_menu");
$users_query = pg_query($conn, "SELECT * FROM users");
$cart_query = pg_query($conn, "SELECT * FROM cart");
$bill_query = pg_query($conn, "SELECT * FROM bill");
$feedback_query = pg_query($conn, "SELECT * FROM feedback");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restaurant Database Test</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="assets/img/restaurant/favicon.ico" rel="icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .container {
            margin: auto;
            width: 80%;
            padding: 20px;
        }
    </style>
</head>

<body>
     <!-- Navbar & Hero Start -->
     
        <div class="container-xxl position-relative p-0">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
            <a href="../index.php" class="navbar-brand p-0">
                <h1 class="text-primary m-0 text-center ms-3"><i class="fa fa-utensils me-3"></i>Foodzy</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 pe-4">
                    <a href="../index.php" class="nav-item nav-link">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link">Service</a>
                    <a href="menu.php" class="nav-item nav-link active">Menu</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <a href="checkout.php" class="btn btn-primary py-2 px-4">PLACE ORDER</a>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Hero Header Start -->
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Restaurant Database</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Database</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Hero Header End -->

        <div class="container">
            <h2>Sample Menu</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Food Items</th>
                    <th>Is Breakfast</th>
                    <th>Is Lunch</th>
                    <th>Is Dinner</th>
                    <th>Is Veg</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Picture</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($menu_query)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['food_items']; ?></td>
                        <td><?php echo $row['is_breakfast'] ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $row['is_lunch'] ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $row['is_dinner'] ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $row['is_veg'] ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><img src="<?php echo $row['picture']; ?>" alt="Menu Item" style="width: 50px;"></td>
                    </tr>
                <?php } ?>
            </table>

            <h2>Users</h2>
            <table>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Phone Number</th>
                    <th>Email ID</th>
                    <th>Password Hash</th>
                    <th>Role</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($users_query)) { ?>
                    <tr>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['phone_number']; ?></td>
                        <td><?php echo $row['email_id']; ?></td>
                        <td><?php echo $row['password_hash']; ?></td>
                        <td><?php echo $row['role']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h2>Cart</h2>
            <table>
                <tr>
                    <th>Cart ID</th>
                    <th>User ID</th>
                    <th>Food ID</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($cart_query)) { ?>
                    <tr>
                        <td><?php echo $row['cart_id']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['food_id']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h2>Bill</h2>
            <table>
                <tr>
                    <th>Bill Number</th>
                    <th>Cart ID</th>
                    <th>User ID</th>
                    <th>Total Price</th>
                    <th>Date</th>
                    <th>By User</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($bill_query)) { ?>
                    <tr>
                        <td><?php echo $row['bill_number']; ?></td>
                        <td><?php echo $row['cart_id']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['total_price']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['by_user']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <h2>Feedback</h2>
            <table>
                <tr>
                    <th>User Name</th>
                    <th>Email ID</th>
                    <th>Profession</th>
                    <th>Message</th>
                    <th>Picture</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($feedback_query)) { ?>
                    <tr>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['email_id']; ?></td>
                        <td><?php echo $row['profession']; ?></td>
                        <td><?php echo $row['messages']; ?></td>
                        <td><img src="<?php echo $row['picture']; ?>" alt="Feedback Picture" style="width: 50px;"></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                    <a class="btn btn-link" href="about.php">About Us</a>
                    <a class="btn btn-link" href="contact.php">Contact Us</a>
                    <a class="btn btn-link" href="booking.php">Booking</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>PSG CT, Coimbatore</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 9965512345</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>foodzy@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                    <h5 class="text-light fw-normal">Monday - Saturday</h5>
                    <p>09AM - 09PM</p>
                    <h5 class="text-light fw-normal">Sunday</h5>
                    <p>10AM - 08PM</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                    <p>To get updates about Us: SUBSCRIBE</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Foodzy</a>, All Right Reserved.
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">22pts</a><br><br>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FAQs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php pg_close($conn); ?>