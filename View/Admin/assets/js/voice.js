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
    if (command.includes('hey proschool') || command.includes('hey pro school')|| command.includes('hey pre school')|| command.includes('hey preschool')) {
        // Activation word detected, continue listening
        console.log('Activation word detected.');
        speak("Yes, how can I help you?");
     if (command.includes('dashboard')) {
        speak("Navigating to dashboard");
        window.location.href = 'index.php';
    } else if (command.includes('class management') || command.includes('class')) {
        speak("Navigating to class management");
        window.location.href = 'index.php?page=AC';
    } else if (command.includes('subject management') || command.includes('subject')) {
        speak("Navigating to subject management");
        window.location.href = 'index.php?page=ASU';
    } else if (command.includes('events management') || command.includes('events')) {
        speak("Navigating to events management");
        window.location.href = 'index.php?page=CE';
    } else if (command.includes('add teacher')) {
        speak("Navigating to add teacher account");
        window.location.href = 'index.php?page=AT';
    } else if (command.includes('add student')) {
        speak("Navigating to add student account");
        window.location.href = 'index.php?page=AS';
    } else if (command.includes('check teachers')) {
        speak("Navigating to check teachers");
        window.location.href = 'index.php?page=CT';
    } else if (command.includes('check students')) {
        speak("Navigating to check students");
        window.location.href = 'index.php?page=CS';
    } else if (command.includes('list subjects')) {
        speak("Navigating to list subjects");
        window.location.href = 'gestion cours/ListSubjects.php';
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
        window.location.href = '../../model/gestion user/logout.php';
    } 
} 
}

function speak(text) {
    const utterance = new SpeechSynthesisUtterance(text);
    window.speechSynthesis.speak(utterance);
}

recognition.start();
