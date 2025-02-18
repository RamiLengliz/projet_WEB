<?PHP
	include ("../../../../Controller/subjectC.php");

	$subjectC=new subjectC();
	$listeSubject=$subjectC->displaySubjects();
    
if(isset($_POST['subbmit']))
{
	$listeSubject=$subjectC->displaySubjects();
}
?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from dreamslms.dreamstechnologies.com/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 21:42:35 GMT -->
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

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		
		<!-- Slick CSS -->
		<link rel="stylesheet" href="assets/plugins/slick/slick.css">
		<link rel="stylesheet" href="assets/plugins/slick/slick-theme.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
		<!-- Aos CSS -->
		<link rel="stylesheet" href="assets/plugins/aos/aos.css">

		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				<div class="header-fixed">
					<nav class="navbar navbar-expand-lg header-nav scroll-sticky">
						<div class="container">
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
									<li class="has-submenu active">
										<a class="" href="#">Home <i class="fas fa-chevron-down"></i></a>
										<ul class="submenu">
											<li class="active"><a href="index-2.html">Home</a></li>
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
										<a href="ListSubjects.php">Student</i></a>
								
									</li>	
									<li class="has-submenu">
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
											<li><a href="job-category.html">Category</a></li>
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
			
			<!-- Home Banner -->
			
			<!-- Feature Course -->		
			<section class="section new-course">
				<div class="container">
					<div class="section-header aos" data-aos="fade-up">
						<div class="section-sub-head">
							<span>What’s New</span>
							<h2>Our Subjects</h2>
							<!-- Add this code inside the section where you want to place the search field -->
<div class="section-text aos" data-aos="fade-up">
    <input type="text" id="searchInput" placeholder="Search subjects...">
</div>

						</div>
					
					</div>
					<div class="section-text aos" data-aos="fade-up">
						</div>
					<?php foreach ($listeSubject as $subject): ?>
<div class="course-feature">
    <div class="row">
        <div class="col-lg-4 col-md-6 d-flex">
            <div class="course-box d-flex aos" data-aos="fade-up">
                <div class="product">
                    <div class="product-img">
                        <a href="course-details.html">
                            <img class="img-fluid" alt="" src="../../../Admin/<?= $subject['depot_fichier_subject'] ?>">
                        </a>
					

                       
                    </div>
                    <div class="product-content">
                        <div class="course-group d-flex">
                            <div class="course-group-img d-flex">
                                <div class="course-name">
                                    <h4><a href="instructor-profile.html"><?php echo $subject['name']; ?></a></h4>
                                </div>
                            </div>
                            <div class="course-share d-flex align-items-center justify-content-center">
                                <a href="#"><i class="fa-regular fa-heart"></i></a>
                            </div>
                        </div>
                        <h3 class="title instructor-text"><a href="course-details.html"><?php echo $subject['subject_description']; ?></a></h3>
                        
                        <div class="rating">                            
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                            <span class="d-inline-block average-rating"><span>4.0</span> (15)</span>
                        </div>
                        <div class="all-btn all-category d-flex align-items-center">
                            <a href="showCourses.php?idSubject=<?= $subject['Id'] ?>" class="btn btn-primary">Courses</a>
                        </div>                       

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<script>
    // Get the input field and subjects list
    const searchInput = document.getElementById('searchInput');
    const subjectsList = document.querySelectorAll('.course-feature');

    // Add event listener to the search input field
    searchInput.addEventListener('input', function() {
        const searchText = this.value.toLowerCase(); // Get the search query and convert to lowercase

        subjectsList.forEach(subject => {
            const subjectName = subject.querySelector('.course-name h4 a').innerText.toLowerCase(); // Get the subject name and convert to lowercase

            // Check if the subject name contains the search query
            if (subjectName.includes(searchText)) {
                subject.style.display = 'block'; // Show the subject if it matches the search query
            } else {
                subject.style.display = 'none'; // Hide the subject if it doesn't match the search query
            }
        });
    });
</script>


						</div>
					</div>
				</div>
			</section>	
			<!-- /Feature Course -->	
			
			
			<!-- Footer -->
			<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top aos" data-aos="fade-up">
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
											<a href="https://dreamslms.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b6d2c4d3d7dbc5dadbc5f6d3ced7dbc6dad398d5d9db">[email&#160;protected]</a>
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
		<script data-cfasync="false" src="dreamslms.dreamstechnologies.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		
		<!-- counterup JS -->
		<script src="assets/js/jquery.waypoints.js"></script>
		<script src="assets/js/jquery.counterup.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>

		<!-- Owl Carousel -->
		<script src="assets/js/owl.carousel.min.js"></script>	

		<!-- Slick Slider -->
		<script src="assets/plugins/slick/slick.js"></script>
		
		<!-- Aos -->
		<script src="assets/plugins/aos/aos.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- Mirrored from dreamslms.dreamstechnologies.com/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 21:43:12 GMT -->
</html>