<?php

session_start();

// Prevent this page from being cached by the browser.
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Check if the user is logged in.
// For example, if you're storing user's ID in $_SESSION['user_id'] after they log in,
if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 1) {
        header('Location: ../../../../proschool/view/teacher/template/error-404.html');
        exit;
    }
}
if (!isset($_SESSION['id'])) {
    // The user is not logged in, redirect to the login page.
    header('Location: ../../../../proschool/view/teacher/template/error-404.html');
    exit;
}

// The rest of your protected page code goes here.
?>