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
    if (command.includes('hey')) {
        // Activation word detected, continue listening
        console.log('Activation word detected.');
        speak("Yes, how can I help you?");
    } else if (command.includes('dashboard')) {
        speak("Navigating to dashboard");
        window.location.href = 'index.php';
    } else if (command.includes('add reclamation') || command.includes('reclamation')) {
        speak("Navigating to add reclamation");
        window.location.href = 'add-reclamation.php';
    } else if (command.includes('change password') || command.includes('password')) {
        speak("Navigating to change_password");
        window.location.href = 'change_password.php';
    } else if (command.includes('events management') || command.includes('events')) {
        speak("Navigating to events management");
        window.location.href = 'events_front.php';
    } else if (command.includes('create report')|| command.includes('report')) {
        speak("Navigating to create reclamation");
        window.location.href = 'create_reclamation.php';
    } else if (command.includes('results')) {
        speak("Navigating to results");
        window.location.href = 'instructor-results.php';
    } else if (command.includes('Subjects')) {
        speak("Navigating to List Subjects");
        window.location.href = 'ListSubjects.php';
    } else if (command.includes('Courses')) {
        speak("Navigating to The Courses");
        window.location.href = 'showCourses.php';
    } else if (command.includes('timetable')) {
        speak("Navigating to timetable");
        window.location.href = 'timetable.php';
    } else if (command.includes('new subject')) {
        speak("Navigating to new subject");
        window.location.href = 'gestion cours/addSubject.php';
    } else if (command.includes('add absence')) {
        speak("Navigating to add absence");
        window.location.href = 'index.php?page=AA';
    } else if (command.includes('billet')) {
        speak("Navigating to billet");
        window.location.href = 'index.php?page=AB';
    } else if (command.includes('create exam')) {
        speak("Navigating to create exam");
        window.location.href = 'index.php?page=CE';
    } else if (command.includes('result')) {
        speak("Navigating to results");
        window.location.href = 'index.php?page=resultat';
    } else if (command.includes('update result')) {
        speak("Navigating to update results");
        window.location.href = 'index.php?page=resultat_update';
    } else if (command.includes('create event')) {
        speak("Navigating to create event");
        window.location.href = 'index.php?page=EC';
    } else if (command.includes('reservations')) {
        speak("Navigating to reservations");
        window.location.href = 'index.php?page=ER';
    } else if (command.includes('check reports')) {
        speak("Navigating to check reclamation");
        window.location.href = 'index.php?page=CR';
    } else if (command.includes('settings')) {
        speak("Navigating to settings");
        window.location.href = 'index.php?page=change_password';
    } else if (command.includes('logout') || command.includes('log out') || command.includes('look out') ) {
        speak("Goodbye and see you next time.");
        window.location.href = '../../../Model/gestion user/logout.php';
    } else {
        speak("Sorry, I did not understand the command.");
    }
}

function speak(text) {
    const utterance = new SpeechSynthesisUtterance(text);
    window.speechSynthesis.speak(utterance);
}

recognition.start();
