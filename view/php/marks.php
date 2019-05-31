<?php
session_start();
if (isset($_POST)) {
    // Database connection +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    include './db.php';

    // Create connection*************************************************************************************************
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection*************************************************************************************************
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $id = filter_var($_POST["id"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $post_marks = filter_var($_POST["post_marks"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    $sql = "UPDATE post SET post_marks='$post_marks' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}