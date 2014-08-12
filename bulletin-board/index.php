<?php
	/* SETTING VARIABLES*/
	$page = "Bulletin Board" ;
	include '../includes/top.php' ; 
?>

<div style="text-align:center;">Displaying up to 100 most recent posts. <?php if ($logged == in ) : ?><a href="post.php">New Post</a><?php endif ; ?></div>

<?php
include_once '../includes/db_connect.php';

$query = "SELECT * FROM `bulletinboard` WHERE 1 ORDER BY `id` DESC LIMIT 0,100";
if (!$result = $mysqli->query($query))
	die("DB ERROR :(");
if ($result->num_rows == 0)
	echo "<div style='text-align:center;'><br><br><br><b>No Posts Found :(</b>";
while($row = $result->fetch_assoc()){
	$userid_query = "SELECT `username` FROM `members` WHERE `id` = ". $row["userid"];
	if (!$userid_result = $mysqli->query($userid_query))
		die("DB ERROR 1 :(");
	$userid_row = $userid_result->fetch_assoc();
	$time = strtotime($row['time']);
	if (date("Y", $time) == date("Y")) {
		if (date("F j", $time) == date("F j")) {
			$custom_time = date("\T\o\d\a\y \a\\t g:i A", $time);
		} else {
			$custom_time = date("F j \a\\t g:i A", $time);
		}
	} else {
		$custom_time = date("F j, Y \a\\t g:i A", $time);
	}
	echo "<p><b>" . $userid_row['username'] . ":</b> (" . $custom_time . ")<br>" . $row['content'] . "</p><br>";
}

?>

<?php include '../includes/bottom.php' ; ?>
