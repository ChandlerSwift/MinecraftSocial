<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

sec_session_start();

if (login_check($mysqli) != true)
	header('Location: /login.php');

if (!is_null($_POST['content'])) {
	$CONTENT = htmlspecialchars($_POST['content'], ENT_QUOTES);

	$query = "INSERT INTO bulletinboard (userid, content) VALUES ('". $_SESSION['user_id'] . "', '" . $CONTENT . "')";
	if(!$result = $mysqli->query($query))
		die('There was an error');
	}
header('Location: index.php');
?>
