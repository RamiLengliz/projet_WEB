<?php
session_start();
if (isset($_SESSION['id'])) {
  $user_Id = $_SESSION['id'];
}
$password = $_SESSION['password'];
$email = $_SESSION['email'];
$result = $_GET['result'];
$result = substr($result, 0, 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animation</title>
    <script src="https://cdn.jsdelivr.net/npm/lottie-web@5.9.4/build/player/lottie.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 55%, #fad0c4 100%);
            font-family: 'Roboto', sans-serif;
            color: #333;
        }

        .container {
            text-align: center;
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 90%;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #animationContainer {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="animationContainer"></div>
        <form id="redirectForm" method="POST" style="display: none;">
            <input type="hidden" name="mail" value="<?php echo $email; ?>">
            <input type="hidden" name="password" value="<?php echo $password; ?>">
        </form>
    </div>

    <script>
        var container = document.getElementById('animationContainer');
        const result = "<?php echo $result; ?>";
        var animation = lottie.loadAnimation({
            container: container, // the dom element where the animation will be rendered
            renderer: 'svg', // Render as SVG
            loop: true, // Loop when finished
            autoplay: true, // Start playing automatically
            path: 'animation.json' // Path to the animation json
        });

        // Redirect after 5 seconds
        setTimeout(function() {
            var form = document.getElementById('redirectForm');
            if (result == 1) {
                form.action = '../../../../model/gestion user/login.php';
            } else {
                form.action = '../../../index.php?page=6';
            }
            form.submit();
        }, 5000);
    </script>
</body>

</html>
