<?php
	try {
		$dbh = db::getInstance();
	}catch(PDOException $e) {
		die('Could not connect');
	}

	$tableheader = false;
	$query = "SELECT name,email,phone,year,major,gpa,bio,monday,tuesday,wednesday,thursday,friday,saturday,sunday FROM Tutor";
	$sth = $dbh->prepare($query);

	if(!$sth->execute()) {
		die('Did not execute');
	}
?>
<style>
	.zui-table {
	    border: solid 1px #DDEEEE;
	    border-collapse: collapse;
	    border-spacing: 0;
	    font: normal 13px Arial, sans-serif;
	}
	.zui-table thead th {
	    background-color: #DDEFEF;
	    border: solid 1px #DDEEEE;
	    color: #336B6B;
	    padding: 10px;
	    text-align: left;
	    text-shadow: 1px 1px 1px #fff;
	}
	.zui-table tbody td {
	    border: solid 1px #DDEEEE;
	    color: #333;
	    padding: 10px;
	    text-shadow: 1px 1px 1px #fff;
	}
</style>
<table class = "zui-table" id = "zui-table">
	<?php while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
		if($tableheader == false) { ?>
			<tr>
				<?php foreach($row as $key=>$value) { ?>
				<th>
					<?php
						if ($key=="monday"){
							echo "M";
						} else if ($key=="tuesday"){
							echo "T";
						} else if ($key=="wednesday"){
							echo "W";
						} else if ($key=="thursday"){
							echo "Tr";
						} else if ($key=="friday"){
							echo "F";
						} else if ($key=="saturday"){
							echo "Sat";
						} else if ($key=="sunday"){
							echo "Sun";
						} else {
							echo "{$key}";
						}

					?>
				</th>
				<?php } ?>
			</tr>
			<?php $tableheader = true;
		} ?>
		<tr>
				<?php foreach($row as $value) {  ?>
					<td>
					<?php if ($value=="0"){
						echo "Free";
					} else {
						echo "{$value}";
					} ?>
					</td>
				<?php } ?>
		</tr>
	<?php } ?>
</table>
