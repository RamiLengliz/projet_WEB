<?php
include "../../../Model/gestion user/verify_login.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../../../controller/chat_con.php';
$chatC = new ChatCon('chat');
$messages = $chatC->listMessagesId_user($_SESSION['id']);
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
                            <a href="student-profile.html"><img src="../../admin/gestion user/face_recognition/photos/<?=htmlspecialchars($_SESSION['id']);?>.png" alt="" class="img-fluid"></a>
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
                            <div class="chat-window">
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
                                        <div class="chat-scroll" id="chat-messages">
                                            <ul class="list-unstyled">
                                                <?php
                                                $userId = $_SESSION['id'];
                                                foreach ($messages as $message) : ?>
                                                    <?php
                                                    if ($message['id_user'] == $userId) {
                                                        echo '<li class="media sent">';
                                                    ?>
                                                        <div class="media-body">
                                                            <div class="msg-box">
                                                                <div class="msg-bg">
                                                                    <p><?= htmlspecialchars($message['message']) ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="chat-time"><?= date('M j, Y, g:i a', strtotime($message['date'])) ?></div>
                                                        </div>
                                                        </li>
                                                    <?php
                                                    } else if ($message['id_user_dest'] == $userId) {
                                                        echo '<li class="media received">';
                                                    ?>
                                                        <div class="media-body">
                                                            <div class="msg-box">
                                                                <div class="msg-bg">
                                                                    <p><?= htmlspecialchars($message['message']) ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="chat-time"><?= date('M j, Y, g:i a', strtotime($message['date'])) ?></div>
                                                        </div>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="chat-footer">
                                        <form id="chat-form" enctype="multipart/form-data">
                                            <div class="input-group">
                                                <div class="btn-file btn">
                                                    <i class="fa fa-paperclip"></i>
                                                    <input type="file" name="fileUpload">
                                                </div>
                                                <input type="text" name="message" class="input-msg-send form-control" placeholder="Type your message here..." required>
                                                <!-- Hidden inputs for user IDs and reclamation ID -->
                                                <input type="hidden" name="id_user" value="<?= htmlspecialchars($_SESSION['id']); ?>">
                                                <input type="hidden" name="id_reclamation" value="14">
                                                <input type="hidden" name="id_user_dest" value="1">
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

                // Scroll to bottom when new messages are added
                const observer = new MutationObserver(scrollToBottom);
                observer.observe(document.getElementById('chat-messages'), {
                    childList: true
                });

                // Handle AJAX form submission
                document.getElementById('chat-form').addEventListener('submit', function(event) {
                    event.preventDefault();

                    const formData = new FormData(this);

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', '../../../model/gestion reclamation/send_message.php?user_id=<?= htmlspecialchars($_SESSION['id']) ?>', true);

                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            // Append the new message to the chat
                            const message = formData.get('message');
                            const messageItem = document.createElement('li');
                            messageItem.classList.add('media', 'sent');
                            messageItem.innerHTML = `
                                <div class="media-body">
                                    <div class="msg-box">
                                        <div class="msg-bg">
                                            <p>${message}</p>
                                        </div>
                                    </div>
                                    <div class="chat-time">${new Date().toLocaleString()}</div>
                                </div>
                            `;
                            document.querySelector('#chat-messages ul').appendChild(messageItem);
                            scrollToBottom();

                            // Clear the message input
                            document.querySelector('input[name="message"]').value = '';
                        } else {
                            console.error('Error:', xhr.statusText);
                        }
                    };

                    xhr.send(formData);
                });
            </script>
        </section>
        <!-- /Course Lesson -->

        <!-- Footer -->
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
    <script src="assets/js/voice.js"></script>
</body>

</html>
