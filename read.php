<?php /* SETTING VARIABLES*/
	$page = "Read Statuses" ;
?>

<?php include_once 'includes/top.php' ; ?>

<?php
	include_once 'includes/db_connect.php' ;
	
	$query = "SELECT username , status, statusadded
		FROM members
		WHERE 1";
	
	if (!$result = $mysqli->query($query))
		die('Query Error');
				    
	echo "<table class='table'>
	<thead>
	<tr>
	<th>Username</th>
	<th>Date/Time&nbsp;Added</th>
	<th>Status Update</th>
	</tr>
	<tbody>";
					
	while($row = $result->fetch_assoc()) {
	  $statusadded = date("F j, Y\<\b\\r\>g:i a", strtotime(date($row['statusadded'])) );
	  echo "<tr>";
	  echo "<td>" . $row['username'] . "</td>";
	  echo "<td>" . $statusadded . "</td>";
	  echo "<td>" . $row['status'] . "</td>";
	  echo "</tr>";
	}
	$result->free();
	echo "</tbody>
</table>";
?>

<?php include_once "includes/bottom.php" ; ?>
