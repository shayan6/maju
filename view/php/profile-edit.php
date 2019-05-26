<?php

// Database connection +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
include './db.php';

// Create connection*************************************************************************************************
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection*************************************************************************************************
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id = filter_var($_POST["user_id"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$name = filter_var($_POST["full_name"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$old_password = filter_var($_POST["old_password"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$new_password = filter_var($_POST["new_password"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$hashedpassword = password_hash($new_password, PASSWORD_BCRYPT);

if (empty($id) || empty($name) || empty($old_password) || empty($new_password)) {
    echo "Empty Input Is Coming!";
} else {

    $sql = "SELECT * FROM user WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck < 1) {
        echo "Incorrect Id!";
    } else {
        if ($row = mysqli_fetch_assoc($result)) {
            //dehashing
            if (password_verify($old_password, $row['password'])) {

                //every thing is fine #####################################################################
                $sql = "UPDATE user SET name = '$name', password = '$hashedpassword' WHERE id = '$id'";

                if ($conn->query($sql) === TRUE) {
                    echo "success";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            } else {
                echo "Incorrect Password!";
            }
        }
    }
}
