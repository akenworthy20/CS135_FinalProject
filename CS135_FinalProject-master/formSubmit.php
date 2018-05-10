<?php
function studentSubmit($name, $email, $phone, $password, $major, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday){
    
	try{
	    $pdo = db::getInstance();
	    // Set the PDO error mode to exception
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	    die("ERROR: Could not connect");
	}

	try {

		$sql = "INSERT INTO Students (name, email, phone, password, major, monday, tuesday , wednesday, thursday, friday, saturday, sunday VALUES (:name, :email, :phone_number, :major, :monday, :tuesday, :wednesday, :th , :friday, :saturday, :sunday)";
			
		$stmt = $pdo->prepare($sql);

		$stmt->bindParam(':name', $_REQUEST['name']);
		$stmt->bindParam(':email', $_REQUEST['email']);
		$stmt->bindParam(':phone', $_REQUEST['phone']);
		$stmt->bindParam(':password', $_REQUEST['password']);
		$stmt->bindParam(':monday', $_REQUEST['monday']);
		$stmt->bindParam(':tuesday', $_REQUEST['tuesday']);
		$stmt->bindParam(':wednesday', $_REQUEST['wednesday']);
		$stmt->bindParam(':thursday', $_REQUEST['thursday']);
		$stmt->bindParam(':friday', $_REQUEST['friday']);
		$stmt->bindParam(':saturday', $_REQUEST['saturday']);
		$stmt->bindParam(':sunday', $_REQUEST['sunday']);

		$stmt->execute(); 
		echo "Records inserted successfully.";
	} catch (PDOException $e) {
		die("ERROR: Could not execute $sql.");
	}
 
 unset($pdo);
}
?>
    
 