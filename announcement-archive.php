<?php
	/* SETTING VARIABLES*/
	$page = "Announcement Archive" ;

	include 'includes/top.php' ; 
?>

<?php
	
	$query = "SELECT * FROM announcements WHERE front=0";
	if (!$result = $mysqli->query($query))
		die ('query error');
	while($row = $result->fetch_assoc()) {
		echo "<div class='alert alert-".$row['Style']."' role='alert'><b>".$row['Title']."</b> ".$row['Content']." (".$row['DateTime'].")</div>";
	}
?>

<?php include 'includes/bottom.php' ; ?>
