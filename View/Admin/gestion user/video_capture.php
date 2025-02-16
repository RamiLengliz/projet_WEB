<!DOCTYPE html>
<html>
<head>
  <title>Face Recognition Demo</title>
  <script>
    // Function to capture image from the webcam
    function captureImage() {
      navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
          const video = document.getElementById('video');
          video.srcObject = stream;
          video.onloadedmetadata = function(e) {
            video.play();
          };

          // Capture the image when a button is clicked or after a specific delay
          document.getElementById('captureButton').addEventListener('click', function() {
            const canvas = document.createElement('canvas');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            const imageData = canvas.toDataURL('image/png');

            // Send the image data to the Python server
            fetch('http://localhost:5000/recognize', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({ image: imageData })
            })
            .then(response => response.json())
            .then(data => {
              // Handle the recognition result
              console.log(data.result);
              displayResult(data.result);
              if (data.faceCoordinates) {
                drawRectangle(canvas, ctx, data.faceCoordinates);
              }
            });
          });
        })
        .catch(function(err) {
          console.error('Error accessing webcam:', err);
        });
    }

    // Function to draw a rectangle around the face
    function drawRectangle(canvas, ctx, coordinates) {
      ctx.beginPath();
      ctx.rect(coordinates.x, coordinates.y, coordinates.width, coordinates.height);
      ctx.strokeStyle = 'red';
      ctx.lineWidth = 2;
      ctx.stroke();
    }

    // Function to display the recognition result (adjust this according to your design)
    function displayResult(result) {
      if (result.length > 0) {
        document.getElementById('result').innerHTML = "Recognized: " + result.join(', ');
      } else {
        document.getElementById('result').innerHTML = "Face not recognized.";
      }
    }
  </script>
</head>
<body>
  <h1>Face Recognition Demo</h1>
  <video id="video" width="400" height="300"></video>
  <button id="captureButton" onclick="captureImage()">Capture and Recognize</button>
  <div id="result"></div>
</body>
</html>
