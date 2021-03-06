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
	#contact {
		display: none;
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
					if (parseFloat(td.innerHTML) >= parseFloat(filter) || filter=="") {
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

		var span = document.getElementsByClassName("close")[0];
		var text = document.getElementById("textBody");
		var email = element.parentElement.parentElement.cells[1].innerHTML;
		var phone = element.parentElement.parentElement.cells[2].innerHTML;

		modal.style.display = "block";

		text.innerHTML = "Email: "+email+", Phone: "+phone+"Click off the popup to close";


		span.onclick = function() {
				modal.style.display = "none";
		}

		window.onclick = function(event) {
				if (event.target == modal) {
						modal.style.display = "none";
				}
		}

	}
	function updateSearch(){
    document.getElementById("myInput").placeholder="Search for "+document.getElementById("searchSelect").options[document.getElementById("searchSelect").selectedIndex].value;
  }
</script>

<input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Search for name">
&nbsp; Select search parameter:
<select id="searchSelect" onchange="updateSearch()">
  <option value="name">Name</option>
  <option value="year">Year</option>
  <option value="major">Major</option>
  <option value="min gpa">Minimum GPA</option>
</select>
<table class = "tutorTable" id = "tutorTable">
	<?php while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
		if($tableheader == false) { ?>
			<tr>
				<?php foreach($row as $key=>$value) { ?>
					<?php if ($key=="phone" || $key =="email"){ ?>
						<th id="contact"> <?php echo "${key}" ?> </th>
					<?php } else {?>
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
				<?php }
			} ?>
			</tr>
			<?php $tableheader = true;
		} ?>
		<tr name="tutors">
				<?php $count = 0;
				foreach($row as $value) {
						$count++;
						if ($count>1 && $count <4){
							?>
							<td id = "contact">
								<?php echo "{$value}"; ?>
							</td>
					<?php } else {?>
						<td>
							<?php if ($value=="0"){
								echo '<div style="color: #45a049">&#10003</div>';
							} else if ($value==null){
								echo '<div style="color: #a0459c">&#10007</div>';
							} else {
								echo "{$value}";
							}?>
						</td>
				<?php }
				} ?>
				<td>
					<button type="button" id="contactBtn" onclick="popup(this)">Contact Information</button>
				</td>
		</tr>
	<?php } ?>
</table>

<div id="myModal" class="modal">
  <div class="modal-content" id = "textBody">
  </div>
	<span class="close">&times;</span>
</div>
