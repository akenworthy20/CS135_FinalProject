<?php
	try {
		$dbh = db::getInstance();
	}catch(PDOException $e) {
		die('Could not connect');
	}

	$tableheader = false;
	$query = "SELECT name,year,major,gpa,bio,monday,tuesday,wednesday,thursday,friday,saturday,sunday FROM Tutor";
	$sth = $dbh->prepare($query);

	$queryContact = "SELECT phone,email FROM Tutor";
	$sthContact = $dbh->prepare($queryContact);

	if(!$sth->execute()) {
		die('Tutor info not execute');
	}
	if(!$sthContact->execute()) {
		die('Tutor contact info not execute');
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
	/* The Modal (background) */
	.modal {
	    display: none; /* Hidden by default */
	    position: fixed; /* Stay in place */
	    z-index: 1; /* Sit on top */
	    left: 0;
	    top: 0;
	    width: 100%; /* Full width */
	    height: 100%; /* Full height */
	    overflow: auto; /* Enable scroll if needed */
	    background-color: rgb(0,0,0); /* Fallback color */
	    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content/Box */
	.modal-content {
	    background-color: #fefefe;
	    margin: 15% auto; /* 15% from the top and centered */
	    padding: 20px;
	    border: 1px solid #888;
	    width: 80%; /* Could be more or less, depending on screen size */
	}

	/* The Close Button */
	.close {
	    color: #aaa;
	    float: right;
	    font-size: 28px;
	    font-weight: bold;
	}

	.close:hover,
	.close:focus {
	    color: black;
	    text-decoration: none;
	    cursor: pointer;
	}
</style>
<script>
	function searchFunction() {
	  // Declare variables
	  var input, filter, table, tr, td, i, searchParameter;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("tutorTable");
		tr = table.getElementsByTagName("tr");
		searchParameter = document.getElementById("searchSelect").selectedIndex;

	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
			if (searchParameter==0) {//name
				td = tr[i].getElementsByTagName("td")[0];
			} else if (searchParameter==1){ //year
				td = tr[i].getElementsByTagName("td")[3];
			} else if (searchParameter==2){ //major
				td = tr[i].getElementsByTagName("td")[4];
			} else { //gpa
				td = tr[i].getElementsByTagName("td")[5];
			}
	    if (td) {
				if (td != tr[i].getElementsByTagName("td")[5]){
		      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
				} else {
					if (parseFloat(td.innerHTML) >= parseFloat(filter)) {
		        tr[i].style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
				}
	    }
	  }
	}
	function popup(element){
		var modal = document.getElementById('myModal');

		var name = document.getElementById(element).parentElement.parentElement.find('td');

		alert(name);

		var span = document.getElementsByClassName("close")[0];
		modal.style.display = "block";

		span.onclick = function() {
		    modal.style.display = "none";
		}

		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}

	}
</script>

<input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Search for names..">
&nbsp; Select search parameter:
<select id="searchSelect">
  <option value="name">Name</option>
  <option value="year">Year</option>
  <option value="major">Major</option>
  <option value="gpa">GPA Above</option>
</select>
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
				<th>

				</th>
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
				<td>
					<button type="button" id="contactBtn" onclick="popup(this.id)">Contact Information</button>
				</td>
		</tr>
	<?php } ?>
</table>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <?php
		//This is where the data should go for the relevant tutor.  Maybe just access it all through the javascript?
			while ($row = $sthContact->fetch(PDO::FETCH_ASSOC)){
				foreach($row as $value){
					echo "{$value}";
				}
			}
		?>
  </div>
</div>
