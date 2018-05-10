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
	.tutorTable {
	    border: solid 1px #DDEEEE;
	    border-collapse: collapse;
	    border-spacing: 0;
	    font: normal 13px Arial, sans-serif;
			width: 100%; /* Full-width */
	}
	.tutorTable thead th {
		
	    background-color: #DDEFEF;
	    border: solid 1px #DDEEEE;
	    color: #336B6B;
	    padding: 10px;
	    text-align: left;
	    text-shadow: 1px 1px 1px #fff;
	}
	.tutorTable tbody td {
	    border: solid 1px #DDEEEE;
	    color: #333;
	    padding: 10px;
	    text-shadow: 1px 1px 1px #fff;
	}
</style>
<script>
	function searchFunction() {
	  // Declare variables
	  var input, filter, table, tr, td, i;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("tutorTable");
		tr = table.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[0];
	    if (td) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    }
	  }
	}
</script>

<input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Search for names..">
<table class = "tutorTable" id = "tutorTable">
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
		<tr name="tutors">
				<?php foreach($row as $value) {  ?>
					<td>
					<?php if ($value=="0"){
						echo '<div style="color: #45a049">&#10003</div>';
					} else if ($value==null){
						echo '<div style="color: #a0459c">&#10007</div>';
					} else {
						echo "{$value}";
					}?>
					</td>
				<?php } ?>
		</tr>
	<?php } ?>
</table>
