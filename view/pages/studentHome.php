<?php
	try {
		$dbh = db::getInstance();
	}catch(PDOException $e) {
		die('Could not connect');
	}

	$tableheader = false;
	$query = "SELECT * FROM Tutor";
	$sth = $dbh->prepare($query);

	if(!$sth->execute()) {
		die('Did not execute');
	}

	echo "<table>";

	while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
		if($tableheader == false) {
			echo '<tr>';
			foreach($row as $key=>$value) {
				echo "<th>{$key}</th>";
			}
			echo '</tr>';
			$tableheader = true;
		}
		echo "<tr>";
		foreach($row as $value) {
			if ($value=="0"){
				echo"<td>Free</td";
			} else {
				echo "<td>{$value}</td>";
			}
		}
		echo "</tr>";
	}
	echo "</table>";
?>
