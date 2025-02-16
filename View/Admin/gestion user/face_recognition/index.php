<?php
$email = $_POST['email'] ?? '';  // Safe fallback using null coalescing operator
$name = $_POST['name'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$age = $_POST['age'] ?? '';
$role = 3; // Assuming role is predefined as 3 for this user type
$status = isset($_POST['banner']) ? 1 : 0;
$class = $_POST['class'] ?? '';
$age = '+' . $age;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User Registration</title>
  <script defer src="face-api.min.js"></script>
  <script defer src="script.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

    body {
      margin: 0;
      padding: 0;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
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
      max-width: 400px;
      width: 90%;
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 1s ease-in-out, transform 1s ease-in-out;
    }

    .container.visible {
      opacity: 1;
      transform: translateY(0);
    }

    #captureButton,
    #submitButton {
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
      position: relative;
      z-index: 10;
    }

    #captureButton:hover,
    #submitButton:hover {
      background-color: #e55b50;
      transform: scale(1.05);
    }

    #captureButton:disabled,
    #submitButton:disabled {
      background-color: #cccccc;
      cursor: not-allowed;
    }

    video {
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
    <button type="button" id="captureButton">Capture Photo</button>
    <video id="video" width="720" height="560" autoplay muted></video>
    <form action="../../../../model/gestion user/create_student.php" method="post">
      <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
      <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
      <input type="hidden" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>">
      <input type="hidden" name="age" value="<?php echo htmlspecialchars($age); ?>">
      <input type="hidden" name="role" value="<?php echo htmlspecialchars($role); ?>">
      <input type="hidden" name="status" value="<?php echo htmlspecialchars($status); ?>">
      <input type="hidden" name="class" value="<?php echo htmlspecialchars($class); ?>">
      
      <button type="submit" id="submitButton" disabled>Submit Form</button>
    </form>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const container = document.querySelector('.container');

      // Add the 'visible' class after a short delay to trigger the transition
      setTimeout(() => {
        container.classList.add('visible');
      }, 100);

      const captureButton = document.getElementById('captureButton');
      const submitButton = document.getElementById('submitButton');

      captureButton.addEventListener('click', function() {
        // Simulate the capture action
        console.log('Capture action performed');

        // Disable the capture button
        captureButton.disabled = true;

        // Enable the submit button
        submitButton.disabled = false;
      });
    });
  </script>
</body>
</html>
