<?php
   include_once("dbconn.php");
   session_start();

   $error = ' ';

   if(isset($_POST['submit'])) {
      // email and password sent from form
      $db = db::getInstance();

      $email = mysqli_real_escape_string($db,$_POST['email']);
      $password = mysqli_real_escape_string($db,$_POST['password']);


      $sql = "SELECT id FROM students WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $email and $password, table row must be 1 row

      if($count == 1) {
         session_register("email");
         $_SESSION['login_user'] = $email;
         header("Location: welcome.php");
      } else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
      }
   }
?>
