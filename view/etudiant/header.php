<?php
require_once '../../Controller/examen_con.php';
$examenC = new examenCon("examen");
$examens = $examenC->listExamens();

?>
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
                    <a href="index.php" class="navbar-brand logo">
                        <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="index.php" class="menu-logo">
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
                                <li><a href="index.php">Home</a></li>
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
                                <li class="active"><a href="instructor-results.php">My Results</a></li>
                                <li><a href="timetable.php">Timetable Examen</a></li>
                                <li><a href="instructor-earnings.html">Earnings</a></li>
                                <li><a href="instructor-orders.html">Orders</a></li>
                                <li><a href="instructor-payouts.html">Payouts</a></li>
                                <li><a href="instructor-tickets.html">Support Ticket</a></li>
                                <li><a href="instructor-edit-profile.html">Instructor Profile</a></li>
                                <li><a href="instructor-security.html">Security</a></li>
                                <li><a href="instructor-social-profiles.html">Social Profiles</a></li>
                                <li><a href="instructor-notification.html">Timetable Examen</a></li>
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
                        <div class="notifications dropdown-menu dropdown-menu-right shadow">
                            <div class="topnav-dropdown-header d-flex justify-content-between align-items-center">
                                <span class="notification-title d-flex align-items-center">
                                    Notifications

                                </span>
                                <a href="javascript:void(0)" class="clear-noti text-muted">Mark all as read <i class="fa-solid fa-circle-check"></i></a>
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">
                                    <?php foreach ($examens as $examen) : ?>
                                        <li class="notification-message">
                                            <a href="notifications.html" class="text-reset">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1"><i class="fa fa-dot-circle-o" aria-hidden="true"></i><?= htmlspecialchars($examen['titre']); ?></h6>
                                                        <p class="mb-0 small text-muted"><?= date("F d, Y H:i", strtotime($examen['date'])); ?></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </li>



                </ul>
            </div>
        </nav>
    </div>
</header>
<style>
    .noti-nav .dropdown-menu {
        width: 300px;
        /* Set width */
        overflow: hidden;
        /* Hide overflow */
        border-radius: 0.5rem;
        /* Rounded corners */
    }

    .topnav-dropdown-header {
        padding: 0.75rem 1rem;
        background: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
    }

    .notification-list {
        max-height: 300px;
        overflow-y: auto;
        /* Scrollable list */
    }

    .notification-list li {
        border-bottom: 1px solid #e9ecef;
    }

    .notification-list li:last-child {
        border-bottom: none;
    }

    .notification-message a {
        display: block;
        padding: 0.75rem 1rem;
        color: #495057;
    }

    .notification-message a:hover {
        background-color: #f8f9fa;
    }

    .clear-noti {
        font-size: 0.9em;
        cursor: pointer;
    }

    .form-select-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    /* Add custom scrollbars */
    .notification-list::-webkit-scrollbar {
        width: 5px;
    }

    .notification-list::-webkit-scrollbar-thumb {
        background-color: #dee2e6;
        border-radius: 10px;
    }
</style>