<?php 
  // Start the session
  session_start();
  if(isset($_POST)){

      // Database connection +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
      include './db.php';

      // Create connection*************************************************************************************************
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection*************************************************************************************************
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
      
      $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

      if(empty($name) || empty($password)){
          echo "empty";
      }
      else{ 

        $sql = "SELECT 
                  u.* 
                  , ( SELECT r.`role_name` FROM `role` r WHERE r.`id` = u.`role_id`) AS role_name
                FROM `user` u WHERE maju_id = '$name'";
        
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck < 1) {
          echo "incorrect username";
        }
        else{
          if($row = mysqli_fetch_assoc($result)){
              //dehashing
              if (password_verify($password, $row['password'])) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['full_name'] = $row['name'];
                $_SESSION['role_name'] = $row['role_name'];
                $_SESSION['image'] = $row['image'];
                $user_id = $row['id'];
                $sql = "SELECT * FROM user_access WHERE user_id = '$user_id'";
              
                $result = mysqli_query( $conn , $sql );
                $_SESSION['access'] = array();

                foreach ($result as $access){ 
                  array_push($_SESSION['access'], $access['access_id']);
                } 

                echo "success";
              }
              else{ 
                echo "incorrect password";

              }
          }
        }
            
    }
  }
?>