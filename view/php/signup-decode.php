<?php
session_start();

if (in_array(3, $_SESSION['access'])) {
	//  if(isset($_POST)){
	// Database connection +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	include './db.php';

	// Create connection*************************************************************************************************
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection*************************************************************************************************
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$userId = filter_var($_POST["userId"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$userPassword = filter_var($_POST["userPassword"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$hashedpassword = password_hash($userPassword, PASSWORD_BCRYPT);
	$role = filter_var($_POST["role"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

	$sql = "SELECT id FROM user WHERE maju_id='$userId'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// User Already Exist*************************************************************************************************
		echo 'Roll No Already Exist';
	} else {

		$sql = "INSERT INTO user (role_id, name, maju_id, password, created_at)
 		VALUES ('" . $role . "', '" . $username . "', '" . $userId . "', '" . $hashedpassword . "', NOW() )";

		if ($conn->query($sql) === TRUE) {
			$last_id = mysqli_insert_id($conn);
			switch ($role) {
				case 1: //Admin
					$sql = "INSERT INTO user_access (user_id, access_id, created_access_at)
 					VALUES ('" . $last_id . "', '1', NOW()),('" . $last_id . "', '2', NOW()),('" . $last_id . "', '3', NOW())";
					break;
				case 2: //teacher
					$sql = "INSERT INTO user_access (user_id, access_id, created_access_at)
					VALUES ('" . $last_id . "', '1', NOW())";
					break;
				case 3: //Student
					$sql = "INSERT INTO user_access (user_id, access_id, created_access_at)
					VALUES ('" . $last_id . "', '2', NOW())";
					break;

				default:
					break;
			}
			if ($conn->query($sql) === TRUE) {
				echo "success";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	// 1. Stats
	// 2. Uploads
	// 3. Create user
}
