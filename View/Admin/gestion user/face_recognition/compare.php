<?php
require '../../../../Controller/connect.php'; 

session_start(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty($_POST['mail']) && !empty($_POST['password'])) {
        $mail = trim($_POST['mail']);
        $password = $_POST['password']; 

        $pdo = config::getConnexion();

        $stmt = $pdo->prepare("SELECT id, email, password, role, name, lastname, age, status FROM user WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $mail);
        $stmt->execute();

        if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            if (password_verify($password, $user['password'])) {
                
                // Regenerate session ID upon successful login
                session_regenerate_id();

                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['lastname'] = $user['lastname'];
                $_SESSION['age'] = $user['age'];
                $_SESSION['status'] = $user['status'];
                $_SESSION['password'] = $password;
                // Remove password from session after use, if previously stored
                // Recommend not storing passwords in session

                header('Location: face.php');
                exit;
            } else {
                header('Location: ../../../index.php?page=1');
                exit;
            }
        } else {
            header('Location: ../../../index.php?page=2');
            exit;
        }
    } else {
        header('Location: ../../../index.php?page=3');
        exit;
    }
} else {
    header('Location: ../../../index.php?page=4');
    exit;
}
?>
