<?php
   include_once("dbconn.php");
   session_start();
   if(isset($_POST['submit'])) {
      // email and password sent from form
      $pdo = db::getInstance();
      $sqlTutor = "SELECT id, email, password FROM Tutor WHERE email = :email";
      $sqlStudent = "SELECT id, email, password FROM Student WHERE email = :email";
      $stmtTutor = $pdo->prepare($sqlTutor);
      $stmtStudent = $pdo->prepare($sqlStudent);
      $emailInput = $_REQUEST['email'];
      $passInput = $_REQUEST['password'];
      $stmtTutor->bindParam(':email', $emailInput);
      $stmtStudent->bindParam(':email', $emailInput);
      $stmtTutor->execute();
      $stmtStudent->execute();
      $userTutor = $stmtTutor->fetch(PDO::FETCH_ASSOC);
      $userStudent = $stmtStudent->fetch(PDO::FETCH_ASSOC);
      if ($userTutor == false && $userStudent == false){
        die('incorrect');
      } else {
        if ($userTutor['password'] == $passInput){
          echo("correct tutor login");
        } else if ($userStudent['password'] == $passInput){
          header("Refresh:0; url=?controller=pages&action=studentHome");
        } else {
          header("Refresh:0; url=?controller=pages&action=tutorHome");
        }
      }
   }
?>
