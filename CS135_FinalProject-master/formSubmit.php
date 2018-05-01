<?php
  function studentRegister($name, $email, $phone_number, $major, $m, $t, $w, $th, $f, $sat, $sun, $grad_year){
    if(!isset($_POST['submitted']))
	    {
        return false;
	    }
    INSERT INTO Student(id, name, email, major, monday, tuesday, wednesday, thursday, friday, saturday, sunday, grad_year)
    VALUES ($name, $email, $phone_number, $major, $m, $t, $w, $th, $f, $sat, $sun, $grad_year);
  }

  register($name, $email, $phone_number, $major, $m, $t, $w, $th, $f, $sat, $sun, $grad_year);
?>
