<?php
include "../../../Model/gestion user/verify_login.php";
include '../../../controller/resultat_con.php';
include '../../../controller/examen_con.php';
include '../../../controller/subject_con.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$resultatC = new ResultatCon('resultat');
$resultats = $resultatC->listResultatUser($_SESSION['id']);


$examenC = new examenCon('examen');

$subjectC = new subjectCon('subject');

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamslms.dreamstechnologies.com/html/instructor-course.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 21:44:44 GMT -->

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

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		<?php
		include 'header1.php';
		?>
		
		<!-- /Header -->

		<!-- Page Wrapper -->
		<div class="page-content">
			<div class="container">
				<div class="row">

					<!-- Sidebar -->

					<!-- /Sidebar -->

					<!-- Instructor Dashboard -->
					<div class="col-xl-9 col-lg-8 col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="settings-widget">
									<div class="settings-inner-blk p-0">
										<div class="sell-course-head comman-space">
											<h3>Result of examen</h3>
											<p>If you have a reclamation contact your administration.</p>
										</div>
										<div class="comman-space pb-0">
											<div class="instruct-search-blk">
												<div class="show-filter choose-search-blk">
													<form action="#">
														<div class="row gx-2 align-items-center">
															<div class="col-md-6 col-item">
																<div class="search-group">
																	<i class="feather-search"></i>
																	<input type="text" id="note-search" class="form-control" placeholder="Recherche notes">
																</div>
															</div>
															<div class="col-md-6 col-item">
																<select id="status-filter" class="form-select">
																	<option value="all">All</option>
																	<option value="Valide">Valide</option>
																	<option value="Non Valide">Non Valide</option>
																</select>
															</div>
														</div>
													</form>
												</div>
											</div>
											<div class="settings-tickets-blk course-instruct-blk table-responsive">

												<!-- Referred Users-->
												<table class="table table-nowrap mb-2">
													<thead>
														<tr>
															<th>Subject</th>
															<th>Note</th>
															<th>STATUS</th>
														</tr>
													</thead>
													<tbody>

														<?php foreach ($resultats as $resultat) {
															$examen = $examenC->getExamen($resultat['id_examen']);
															$subject = $subjectC->getSubject($examen['id_subject']);
														?>
															<tr>

																<td>
																	<div class="sell-table-group d-flex align-items-center">

																		<div class="sell-tabel-info">
																			<p><a href="course-details.html"><?= htmlspecialchars($subject['name']); ?></a></p>
																			<div class="course-info d-flex align-items-center border-bottom-0 pb-0">

																			</div>
																		</div>
																	</div>
																</td>
																<td><?= htmlspecialchars($resultat['note']); ?></td>
																<?php
																if ($resultat['note'] >= 10) {
																	echo '<td><span class="badge info-low">Valide</span></td>';
																} else
																	echo '<td><span class="badge info-high">Non Valide</span></td>';
																?>

															</tr>
														<?php }; ?>
													</tbody>
												</table>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Instructor Dashboard -->

				</div>
			</div>
		</div>
		<!-- /Page Wrapper -->
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const searchInput = document.querySelector('.search-group input[type="text"]');
				const statusFilter = document.getElementById('status-filter');
				const tableRows = document.querySelectorAll('table tbody tr');

				function filterRows() {
					const searchTerm = searchInput.value.toLowerCase();
					const selectedStatus = statusFilter.value;

					tableRows.forEach(row => {
						const subject = row.querySelector('td:first-child').textContent.toLowerCase();
						const rowStatus = row.querySelector('td:last-child span').textContent;

						const matchesSearch = subject.includes(searchTerm);
						const matchesStatus = selectedStatus === 'all' || rowStatus === selectedStatus;

						if (matchesSearch && matchesStatus) {
							row.style.display = '';
						} else {
							row.style.display = 'none';
						}
					});
				}

				searchInput.addEventListener('input', filterRows);
				statusFilter.addEventListener('change', filterRows);
			});
		</script>


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
										<p> 3556 Beech Street, San Francisco,<br> California, CA 94108 </p>
									</div>
									<p>
										<img src="assets/img/icon/icon-19.svg" alt="" class="img-fluid">
										<a href="https://dreamslms.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6a0e180f0b07190607192a0f120b071a060f44090507">[email&#160;protected]</a>
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
	<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.7.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<!-- Select2 JS -->
	<script src="assets/plugins/select2/js/select2.min.js"></script>

	<!-- Feature JS -->
	<script src="assets/plugins/feather/feather.min.js"></script>

	<!-- Sticky Sidebar JS -->
	<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
	<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
	<script src="assets/js/voice.js"></script>
</body>

<!-- Mirrored from dreamslms.dreamstechnologies.com/html/instructor-course.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 21:44:45 GMT -->

</html>