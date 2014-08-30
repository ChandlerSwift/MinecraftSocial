<?php
	/* SETTING VARIABLES*/
	$page = "Announcement Archive" ;

	include 'includes/top.php' ; 
?>

<?php
	
	$query = "SELECT * FROM announcements WHERE front=0";
	if (!$result = $mysqli->query($query))
		die ('query error');
	if ($result->num_rows == 0)
		echo "<div style='text-align:center;'><br><br><br><b>No Announcements Found :(</b>";
	while($row = $result->fetch_assoc()) {
		echo "<div class='alert alert-".$row['Style']."' role='alert'><b>".$row['Title']."</b> ".$row['Content']." (".$row['DateTime'].")</div>";
	}
?>

<?php include 'includes/bottom.php' ; ?>
