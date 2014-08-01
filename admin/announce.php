<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

sec_session_start();

if (login_check($mysqli) != true)
	header('Location: /login.php');
if ($_SESSION['usertype'] != 'administrator')
	header('Location: /login.php');
?>

<!html>
<head>
	<title>New Announcement | <?php echo $sitename; ?></title>
</head>
<body>

<div style="padding:10px;">
<h1 style="text-align:center;">New Announcement | <?php echo $sitename; ?><br><br></h1>
<?php
	$CONTENT = $_POST['content'];
	$FRONT	 = $_POST['front'];
	$TITLE   = $_POST['title'];
	$STYLE   = $_POST['style'];

		if ( is_null($CONTENT)) {
			echo "<form action='/admin/announce.php' method=\"post\">
				Title: <input type='text' name='title'><br>
				Style: <select name='style'>
					<option value='success'>Success (Green)</option>
					<option value='info' selected='selected'>Info (Blue)</option>
					<option value='warning'>Warning (Yellow)</option>
					<option value='danger'>Danger (Red)</option>
					</select><br>
				<input type='checkbox' name='front' value='1' checked>Should this appear on the front page?<br>
				<textarea title=\"Put your update here...\" name=\"content\" rows=\"5\" cols=\"75\"></textarea><br>
				<input class='submit' type=\"submit\" value=\"Submit\">
				</form>" ;
		} else {
			$CONTENT = $mysqli->escape_string($CONTENT);
			$TITLE   = $mysqli->escape_string($TITLE);
			if ( is_null($FRONT))
				$FRONT = 0 ;
			$query = "INSERT INTO announcements (Title, Content, DateTime, Front, Style) VALUES ('" . $TITLE . "', '". $CONTENT . "', '" . date( 'Y-m-d H:i:s' ) . "', '" . $FRONT . "', '" . $STYLE . "')";
			if(!$result = $mysqli->query($query))
				die('There was an error');
			echo "<p><br><br>Successfully Updated!</p><br><form action='/'><input class='submit' type='submit' value='Back...'></form>";
		}

?>

</body>
