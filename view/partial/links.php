<?php
// Start the session
session_start();
if (isset($_SESSION['loggedIn'])) { } else {
    header('Location: ./login.php');
}
include './partial/links-without-session.php';
?>