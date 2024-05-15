<?php
include "../../../Model/gestion user/verify_login.php";
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

include '../../../controller/chat_con.php';
$chatC = new ChatCon('chat');
$messages = $chatC->listMessages();


?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamslms.dreamstechnologies.com/html/course-message.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 21:45:32 GMT -->
<?php
include 'head_chat.php';
?>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		<?php
		include 'header1.php';
		?>
		<!-- /Header -->

		<!-- Course Header -->
		<div class="course-student-header">
			<div class="container">
				<div class="student-group">
					<div class="course-group ">
						<div class="course-group-img d-flex">
							<a href="student-profile.html"><img src="assets/img/user/user11.jpg" alt="" class="img-fluid"></a>
							<div class="d-flex align-items-center">
								<div class="course-name">
									<h4><a href="student-profile.html"><?=
																		htmlspecialchars($_SESSION['name']);
																		?></a></h4>
									<p>Student</p>
								</div>
							</div>
						</div>
						<div class="course-share ">
							<a href="javascript:void(0);" class="btn btn-primary">Account Settings</a>
						</div>
					</div>
				</div>
				<div class="my-student-list">
					<ul>
						<li><a href="course-student.html">Courses</a></li>
						<li><a href="course-wishlist.html">Wishlists</a></li>
						<li><a class="active" href="course-message.html">Messages</a></li>
						<li class="mb-0"><a href="purchase-history.html">Purchase history</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Course Header -->

		<!-- Course Lesson -->
		<section class="page-content course-sec course-message">
			<div class="container">
				<div class="student-widget message-student-widget">
					<div class="student-widget-group">
						<div class="col-md-12">
							<div class="add-compose">
								<a href="javascript:void(0);" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Compose</a>
							</div>
						</div>
						<div class="col-md-12">

							<div class="chat-window ">



								<!-- Chat Right -->
								<div class="chat-cont-right">
									<div class="chat-header">
										<a id="back_user_list" href="javascript:void(0)" class="back-user-list">
											<i class="material-icons">chevron_left</i>
										</a>
										<div class="media d-flex">
											<div class="media-img-wrap flex-shrink-0">
												<div class="avatar avatar-online">
													<img src="assets/img/user/user2.jpg" alt="User Image" class="avatar-img rounded-circle">
												</div>
											</div>
											<div class="media-body flex-grow-1">
												<div class="user-name">Administration </div>
												<div class="user-status">online</div>
											</div>
										</div>
									</div>
									<div class="chat-body">
										<div class="chat-scroll " id="chat-messages">
											<ul class="list-unstyled">
												<?php
												$userId = 1;
												foreach ($messages as $message) : ?>
													<li class="media <?= $message['id_user'] == $userId ? 'received' : 'sent' ?>">
														<div class="media-body">
															<div class="msg-box">
																<div class="msg-bg">
																	<p><?= htmlspecialchars($message['message']) ?></p>
																</div>

															</div>
															<div class="chat-time"><?= date('M j, Y, g:i a', strtotime($message['date'])) ?></div>
														</div>
													</li>
												<?php endforeach; ?>
											</ul>
										</div>
									</div>

									<div class="chat-footer">
										<form action="../../../model/gestion reclamation/send_message.php" method="post" enctype="multipart/form-data">
											<div class="input-group">
												<div class="btn-file btn">
													<i class="fa fa-paperclip"></i>
													<input type="file" name="fileUpload">
												</div>
												<input type="text" name="message" class="input-msg-send form-control" placeholder="Type your message here..." required>
												<!-- Hidden inputs for user IDs and reclamation ID -->
												<input type="hidden" name="id_user" value="							<?=
																														htmlspecialchars($_SESSION['id']);
																														?>"> <!-- Replace USER_ID with actual user ID -->
												<input type="hidden" name="id_reclamation" value="14"> <!-- Replace RECLAMATION_ID with actual reclamation ID -->
												<input type="hidden" name="id_user_dest" value="1"> <!-- Replace USER_DEST_ID with actual destination user ID -->
												<button type="submit" class="btn btn-primary msg-send-btn rounded-pill">
													<img src="assets/img/send-icon.svg" alt="Send">
												</button>
											</div>
										</form>
									</div>

								</div>
								<!-- /Chat Right -->

							</div>
						</div>
					</div>
				</div>
			</div>
			<script>
				// Function to keep the chat scrolled to the bottom
				function scrollToBottom() {
					var chatMessages = document.getElementById('chat-messages');
					chatMessages.scrollTop = chatMessages.scrollHeight;
				}

				// Scroll to bottom on initial load
				window.onload = scrollToBottom;

				// Scroll to bottom every time the form is submitted
				document.getElementById('chat-form').addEventListener('submit', function(event) {
					setTimeout(scrollToBottom, 100); // Allow time for message to be added
				});
			</script>
		</section>
		<!-- /Course Lesson -->

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
										<a href="https://dreamslms.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3450465155594758594774514c55594458511a575b59">[email&#160;protected]</a>
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

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>

</body>

<!-- Mirrored from dreamslms.dreamstechnologies.com/html/course-message.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 21:45:32 GMT -->

</html>