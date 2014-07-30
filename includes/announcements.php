

<?php /* ANNOUNCEMENTS */ 
	include_once 'db_connect.php' ;
	$query = "SELECT * FROM announcements WHERE front=1";
	if (!$result = $mysqli->query($query))
		die('Query Error');
	$done = 0; 
	while ($row = $result->fetch_assoc()){
		echo "<div class='alert alert-".$row['Style']."' role='alert'><b>".$row['Title']."</b> ".$row['Content']."</div>";
		$done = 1;
	}
	if ( $done == 1 )
		echo "<hr><br>" ;
?>
