<?php
include '../../../../controller/resultat_con.php';
include '../../../../controller/examen_con.php';
include '../../../../controller/subject_con.php';
$resultatC = new ResultatCon('resultat');
$resultats = $resultatC->listResultats();

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
			<header class="header header-page">
				<div class="header-fixed">
					<nav class="navbar navbar-expand-lg header-nav scroll-sticky">
						<div class="container ">
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
									<li class="has-submenu active">
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
											<li class="active"><a href="instructor-course.html">My Course</a></li>
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
									<a href="instructor-chat.html"><img src="assets/img/icon/messages.svg" alt="img"></a> 
								</li>
								<li class="nav-item cart-nav">
									<a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
										<img src="assets/img/icon/cart.svg" alt="img"> 
									</a>
									<div class="wishes-list dropdown-menu dropdown-menu-right">
										<div class="wish-header">
											<a href="#">View Cart</a>
											<a href="javascript:void(0)" class="float-end">Checkout</a>
										</div>
										<div class="wish-content">
											<ul>
												<li>
													<div class="media">
														<div class="d-flex media-wide">
															<div class="avatar">
																<a href="course-details.html">
																	<img alt="" src="assets/img/course/course-04.jpg">
																</a>
															</div>
															<div class="media-body">
																<h6><a href="course-details.html">Learn Angular...</a></h6>
																<p>By Dave Franco</p>
																<h5>$200 <span>$99.00</span></h5>
															</div>
														</div>
														<div class="remove-btn">
															<a href="#" class="btn">Remove</a>
														</div>
													</div>
												</li>
												<li>
													<div class="media">
														<div class="d-flex media-wide">
															<div class="avatar">
																<a href="course-details.html">
																	<img alt="" src="assets/img/course/course-14.jpg">
																</a>
															</div>
															<div class="media-body">
																<h6><a href="course-details.html">Build Responsive Real...</a></h6>
																<p>Jenis R.</p>
																<h5>$200 <span>$99.00</span></h5>
															</div>
														</div>
														<div class="remove-btn">
															<a href="#" class="btn">Remove</a>
														</div>
													</div>
												</li>
												<li>
													<div class="media">
														<div class="d-flex media-wide">
															<div class="avatar">
																<a href="course-details.html">
																	<img alt="" src="assets/img/course/course-15.jpg">
																</a>
															</div>
															<div class="media-body">
																<h6><a href="course-details.html">C# Developers Double ...</a></h6>
																<p>Jesse Stevens</p>
																<h5>$200 <span>$99.00</span></h5>
															</div>
														</div>
														<div class="remove-btn">
															<a href="#" class="btn">Remove</a>
														</div>
													</div>
												</li>
											</ul>
											<div class="total-item">
												<h6>Subtotal : $ 600</h6>
												<h5>Total : $ 600</h5>
											</div>
										</div>
									</div>
								</li>
								<li class="nav-item wish-nav">
									<a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
										<img src="assets/img/icon/wish.svg" alt="img"> 
									</a>
									<div class="wishes-list dropdown-menu dropdown-menu-right">
										<div class="wish-content">
											<ul>
												<li>
													<div class="media">
														<div class="d-flex media-wide">
															<div class="avatar">
																<a href="course-details.html">
																	<img alt="" src="assets/img/course/course-04.jpg">
																</a>
															</div>
															<div class="media-body">
																<h6><a href="course-details.html">Learn Angular...</a></h6>
																<p>By Dave Franco</p>
																<h5>$200 <span>$99.00</span></h5>
																<div class="remove-btn">
																	<a href="#" class="btn">Add to cart</a>
																</div>
															</div>
														</div>
													</div>
												</li>
												<li>
													<div class="media">
														<div class="d-flex media-wide">
															<div class="avatar">
																<a href="course-details.html">
																	<img alt="" src="assets/img/course/course-14.jpg">
																</a>
															</div>
															<div class="media-body">
																<h6><a href="course-details.html">Build Responsive Real...</a></h6>
																<p>Jenis R.</p>
																<h5>$200 <span>$99.00</span></h5>
																<div class="remove-btn">
																	<a href="#" class="btn">Add to cart</a>
																</div>
															</div>
														</div>
													</div>
												</li>
												<li>
													<div class="media">
														<div class="d-flex media-wide">
															<div class="avatar">
																<a href="course-details.html">
																	<img alt="" src="assets/img/course/course-15.jpg">
																</a>
															</div>
															<div class="media-body">
																<h6><a href="course-details.html">C# Developers Double ...</a></h6>
																<p>Jesse Stevens</p>
																<h5>$200 <span>$99.00</span></h5>
																<div class="remove-btn">
																	<a href="#" class="btn">Remove</a>
																</div>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li class="nav-item noti-nav">
									<a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
										<img src="assets/img/icon/notification.svg" alt="img"> 
									</a>
									<div class="notifications dropdown-menu dropdown-menu-right">
										<div class="topnav-dropdown-header">
											<span class="notification-title">Notifications
											<select>
												<option>All</option>
												<option>Unread</option>
											</select>
											</span>
											<a href="javascript:void(0)" class="clear-noti">Mark all as read <i class="fa-solid fa-circle-check"></i></a>
										</div>
										<div class="noti-content">
											<ul class="notification-list">
												<li class="notification-message">
													<div class="media d-flex">
														<div>															
															<a href="notifications.html" class="avatar">
																<img class="avatar-img" alt="" src="assets/img/user/user1.jpg">
															</a>
														</div>
														<div class="media-body">
															<h6><a href="notifications.html">Lex Murphy requested <span>access to</span> UNIX directory tree hierarchy </a></h6>
															<button class="btn btn-accept">Accept</button>
															<button class="btn btn-reject">Reject</button>
															<p>Today at 9:42 AM</p>
														</div>
													</div>
												</li>
												<li class="notification-message">
													<div class="media d-flex">
														<div>															
															<a href="notifications.html" class="avatar">
																<img class="avatar-img" alt="" src="assets/img/user/user2.jpg">
															</a>
														</div>
														<div class="media-body">
															<h6><a href="notifications.html">Ray Arnold left 6 <span>comments on</span> Isla Nublar SOC2 compliance report</a></h6>
															<p>Yesterday at 11:42 PM</p>
														</div>
													</div>
												</li>
												<li class="notification-message">
													<div class="media d-flex">
														<div>															
															<a href="notifications.html" class="avatar">
																<img class="avatar-img" alt="" src="assets/img/user/user3.jpg">
															</a>
														</div>
														<div class="media-body">
															<h6><a href="notifications.html">Dennis Nedry <span>commented on</span> Isla Nublar SOC2 compliance report</a></h6>
															<p class="noti-details">“Oh, I finished de-bugging the phones, but the system's compiling for eighteen minutes, or twenty.  So, some minor systems may go on and off for a while.”</p>
															<p>Yesterday at 5:42 PM</p>
														</div>
													</div>
												</li>
												<li class="notification-message">
													<div class="media d-flex">
														<div>															
															<a href="notifications.html" class="avatar">
																<img class="avatar-img" alt="" src="assets/img/user/user1.jpg">
															</a>
														</div>
														<div class="media-body">
															<h6><a href="notifications.html">John Hammond <span>created</span> Isla Nublar SOC2 compliance report </a></h6>
															<p>Last Wednesday at 11:15 AM</p>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</li>

							</ul>
						</div>
					</nav>
				</div>
			</header>
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
												<p>Manage your courses and its update like live, draft and insight.</p>
											</div>
											<div class="comman-space pb-0">
												<div class="instruct-search-blk">
													<div class="show-filter choose-search-blk">
														<form action="#">
															<div class="row gx-2 align-items-center">	
																<div class="col-md-6 col-item">
																	<div class=" search-group">
																		<i class="feather-search"></i>
																		<input type="text" class="form-control" placeholder="Search our courses" >
																	</div>
																</div>
																<div class="col-md-6 col-lg-6 col-item">
																	<div class="input-block select-form mb-0">
																		<select class="form-select select"  name="sellist1">
																		  <option>Choose</option>
																		  <option>Angular</option>
																		  <option>React</option>
																		  <option>Node</option>
																		</select>
																	</div>
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
																	if($resultat['note']>= 10){
																		echo '<td><span class="badge info-low">Valide</span></td>';
																	}else
																	echo '<td><span class="badge info-high">Non Valide</span></td>';
																?>
																
															</tr>
															<?php }; ?>
														</tbody>
													  </table>
													<!-- /Referred Users-->	

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
		<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.1.min.js"></script>

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
		
	</body>

<!-- Mirrored from dreamslms.dreamstechnologies.com/html/instructor-course.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 21:44:45 GMT -->
</html>