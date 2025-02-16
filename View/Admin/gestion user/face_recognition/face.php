<?php
session_start();
if (isset($_SESSION['id'])) {
  $user_Id = $_SESSION['id'];
}
$email = $_SESSION['email'] ?? '';
$password = $_SESSION['password'] ?? '';
$page = isset($_GET['failed']) ? $_GET['failed'] : null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script defer src="face-api.min.js"></script>
  <script defer src="script.js"></script>

  <script defer>
    function initInlineScript() {
      document.addEventListener('DOMContentLoaded', function() {
        const captureButton = document.getElementById('captureButton');
        const video = document.getElementById('video');
        const verifyButton = document.getElementById('verifyButton');
        const loadingButton = document.getElementById('loadingButton');
        const userId = "<?php echo $user_Id; ?>";

        captureButton.addEventListener('click', function() {
          console.log('Capture action performed');
          video.style.display = 'none';
          verifyButton.style.display = 'inline-block';
          captureButton.disabled = true;
          verifyButton.disabled = false;

          // Start the Python server asynchronously
          startPythonServer();
        });

        verifyButton.addEventListener('click', function() {
          console.log('Verify action performed');

          // Show the loading button with a transition
          verifyButton.style.transition = 'opacity 0.5s';
          verifyButton.style.opacity = '0';
          setTimeout(() => {
            verifyButton.style.display = 'none';
            loadingButton.style.display = 'inline-block';
            loadingButton.style.opacity = '1';
          }, 500);

          fetch('execute.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
              },
              body: 'action=capture&userId=' + encodeURIComponent(userId)
            })
            .then(response => response.json())
            .then(data => {
              console.log('Response from execute.php:', data);
              console.log('Result from Python script:', data.result);
              console.log('Additional variable:', data.additionalVar);
              if (data.success) {
                window.location.href = 'animation.php?extra=' + encodeURIComponent(data.additionalVar) + '&result=' + encodeURIComponent(data.result);
              }
            })
            .catch(error => {
              console.error('Error:', error);
            });
        });

        function startPythonServer() {
          fetch('start_server.php')
            .then(response => response.text())
            .then(data => {
              console.log('Python server start response:', data);
            })
            .catch(error => {
              console.error('Error starting Python server:', error);
            });
        }
      });
    }

    initInlineScript();
  </script>
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
      max-width: 700px;
      width: 100%;
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

    h1 {
      margin-bottom: 20px;
      font-size: 28px;
      color: #ff6f61;
    }

    #captureButton,
    #verifyButton {
      background-color: #ff6f61;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.3s ease;
      margin: 10px 0;
      display: block;
      width: 100%;
      max-width: 200px;
      margin-left: auto;
      margin-right: auto;
      opacity: 1;
    }
    #loadingButton {
      border: none;
      background-color: #ff6f61;
      width: 100%;
      max-width: 200px;
      margin-left: auto;
      margin-right: auto;
      display: none;
      opacity: 0;
      transition: opacity 0.5s;
    }

    #captureButton:hover,
    #verifyButton:hover {
      background-color: #e55b50;
      transform: scale(1.05);
    }

    #captureButton:disabled,
    #verifyButton:disabled {
      background-color: #cccccc;
      cursor: not-allowed;
    }



    #video {
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      display: block;
      margin: 20px auto;
      max-width: 100%;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>User Registration</h1>
    <button type="button" id="captureButton">Capture Photo</button>
    <video id="video" width="720" height="560" autoplay muted></video>
    <button id="verifyButton" disabled>Verify</button>
    <button id="loadingButton" class="btn btn-primary" type="button" disabled>
      <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
      <span role="status">Loading...</span>
    </button>
  </div>
</body>

</html>
