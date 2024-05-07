<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Chat Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .chat-container {
            max-width: 800px;
            margin: auto;
            height: 500px;
            border: 1px solid #dee2e6;
        }
        .chat-messages {
            overflow-y: auto;
            height: 400px;
        }
        .chat-form {
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
    $_SESSION['user_id'] = 1; // Set user ID for the session
    include '../../controller/chat_con.php';
    $chatC = new ChatCon('chat');
    $messages = $chatC->listMessages(); // Fetch all messages
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">


    <div class="chat-container p-3">
        <div class="chat-messages p-2" id="chat-messages">
            <!-- Dynamically populated messages -->
            <div class="d-flex flex-column gap-2">
                <?php foreach ($messages as $message): ?>
                <div class="p-2 bg-light border rounded <?= $message['id_user'] == $_SESSION['user_id'] ? 'ms-auto' : '' ?>">
                    <strong><?= htmlspecialchars($message['id_user'] == $_SESSION['user_id'] ? 'You' : 'Nessim Mezhoud ' . $message['id_user']) ?>:</strong>
                    <?= htmlspecialchars($message['message']) ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="chat-form mt-3">
            <form id="chat-form" action="../../model/send_message.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value="<?= $_SESSION['user_id']; ?>">
                <input type="hidden" name="id_reclamation" value="<?=$_GET['id_reclamation'];?>"> <!-- Assume reclamation ID -->
                <input type="hidden" name="id_user_dest" value="69"> <!-- Assume destination user ID -->
                <div class="input-group">
                    <input type="text" name="message" class="form-control" placeholder="Type a message..." id="message-input" required>
                    <button class="btn btn-primary" type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
    </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>
