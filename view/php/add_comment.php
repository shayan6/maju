<?php
session_start();
//add_comment.php
if(isset($_POST['post_id'])){

	// Database connection +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	include './db.php';

	// Create connection*************************************************************************************************
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection*************************************************************************************************
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
    } 

    
    $post_id = filter_var($_POST["post_id"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $user_id = $_SESSION['user_id'];
    $comment_content = filter_var($_POST["comment_content"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $comment_type = filter_var($_POST["comment_type"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    // for reply purpose
    $parent_comment_id = filter_var($_POST["parent_comment_id"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    $sql = "
            INSERT INTO comment 
            (parent_comment_id, comment, user_id, post_id, created_at, comment_type_id) 
            VALUES ('$parent_comment_id', '$comment_content', '$user_id', '$post_id', NOW(), '$comment_type' )
            ";

    if ($conn->query($sql) === TRUE) {
        echo '<label class="text-success">Comment Added</label>';
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}