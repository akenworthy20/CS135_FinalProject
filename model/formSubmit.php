<?php
  include_once("dbconn.php");
  session_start();

  $name=$email=$phone=$password=$major=$monday=$tuesday=$wednesday=$thursday=$friday=$saturday=$sunday=" ";

  function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
function studentSubmit($name, $email, $phone, $password, $major, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday){
    
	try{
	    $pdo = new PDO("mysql:host=localhost;dbname=TM", "root", "root", $pdo_options);
	    // Set the PDO error mode to exception
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	    die("ERROR: Could not connect. " . $e->getMessage());
	}

	try {

		$sql = "INSERT INTO Students (name, email, phone, password, major, monday, tuesday , wednesday, thursday, friday, saturday, sunday VALUES (:name, :email, :phone_number, :major, :monday, :tuesday, :wednesday, :th', ':f', ':sat', ':sun')";
			
		$stmt = $pdo->prepare($sql);

		$stmt->bindParam(':name', $_REQUEST['name']);
		$stmt->bindParam(':email', $_REQUEST['email']);
		$stmt->bindParam(':phone', $_REQUEST['phone']);
		$stmt->bindParam(':password', $_REQUEST['password']);
		$stmt->bindParam(':monday', $_REQUEST['monday']);
		$stmt->bindParam(':tuesday', $_REQUEST['tuesday']);
		$stmt->bindParam(':wednesday', $_REQUEST['wednesday']);
		$stmt->bindParam(':thursday', $_REQUEST['th']);
		$stmt->bindParam(':friday', $_REQUEST['f']);
		$stmt->bindParam(':saturday', $_REQUEST['sat']);
		$stmt->bindParam(':sunday', $_REQUEST['sun']);

		$stmt->execute(); 
		echo "Records inserted successfully.";
	} catch (PDOException $e) {
		die("ERROR: Could not execute $sql. " . $e -> getMesesage());
	}
 
 unset($pdo);
}   

  if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
      echo "<strong> Name is required </strong><br/>";
    } else {
      $name = sanitize($_POST['name']);
      if (!preg_match("/^[a-zA-Z]*$/",$name)) {
        echo "<strong> Please use only letters and white space </strong><br/>";
      }
    }
    if (empty($_POST['email'])) {
      echo "<strong> E-mail is required </strong><br/>";
    } else {
      $email = sanitize($_POST['email']);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<strong> Please enter a valid e-mail </strong><br/>";
      }
    }
    if (empty($_POST["phone"])) {
        echo "<strong> Please input full, valid US phone number </strong><br/>";
    } else {
      $phone = sanitize($_POST["phone"]);
      // check phone number syntax to ensure it is 10 digits long, exactly
      if (!preg_match("/[\d{3}]-?[\d{3}]-?[\d{4}]/",$phone)) {
        echo "<strong> Please input full, valid US phone number </strong><br/>";
      }
    }
    if (empty($_POST["password"])) {
        echo "<strong> Please input password </strong><br/>";
    } else {
      $password = sanitize($_POST["password"]);
      if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,10}/",$password)) {
        echo "<strong> Minimum eight and maximum 10 characters, at least one uppercase letter, one lowercase letter, one number and one special character </strong><br/>";
      }
    }
    if (empty($_POST["major"])) {
        echo "<strong> Please input a major </strong><br/>";
    } else {
      $major = sanitize($_POST["major"]);
      if (!preg_match("/^[a-zA-Z]*$/",$major)) {
        echo "<strong> Please use only letters and white space </strong><br/>";
      }
    }
    if(!isset($_POST["monday"]) && !isset($_POST["tuesday"]) && !isset($_POST["wednesday"]) && !isset($_POST["thursday"]) && !isset($_POST["friday"]) && !isset($_POST["saturday"]) && !isset($_POST["sunday"])){
      echo "<strong> Please select your availability </strong><br/>";
    }

//non-required form elements from tutorRegister//
    if (!empty($_POST["gpa"])) {
      $gpa = sanitize($_POST["major"]);
      if (!preg_match("/[0-4].[0-9]/",$gpa)) {
        echo "<strong> Please round your gpa to the nearest tenth </strong><br/>";
      }
    }
    if (!empty($_POST["bio"])) {
      $bio = sanitize($_POST["bio"]);
      // check phone number syntax to ensure it is 10 digits long, exactly
      if (!preg_match("/^[a-zA-Z]*$/",$bio)) {
        echo "<strong> Please use only letters and white space </strong><br/>";
      }
    }
    studentSubmit($name, $email, $phone, $password, $major, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);
  }
?>
