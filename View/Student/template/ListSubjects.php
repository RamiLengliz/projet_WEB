<?PHP
include("../../../Controller/subjectC.php");

$subjectC = new subjectC();
$listeSubject = $subjectC->displaySubjects();

if (isset($_POST['subbmit'])) {
	$listeSubject = $subjectC->displaySubjects();
}
?>
<?php
include "../../../Model/gestion user/verify_login.php";
if (session_status() == PHP_SESSION_NONE) {
	session_start();
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
		<?php
		include 'header.php';
		?>
		<!-- /Header -->

		<!-- Home Banner -->

		<!-- Feature Course -->
		<section class="section new-course">
			<div class="container">
				<div class="section-header aos" data-aos="fade-up">
					<div class="section-sub-head">
						<span>What’s New</span>
						<h2>Our Subjects</h2>
						<div class="section-text aos" data-aos="fade-up">
							<input type="text" id="searchInput" class="form-control" placeholder="Search subjects...">
						</div>
					</div>
				</div>
				<div class="course-feature">
					<div class="container">
						<div class="row" id="courseContainer">
							<?php foreach ($listeSubject as $subject) : ?>
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
													<div class="course-name">
														<h4><a href="instructor-profile.html"><?= $subject['name'] ?></a></h4>
													</div>
													<div class="course-share d-flex align-items-center justify-content-center">
														<a href="#"><i class="fa-regular fa-heart"></i></a>
													</div>
												</div>
												<h3 class="title instructor-text"><a href="course-details.html"><?= $subject['subject_description'] ?></a></h3>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<span class="d-inline-block average-rating">4.0 (15)</span>
												</div>
												<div class="all-btn all-category d-flex align-items-center">
													<a href="showCourses.php?idSubject=<?= $subject['Id'] ?>" class="btn btn-primary">Courses</a>
												</div>
											</div>
										</div>
									</div>
								</div>

							<?php endforeach; ?>
							<div id="noResults" style="display: none; text-align: center; width: 100%; margin-top: 20px;">No subjects found.</div>
						</div>


					</div>
				</div>
			</div>
		</section>



	</div>
	</div>

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
								<img src="assets/img/logo-proschool.png" alt="logo">
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
									<p> 3556 Beech Street, San Francisco,<br> California, CA 94108 </p>
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
	<script data-cfasync="false" src="dreamslms.dreamstechnologies.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.7.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<!-- counterup JS -->


	<!-- Select2 JS -->

	<!-- Slick Slider -->
	<script src="assets/plugins/slick/slick.js"></script>

	<!-- Aos -->
	<script src="assets/plugins/aos/aos.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
	<script src="assets/js/voice.js"></script>
</body>

<!-- Mirrored from dreamslms.dreamstechnologies.com/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 21:43:12 GMT -->

</html>