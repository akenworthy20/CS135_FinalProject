<?php

require_once('dbconn.php');

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 // Check usernme present
    if(empty(trim($_POST["username"]))){
       $username_err = 'Please enter username.';
    } else{
       $username = trim($_POST["username"]);
    }
    
    // Check password present
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
      }
}

if(empty($username_err) && empty($password_err)) { 
	$sql = "SELECT username, password FROM students WHERE username = ?";

	if($stmt = mysqli_prepare($link, $sql)) {

		mysqli_stmt_bind_param($stmt,"s", $param,_username);

		//Set parameters
		$param_username = $username; 

		if(mysqli_stmt_execute($stmt)) {
			mysqli_stmt_store_result($stmt);

			if(mysqli_stmt_num_rows($stmt) == 1) {
				mysqli_stmt_bind_result($stmt, $username, $hashed_password);

				if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){

                        	session_start();
                            $_SESSION['username'] = $username;      
                            header("location: welcome.php");
                        } else {
                        	 $password_err = 'The password you entered was not valid.';
                        }
            	}
            } else {
            	 $username_err = 'No account found with that username.';
              }
 			} else {
 				echo "Ooops! Something went wrong. Please try again later.";
 			}            

        }

        mysqli_stmt_close($stmt);
	}
	mysqli_close($link);
}
?>
