<?php
   include_once("dbconn.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      $database = db::getInstance();
      $username = mysqli_real_escape_string($database,$_POST['username']);
      $password = mysqli_real_escape_string($database,$_POST['password']);
      $error =  "";


      $sql = "SELECT id FROM students WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($database,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         session_register("username");
         $_SESSION['login_user'] = $username;

         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
