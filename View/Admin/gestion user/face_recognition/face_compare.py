import sys
import requests

API_KEY = '8IIx9P8KABTBD7jPN0kUDlrVBqFh1F5y'
API_SECRET = 'PoGIXd19hTYauUxK66Xa-ad8N288EYjU'
FACE_COMPARE_URL = 'https://api-us.faceplusplus.com/facepp/v3/compare'

def compare_faces(image_path1,image_path2):
    # Preset image paths or fetch them based on user_id if your application requires

    files = {
        'image_file1': open(image_path1, 'rb'),
        'image_file2': open(image_path2, 'rb'),
    }
    data = {
        'api_key': API_KEY,
        'api_secret': API_SECRET,
    }
    response = requests.post(FACE_COMPARE_URL, files=files, data=data)
    response_data = response.json()

    # Define a confidence threshold for determining if the faces match
    match_threshold = 70  # Adjust this value based on your criteria

    # Check if the confidence level in the response is above the threshold
    if response_data.get('confidence', 0) >= match_threshold:
        return "1"
    else:
        return "0"

# Main execution guard
if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python face_compare.py <user_id>")
        sys.exit(1)
    user_id = sys.argv[1]
    image_path1 = 'photos/' + user_id + '.png'
    image_path2 = 'photos/captured_photo.png'

    
    result = compare_faces(image_path1,image_path2)
    print(result)
