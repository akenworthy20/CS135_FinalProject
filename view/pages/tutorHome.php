  <div align = "center">
    <h2> Tutor Home </h2>

  <div align = "left">
    <p> <strong> Welcome to the tutor home page! </strong> </br>
      <?php
      try {
        $dbh = db::getInstance();
      }catch(PDOException $e) {
        die('Could not connect');
      }

      $query = "SELECT * FROM Student";
      $sth = $dbh->prepare($query);
      if(!$sth->execute()) {
    		die('Did not execute');
    	} else {
         $numstudents = $sth->rowCount();
      }
      echo "There are currently " . $numstudents . " students registered for TutorMatch!";
      ?>
    </p> </br> <hr>

    <span> All you have to do now is wait!  When a student wants to solicit you
      as a tutor, they can get your contact info and will reach out, so make sure to keep an eye
      on your phone and email! Thank you for using TutorMatch! </span>
</div>