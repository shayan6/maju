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

    $title = $_FILES['file']['name'];
    $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $currentUser = $_SESSION['user_id'];
    // check there are no errors*************************************************************************************************
    if ($_FILES['file']['error'] == 0) {

        $name = $_FILES['file']['name'];
        $string = explode('.', $_FILES['file']['name']);
        $ext = strtolower(end($string));
        $type = $_FILES['file']['type'];
        $tmpName = $_FILES['file']['tmp_name'];

        // check the file is a csv*************************************************************************************************
        if ($ext === 'pdf' || $ext === 'docx' || $ext === 'txt' || $ext === 'html' || $ext === 'csv'|| $ext === 'xlsx' ) {             
                $fileName = time();
                move_uploaded_file($_FILES["file"]["tmp_name"], "../uploads/files/".$fileName.'.'.$ext);

                // finally insert in database #################################################
                $sql = "INSERT INTO post (user_id, title, description, file, created_at)
                VALUES ('" . $currentUser ."', '" . $title . "', '" . $description . "', '" . $fileName.'.'.$ext . "', NOW() )";
                if ($conn->query($sql) === TRUE) {
                    echo "success";
                }else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

        } else {
            echo 'Invalid File Type';
        }
    } else {
        echo 'Unable To Open File';
    }
}
