<?php include ( "inc/connect.inc.php" ); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Foodzy</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Favicon -->
	<link href="img/restaurant/favicon.ico" rel="icon">
	<link rel="apple-touch-icon" sizes="180x180" href="img/restaurant/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/restaurant/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/restaurant/favicon-16x16.png">
	<link rel="manifest" href="img/restaurant/site.webmanifest">


	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

	<!-- Icon Font Stylesheet -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="lib/animate/animate.min.css" rel="stylesheet">
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

	<!-- Customized Bootstrap Stylesheet -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Template Stylesheet -->
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


		<!-- Navbar & Hero Start -->
		<div class="container-xxl position-relative p-0">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
				<a href="" class="navbar-brand p-0">
					<h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Foodzy</h1>
					<!-- <img src="img/logo.png" alt="Logo"> -->
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
					<span class="fa fa-bars"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<div class="navbar-nav ms-auto py-0 pe-4">
						<a href="index.html" class="nav-item nav-link active">Home</a>
						<a href="about.html" class="nav-item nav-link">About</a>
						<a href="service.html" class="nav-item nav-link">Service</a>
						<a href="menu.html" class="nav-item nav-link">Menu</a>
						<div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
							<div class="dropdown-menu m-0">
								<a href="booking.html" class="dropdown-item">Booking</a>
								<a href="checkout.html" class="dropdown-item">Your Orders</a>
								<a href="team.html" class="dropdown-item">Our Team</a>
								<a href="testimonial.html" class="dropdown-item">Testimonial</a>
							</div>
						</div>
						<a href="contact.html" class="nav-item nav-link">Contact</a>
					</div>
					<a href="booking.html" class="btn btn-primary py-2 px-4">ORDER NOW</a>&nbsp;&nbsp;
					<a href="login.html" class="btn btn-primary py-2 px-4">LOGIN/SIGNUP</a>
				</div>
			</nav>

			<div class="container-xxl py-5 bg-dark hero-header mb-5">
				<div class="container my-5 py-5">
					<div class="row align-items-center g-5">
						<div class="col-lg-6 text-center text-lg-start">
							<!--ADD THIS AFTER USER LOGIN/SIGNUP <h3 class="display-3 text-white animated slideInLeft" >Hi Username !</h3> -->

							<h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
							<!-- <p class="text-white animated slideInLeft mb-4 pb-2">Welcome to FOODZY :)</p> -->
							<!-- <a href="" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">ORDER NOW</a> -->
						</div>
						<div class="col-lg-6 text-center text-lg-end overflow-hidden">
							<img class="img-fluid" src="img/heroo.png" alt="" width="70%">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Navbar & Hero End -->


		<!-- Service Start -->
		<div class="container-xxl py-5">
			<div class="container">
				<div class="row g-4">
					<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
						<div class="service-item rounded pt-3">
							<div class="p-4">
								<i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
								<h5>Experienced Chefs</h5>
								<p>Our master chefs bring years of experience and expertise to create culinary delights that satisfy your taste buds.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
						<div class="service-item rounded pt-3">
							<div class="p-4">
								<i class="fa fa-3x fa-utensils text-primary mb-4"></i>
								<h5>Quality Ingredients</h5>
								<p>We use only the finest and freshest ingredients to ensure that every dish we serve is of the highest quality and taste.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
						<div class="service-item rounded pt-3">
							<div class="p-4">
								<i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
								<h5>Convenient Online Ordering</h5>
								<p>Enjoy the convenience of placing your order online from the comfort of your home or on the go, and have it delivered to your doorstep.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
						<div class="service-item rounded pt-3">
							<div class="p-4">
								<i class="fa fa-3x fa-headset text-primary mb-4"></i>
								<h5>24/7 Customer Support</h5>
								<p>Our dedicated customer support team is available round-the-clock to assist you with any inquiries or concerns you may have.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Service End -->


		<!-- About Start -->
		<div class="container-xxl py-5">
			<div class="container">
				<div class="row g-5 align-items-center">
					<div class="col-lg-6">
						<div class="row g-3">
							<div class="col-6 text-start">
								<img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
							</div>
							<div class="col-6 text-start">
								<img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
							</div>
							<div class="col-6 text-end">
								<img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
							</div>
							<div class="col-6 text-end">
								<img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
						<h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Foodzy</h1>
						<p class="mb-4">We welcome you to Foodzy, where culinary excellence meets exceptional service. Our passion for food is matched only by our commitment to delivering an unforgettable dining experience to every guest.</p>
						<p class="mb-4">At Foodzy, we believe in using the freshest ingredients, innovative cooking techniques, and meticulous attention to detail to create dishes that delight the senses and leave a lasting impression.</p>
						<div class="row g-4 mb-4">
							<div class="col-sm-6">
								<div class="d-flex align-items-center border-start border-5 border-primary px-3">
									<h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">10</h1>
									<div class="ps-4">
										<p class="mb-0">Years of</p>
										<h6 class="text-uppercase mb-0">Experience</h6>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="d-flex align-items-center border-start border-5 border-primary px-3">
									<h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">30</h1>
									<div class="ps-4">
										<p class="mb-0">Dedicated</p>
										<h6 class="text-uppercase mb-0">Master Chefs</h6>
									</div>
								</div>
							</div>
						</div>
						<a class="btn btn-primary py-3 px-5 mt-2" href="about.html">Read More</a>
					</div>
				</div>
			</div>
		</div>
		<!-- About End -->

		<!-- Menu Start -->
		<div class="container-xxl py-5">
			<div class="container">
				<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
					<h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
					<h1 class="mb-5">Most Popular Items</h1>
				</div>
				<div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
					<ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
						<li class="nav-item">
							<a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
								<i class="fa fa-coffee fa-2x text-primary"></i>
								<div class="ps-3">
									<small class="text-body">Popular</small>
									<h6 class="mt-n1 mb-0">Breakfast</h6>
								</div>
							</a>
						</li>
						<li class="nav-item">
							<a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
								<i class="fa fa-hamburger fa-2x text-primary"></i>
								<div class="ps-3">
									<small class="text-body">Special</small>
									<h6 class="mt-n1 mb-0">Lunch</h6>
								</div>
							</a>
						</li>
						<li class="nav-item">
							<a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
								<i class="fa fa-utensils fa-2x text-primary"></i>
								<div class="ps-3">
									<small class="text-body">Lovely</small>
									<h6 class="mt-n1 mb-0">Dinner</h6>
								</div>
							</a>
						</li>
					</ul>
					<div class="tab-content">

<?php
// Call the stored procedure
$result = pg_query($conn, "SELECT * FROM sample_menu WHERE is_breakfast = true;");

if (!$result) {
	echo "Failed to execute the query: " . pg_last_error($conn);
    exit;
    }
?>

						<div id="tab-1" class="tab-pane fade show p-0 active">
							<div class="row g-4">
								<div class="col-lg-6">
									<div class="d-flex align-items-center">
										<img class="flex-shrink-0 img-fluid rounded" src="img/menu-8.jpg" alt="" style="width: 80px;">
										<div class="w-100 d-flex flex-column text-start ps-4">
											<h5 class="d-flex justify-content-between border-bottom pb-2">
												<span>'. $row['food_items'] .'</span>
												<span class="text-primary">$'. $row['price'] .'</span>
											</h5>
											<small class="fst-italic">'. $row['description'] .'</small>
										</div>
									</div>
								</div>
							</div>
						</div>
	}
						<div id="tab-2" class="tab-pane fade show p-0">
							<div class="row g-4">';

	if ($row['is_lunch']) {								
						echo'	<div class="col-lg-6">
									<div class="d-flex align-items-center">
										<img class="flex-shrink-0 img-fluid rounded" src="img/menu-8.jpg" alt="" style="width: 80px;">
										<div class="w-100 d-flex flex-column text-start ps-4">
											<h5 class="d-flex justify-content-between border-bottom pb-2">
												<span>'. $row['food_items'] .'</span>
												<span class="text-primary">$'. $row['price'] .'</span>
											</h5>
											<small class="fst-italic">'. $row['description'] .'</small>
										</div>
									</div>
								</div>';
	}
	
				echo'		</div>
						</div>
						<div id="tab-3" class="tab-pane fade show p-0">
							<div class="row g-4">';

	if ($row['is_dinner']) {								
						echo'	<div class="col-lg-6">
									<div class="d-flex align-items-center">
										<img class="flex-shrink-0 img-fluid rounded" src="img/menu-1.jpg" alt="" style="width: 80px;">
										<div class="w-100 d-flex flex-column text-start ps-4">
											<h5 class="d-flex justify-content-between border-bottom pb-2">
												<span>'. $row['food_items'] .'</span>
												<span class="text-primary">$'. $row['price'] .'</span>
											</h5>
											<small class="fst-italic">'. $row['description'] .'</small>
										</div>
									</div>
								</div>' ;
	}
								
				echo'		</div>
						</div>';
	}
?>						
					</div>
				</div>
			</div>
			<a class="btn btn-primary py-3 px-5 mt-2" href="menu.html">See More</a>
		</div>
		<!-- Menu End -->


		<!-- Booking Start -->
		<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
			<div class="row g-0">
				<div class="col-md-6">
					<div class="video">
						<button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/FeNH01zxkwA?si=nSK0ttDllg5gl3IY" data-bs-target="#videoModal">
							<span></span>
						</button>
					</div>
				</div>
				<div class="col-md-6 bg-dark d-flex align-items-center">
					<div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
						<h5 class="section-title ff-secondary text-start text-primary fw-normal">Booking</h5>
						<h1 class="text-white mb-4">ORDER NOW Online</h1>
						<form>
							<div class="row g-3">
								<div class="col-md-6">
									<div class="form-floating">
										<input type="text" class="form-control" id="name" placeholder="Your Name">
										<label for="name">Your Name</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-floating">
										<input type="email" class="form-control" id="email" placeholder="Your Email">
										<label for="email">Your Email</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-floating date" id="date3" data-target-input="nearest">
										<input type="text" class="form-control datetimepicker-input" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
										<label for="datetime">Date & Time</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-floating">
										<select class="form-select" id="select1">
											<option value="1">type 1</option>
											<option value="2">type 2</option>
											<option value="3">type 3</option>
										</select>
										<label for="select1">Select Type</label>
									</div>
								</div>
								<div class="col-12">
									<div class="form-floating">
										<textarea class="form-control" placeholder="Special Request" id="message" style="height: 100px"></textarea>
										<label for="message">Special Request</label>
									</div>
								</div>
								<div class="col-12">
									<button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content rounded-0">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<!-- 16:9 aspect ratio -->
						<div class="ratio ratio-16x9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/FeNH01zxkwA?si=nSK0ttDllg5gl3IY" id="video" allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Booking Stop -->

		<!-- Team Start -->
		<div class="container-xxl pt-5 pb-3">
			<div class="container">
				<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
					<h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Members</h5>
					<h1 class="mb-5">Our Master Chefs</h1>
				</div>
				<div class="row g-4">
					<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
						<div class="team-item text-center rounded overflow-hidden">
							<div class="rounded-circle overflow-hidden m-4">
								<img class="img-fluid" src="img/chef-1.jpg" alt="">
							</div>
							<h5 class="mb-0">Sanjeev Kapoor</h5>
							<small>Head Chef</small>
							<div class="d-flex justify-content-center mt-3">
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
						<div class="team-item text-center rounded overflow-hidden">
							<div class="rounded-circle overflow-hidden m-4">
								<img class="img-fluid" src="img/chef-2.jpg" alt="">
							</div>
							<h5 class="mb-0">Venkatesh Bhatt</h5>
							<small>Sous Chef</small>
							<div class="d-flex justify-content-center mt-3">
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
						<div class="team-item text-center rounded overflow-hidden">
							<div class="rounded-circle overflow-hidden m-4">
								<img class="img-fluid" src="img/chef-3.jpg" alt="">
							</div>
							<h5 class="mb-0">Maneet Chauhan</h5>
							<small>Pastry Chef</small>
							<div class="d-flex justify-content-center mt-3">
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
						<div class="team-item text-center rounded overflow-hidden">
							<div class="rounded-circle overflow-hidden m-4">
								<img class="img-fluid" src="img/team-4.jpg" alt="">
							</div>
							<h5 class="mb-0">Adams</h5>
							<small>Line Cook</small>
							<div class="d-flex justify-content-center mt-3">
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
								<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Team End -->



		<!-- Testimonial Start -->
		<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
			<div class="container">
				<div class="text-center">
					<h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonials</h5>
					<h1 class="mb-5">What Our Clients Say!!!</h1>
				</div>
				<div class="owl-carousel testimonial-carousel">
					<div class="testimonial-item bg-transparent border rounded p-4">
						<i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
						<p>Foodzy is amazing! Their quality of service and food is unmatched. Highly recommended!</p>
						<div class="d-flex align-items-center">
							<img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;">
							<div class="ps-3">
								<h5 class="mb-1">John Doe</h5>
								<small>Food Critic</small>
							</div>
						</div>
					</div>
					<div class="testimonial-item bg-transparent border rounded p-4">
						<i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
						<p>I've been ordering from Foodzy for years now, and they never disappoint. Great service and delicious food!</p>
						<div class="d-flex align-items-center">
							<img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 50px; height: 50px;">
							<div class="ps-3">
								<h5 class="mb-1">Jane Smith</h5>
								<small>Business Owner</small>
							</div>
						</div>
					</div>
					<div class="testimonial-item bg-transparent border rounded p-4">
						<i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
						<p>The team at Foodzy always goes above and beyond to make sure their customers are satisfied. Keep up the great work!</p>
						<div class="d-flex align-items-center">
							<img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 50px; height: 50px;">
							<div class="ps-3">
								<h5 class="mb-1">David Johnson</h5>
								<small>Event Planner</small>
							</div>
						</div>
					</div>
					<div class="testimonial-item bg-transparent border rounded p-4">
						<i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
						<p>Foodzy has been my go-to restaurant for every occasion. Their attention to detail and flavor is unmatched!</p>
						<div class="d-flex align-items-center">
							<img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg" style="width: 50px; height: 50px;">
							<div class="ps-3">
								<h5 class="mb-1">Emily Davis</h5>
								<small>Food Blogger</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Testimonial End -->



		<!-- Footer Start -->
		<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
			<div class="container py-5">
				<div class="row g-5">
					<div class="col-lg-3 col-md-6">
						<h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
						<a class="btn btn-link" href="about.html">About Us</a>
						<a class="btn btn-link" href="contact.html">Contact Us</a>
						<a class="btn btn-link" href="booking.html">Booking</a>
						<a class="btn btn-link" href="">Privacy Policy</a>
						<a class="btn btn-link" href="">Terms & Condition</a>
					</div>
					<div class="col-lg-3 col-md-6">
						<h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
						<p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>PSG CT,Coimbatore</p>
						<p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 9965512345</p>
						<p class="mb-2"><i class="fa fa-envelope me-3"></i>foodzy@gmail.com</p>
						<div class="d-flex pt-2">
							<a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
							<a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
							<a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
							<a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
						</div>
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

							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
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


		<!-- Back to Top -->
		<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
	</div>

	<!-- JavaScript Libraries -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="lib/wow/wow.min.js"></script>
	<script src="lib/easing/easing.min.js"></script>
	<script src="lib/waypoints/waypoints.min.js"></script>
	<script src="lib/counterup/counterup.min.js"></script>
	<script src="lib/owlcarousel/owl.carousel.min.js"></script>
	<script src="lib/tempusdominus/js/moment.min.js"></script>
	<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
	<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

	<!-- Template Javascript -->
	<script src="js/main.js"></script>
</body>

</html>