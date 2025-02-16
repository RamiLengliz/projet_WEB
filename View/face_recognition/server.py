from flask import Flask, request, jsonify
from flask_cors import CORS
import base64
import os

app = Flask(__name__)
CORS(app)  # This will enable CORS for all domains on all routes

@app.route('/save-photo', methods=['POST'])
def save_photo():
    data = request.json
    image_data = data['image'].split(",")[1]
    image_data = base64.b64decode(image_data)

    # Save the image to a file
    file_path = os.path.join('photos', 'captured_photo.png')
    with open(file_path, 'wb') as f:
        f.write(image_data)

    return jsonify({"message": "Photo saved successfully"})

if __name__ == '__main__':
    if not os.path.exists('photos'):
        os.makedirs('photos')
    app.run(debug=True, port=5000)
