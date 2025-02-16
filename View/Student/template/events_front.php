
<?php
include "../../../Model/gestion user/verify_login.php";
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

?>
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
include '../../../Controller/event_con.php';
$eventC = new eventCon("events");
$events = $eventC->listEvents();
?>

	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<?php
				include 'header1.php';
			?>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-12">
							<div class="breadcrumb-list">
								<nav aria-label="breadcrumb" class="page-breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Home</a></li>
										<li class="breadcrumb-item">Pages</li>
										<li class="breadcrumb-item" >Events</li>
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
								<h2>Events</h2>
								<p>Browse available events</p>
							</div>
							
							
							<!-- Category List -->
							<div class="tab-content">
								<div class="tab-pane fade show active" id="disponibile">
									
								<?php $eventC->generateEvents($events);?>

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
		<script src="assets/js/voice.js"></script>
	</body>

<!-- Mirrored from dreamslms.dreamstechnologies.com/html/job-category.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 21:45:15 GMT -->
</html>