<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) != true) {
    header( 'Location: /login.php' ) ;
	exit();
}

?>
<?php
	/* SETTING VARIABLES*/
	$page = "Update Status" ;
	include 'includes/top.php' ; 
?>
<?php
	include_once 'includes/db_connect.php' ;
	
	if (!isset($_POST['content'])) {
		$query = "SELECT status FROM members WHERE id = " . $_SESSION['user_id'] . " LIMIT 1";
		if (!$result = $mysqli->query($query))
			die('Query Error');
		$row = $result->fetch_assoc();
			
			
	echo "
		<form action='/update.php' method='post'>
		<p style='text-align:center;'><b>Updating for " . $_SESSION['username'] . ":</b><br></p>
		<textarea title='Put your update here...' name='content' rows='8' cols='75'>".$row['status']."</textarea><br>
		<input class='submit' type='submit' value='Submit'>
		</form>" ;
	} else {
		echo "<p><b>Setting " . $_SESSION['username'] . "'s content to the following:<br><br></b>" . $_POST['content'] . "</p>";
		$query = "UPDATE members SET status='" . htmlspecialchars($_POST['content'], ENT_QUOTES) . "',statusadded='" . date( 'Y-m-d H:i:s' ) . "' WHERE id='".$_SESSION['user_id']."'";
		if (!$result = $mysqli->query($query))
			die('Query Error');
		echo "<p><br><br>Successfully Updated!</p><br><form action='/'><input class='submit' type='submit' value='Back...'></form>";
	}
?>

<?php include 'includes/bottom.php' ; ?>
