<?php
include '../Controller/chat_con.php';  
require_once 'chat.php';  

$chatC = new ChatCon("chat");

// Check if the required POST data are available and not empty
if (
    isset($_POST["message"]) &&
    isset($_POST["id_user"]) &&
    isset($_POST["id_reclamation"]) &&
    isset($_POST["id_user_dest"]) &&
    !empty($_POST["message"]) &&
    !empty($_POST["id_user"]) &&
    !empty($_POST["id_reclamation"]) &&
    !empty($_POST["id_user_dest"])
) {
    // Creating a DateTime object for the current time
    $currentDateTime = new DateTime();

    // Creating a new Chat object
    $chat = new Chat(
        0,  // Assuming ID is auto-incremented and not needed when creating a new record
        $_POST['message'],
        $currentDateTime,
        $_POST['id_user'],
        $_POST['id_reclamation'],
        $_POST['id_user_dest']
    );

    // Using the chat controller to add the chat message to the database
    $chatC->addMessage($chat);
    if($chat->getIdUser() == 1){
        header('Location: ../view/admin/index.php?page=chat&id_reclamation='.$_POST['id_reclamation']);
    }else
    header('Location: ../view/etudiant/course-message.php'); // Redirect with success indicator
    exit;
} else {
    header('Location: ../view/etudiant/course-message.php?result=4'); // Redirect with error indicator for empty fields
    exit;
}
?>
