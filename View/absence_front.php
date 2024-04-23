<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from dreamslms.dreamstechnologies.com/html/job-category.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 21:45:07 GMT -->
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Dreams LMS</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Feather CSS -->
		<link rel="stylesheet" href="assets/css/feather.css">

		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
	
	</head>

<?php
include_once __DIR__ . '/../Controller/absence_con.php';
$absenceC = new absenceCon("absence");
$absences = $absenceC->listAbsences();
?>

	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header header-page">
				<div class="header-fixed">
					<nav class="navbar navbar-expand-lg header-nav scroll-sticky">
						<div class="container header-border">
							<div class="navbar-header">
								<a id="mobile_btn" href="javascript:void(0);">
									<span class="bar-icon">
										<span></span>
										<span></span>
										<span></span>
									</span>
								</a>
								<a href="index-2.html" class="navbar-brand logo">
									<img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
								</a>
							</div>
							<div class="main-menu-wrapper">
								<div class="menu-header">
									<a href="index-2.html" class="menu-logo">
										<img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
									</a>
									<a id="menu_close" class="menu-close" href="javascript:void(0);">
										<i class="fas fa-times"></i>
									</a>
								</div>
								<ul class="main-nav">
									<li class="has-submenu">
										<a href="#">Home <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu">
											<li><a href="index-2.html">Home</a></li>
											<li><a href="index-two.html">Home Two</a></li>
											<li><a href="index-three.html">Home Three</a></li>
											<li><a href="index-four.html">Home Four</a></li>
										</ul>
									</li>
									<li class="has-submenu">
										<a href="#">Instructor <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu">
											<li><a href="instructor-dashboard.html">Dashboard</a></li>
											<li class="has-submenu">
												<a href="instructor-list.html">Instructor</a>
												<ul class="submenu">
													<li><a href="instructor-list.html">List</a></li>
													<li><a href="instructor-grid.html">Grid</a></li>
												</ul>
											</li>
											<li><a href="instructor-course.html">My Course</a></li>
											<li><a href="instructor-reviews.html">Reviews</a></li>
											<li><a href="instructor-earnings.html">Earnings</a></li>
											<li><a href="instructor-orders.html">Orders</a></li>
											<li><a href="instructor-payouts.html">Payouts</a></li>
											<li><a href="instructor-tickets.html">Support Ticket</a></li>
											<li><a href="instructor-edit-profile.html">Instructor Profile</a></li>
											<li><a href="instructor-security.html">Security</a></li>
											<li><a href="instructor-social-profiles.html">Social Profiles</a></li>
											<li><a href="instructor-notification.html">Notifications</a></li>
											<li><a href="instructor-profile-privacy.html">Profile Privacy</a></li>
											<li><a href="instructor-delete-profile.html">Delete Profile</a></li>
											<li><a href="instructor-linked-account.html">Linked Accounts</a></li>
										</ul>
									</li>	
									<li class="has-submenu">
										<a href="#">Student <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu first-submenu">
											<li class="has-submenu ">
												<a href="students-list.html">Student</a>
												<ul class="submenu">
													<li><a href="students-list.html">List</a></li>
													<li><a href="students-grid.html">Grid</a></li>
												</ul>
											</li>
											<li><a href="setting-edit-profile.html">Student Profile</a></li>
											<li><a href="setting-student-security.html">Security</a></li>
											<li><a href="setting-student-social-profile.html">Social profile</a></li>
											<li><a href="setting-student-notification.html">Notification</a></li>
											<li><a href="setting-student-privacy.html">Profile Privacy</a></li>
											<li><a href="setting-student-accounts.html">Link Accounts</a></li>
											<li><a href="setting-student-referral.html">Referal</a></li>
											<li><a href="setting-student-subscription.html">Subscribtion</a></li>
											<li><a href="setting-student-billing.html">Billing</a></li>
											<li><a href="setting-student-payment.html">Payment</a></li>
											<li><a href="setting-student-invoice.html">Invoice</a></li>
											<li><a href="setting-support-tickets.html">Support Tickets</a></li>
										</ul>
									</li>	
									<li class="has-submenu active">
										<a href="#">Pages <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu">
											<li><a href="notifications.html">Notification</a></li>
											<li><a href="pricing-plan.html">Pricing Plan</a></li>
											<li><a href="wishlist.html">Wishlist</a></li>
											<li class="has-submenu">
												<a href="course-list.html">Course</a>
												<ul class="submenu">
													<li><a href="add-course.html">Add Course</a></li>
													<li><a href="course-list.html">Course List</a></li>
													<li><a href="course-grid.html">Course Grid</a></li>
													<li><a href="course-details.html">Course Details</a></li>
												</ul>
											</li>
											<li class="has-submenu">
												<a href="come-soon.html">Error</a>
												<ul class="submenu">
													<li><a href="come-soon.html">Comeing soon</a></li>
													<li><a href="error-404.html">404</a></li>
													<li><a href="error-500.html">500</a></li>
													<li><a href="under-construction.html">Under Construction</a></li>
												</ul>
											</li>
											<li><a href="faq.html">FAQ</a></li>
											<li><a href="support.html">Support</a></li>
											<li class="active"><a href="absence_front.php">Absences</a></li>
											<li><a href="cart.html">Cart</a></li>
											<li><a href="checkout.html">Checkout</a></li>
											<li><a href="login.html">Login</a></li>
											<li><a href="register.html">Register</a></li>
											<li><a href="forgot-password.html">Forgot Password</a></li>
										</ul>
									</li>
									<li class="has-submenu">
										<a href="#">Blog <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu">
											<li><a href="blog-list.html">Blog List</a></li>
											<li><a href="blog-grid.html">Blog Grid</a></li>
											<li><a href="blog-masonry.html">Blog Masonry</a></li>
											<li><a href="blog-modern.html">Blog Modern</a></li>
											<li><a href="blog-details.html">Blog Details</a></li>
										</ul>
									</li>
									<li class="login-link">
										<a href="login.html">Login / Signup</a>
									</li>
								</ul>		 
							</div>		 
							<ul class="nav header-navbar-rht">
								<li class="nav-item">
									<a class="nav-link header-sign" href="login.html">Signin</a>
								</li>
								<li class="nav-item">
									<a class="nav-link header-login" href="register.html">Signup</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</header>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-12">
							<div class="breadcrumb-list">
								<nav aria-label="breadcrumb" class="page-breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
										<li class="breadcrumb-item">Pages</li>
										<li class="breadcrumb-item" >Absences</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Wrapper -->
			<div class="page-content">
				
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="title-sec">
								<h2>Absences</h2>
								<p>Browse available Absences</p>
							</div>
							
							
							<!-- Category List -->
							<div class="tab-content">
								<div class="tab-pane fade show active" id="disponibile">
									
								<?php $absenceC->generateAbs($absences);?>

								</div>
							</div>
							<!-- /Category List -->
							
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Wrapper -->
			
			<!-- Footer -->
			<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<img src="assets/img/logo.svg" alt="logo">
									</div>
									<div class="footer-about-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut consequat mauris Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut consequat mauris</p>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-2 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Instructor</h2>
									<ul>
										<li><a href="instructor-profile.html">Profile</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="register.html">Register</a></li>
										<li><a href="instructor-list.html">Instructor</a></li>
										<li><a href="deposit-instructor-dashboard.html"> Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-2 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Student</h2>
									<ul>
										<li><a href="student-profile.html">Profile</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="register.html">Register</a></li>
										<li><a href="students-list.html">Student</a></li>
										<li><a href="deposit-student-dashboard.html"> Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-4 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">News letter</h2>
									<div class="news-letter">
										<form>
											<input type="text" class="form-control" placeholder="Enter your email address" name="email">
										</form>
									</div>
									<div class="footer-contact-info">
										<div class="footer-address">
											<img src="assets/img/icon/icon-20.svg" alt="" class="img-fluid">
											<p> 3556  Beech Street, San Francisco,<br> California, CA 94108 </p>
										</div>
										<p>
											<img src="assets/img/icon/icon-19.svg" alt="" class="img-fluid">
											<a href="https://dreamslms.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b2d6c0d7d3dfc1dedfc1f2d7cad3dfc2ded79cd1dddf">[email&#160;protected]</a>
										</p>
										<p class="mb-0">
											<img src="assets/img/icon/icon-21.svg" alt="" class="img-fluid">
											+19 123-456-7890
										</p>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6">
									<div class="privacy-policy">
										<ul>
											<li><a href="term-condition.html">Terms</a></li>
											<li><a href="privacy-policy.html">Privacy</a></li>
										</ul>
									</div>
								</div>
								<div class="col-md-6">
									<div class="copyright-text">
										<p class="mb-0">&copy; 2023 DreamsLMS. All rights reserved.</p>
									</div>
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->
		   
		</div>
	   <!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- Mirrored from dreamslms.dreamstechnologies.com/html/job-category.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 21:45:15 GMT -->
</html>