const recognition = new webkitSpeechRecognition() || new SpeechRecognition();
recognition.lang = 'en-US';
recognition.continuous = true;
recognition.interimResults = true;

let isListening = false;
let command = '';

recognition.onstart = function() {
    console.log('Listening...');
    isListening = true;
};

recognition.onend = function() {
    console.log('Stopped listening.');
    isListening = false;
};

recognition.onresult = function(event) {
    for (let i = event.resultIndex; i < event.results.length; ++i) {
        if (event.results[i].isFinal) {
            command = event.results[i][0].transcript.trim().toLowerCase();
            console.log('Command:', command);
            processCommand(command);
        }
    }
};

function processCommand(command) {
    if (command.includes('hey pro school')) {
        
        speak("Yes, how can I help you?");
    } else if (command.includes('forget password')) {
        // Navigate to home page
        speak("Going to Forget Password");
        window.location.href = 'forget_password.php';
    }
    else if (command.includes('sign up')) {
        speak("thank you for trusting us and happy adventure.");
        // Navigate to home page
        window.location.href = 'users.php';
    }else if (command.includes('sign in')) {
        // Navigate to home page
        speak("welcome back.");
        window.location.href = 'signin.php';
    }else if (command.includes('mail')) {
        // Navigate to home page
        window.location.href = 'email1.php';
    }else if (command.includes('logout')) {
        speak("Goodbye and see next time.");
        // Navigate to home page
        window.location.href = 'logout.php';
    }else if (command.includes('admin')) {
        speak("hello this page is strictly for admin.");
        // Navigate to home page
        window.location.href = 'signinadmin.php';
    }else if (command.includes('face')) {
        speak("thank you for chosing to login with our face identificetion future.");
        
        // Navigate to home page
        window.location.href = './face_login/face_sign_in.php';
    }
    else if (command.includes('health')) {
        speak("going to health.");
        
        // Navigate to home page
        window.location.href = 'fronthealth.php';
    }
    // Add more commands as needed
}

function speak(text) {
    const utterance = new SpeechSynthesisUtterance(text);
    window.speechSynthesis.speak(utterance);
}

recognition.start();