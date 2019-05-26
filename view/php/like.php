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

    $user_id = $_SESSION['user_id'];
    $post_id = $_POST['post_id'];

    if ($_POST['like'] == 'false') {
        //insert record
		$sql = "INSERT INTO maju_pms.like (user_id, post_id, created_at)
        VALUES ('" . $user_id ."', '" . $post_id . "', NOW() )";
        if ($conn->query($sql) === TRUE) {
            echo 'inserted';
        }else{
            echo $conn->error;
        }

    } else {
        // sql to delete a record
        $sql = "DELETE FROM maju_pms.like WHERE user_id = $user_id AND post_id = $post_id";
        if ($conn->query($sql) === TRUE) {
            echo 'deleted';
        }
    }
}
