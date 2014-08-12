<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

sec_session_start();

if (login_check($mysqli) != true)
	header('Location: /login.php');
?>

<?php include '../includes/top.php'; ?>

<div style="padding:10px;text-align:center;">
		<form action='process.php' method="post">
			<textarea name="content" rows="5" cols="75"></textarea><br>
			<input class='submit' type="submit" value="Submit">
		</form>
</div>

<?php include '../includes/bottom.php'; ?>
