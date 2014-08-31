<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
include_once '../includes/config.php';
sec_session_start();

if (login_check($mysqli) != true)
	header('Location: /login.php');
if ($_SESSION['usertype'] != 'administrator')
	header('Location: /login.php');
?>
<?php if (!is_null($_POST['submitted'])) : ?>
<!html>
<head>
	<title>Site Settings | <?php echo $sitename; ?></title>
<style>
fieldset { display: inline-block; }
</style>
</head>
<body>

<div style="padding:10px;">
<h1 style="text-align:center;">Site Settings | <?php echo $sitename; ?><br><br></h1>
<form method="post" action="site-settings.php">
<fieldset>
<legend>First Sidebar Link (Blank for None)</legend>
Title:<br /><input name="link1title" type="text" size="15" value="<?php echo $link1title ; ?>" /><br /><br />
URL (must contain <code>http://</code> or <code>https://</code>):<br /><input name="link1url" type="text" size="30" value="<?php echo $link1url ; ?>" /><br />
</fieldset>
<br /><br />
<fieldset>
<legend>Second Sidebar Link (Blank for None)</legend>
Title:<br /><input name="link2title" type="text" size="15" value="<?php echo $link2title ; ?>" /><br /><br />
URL (must contain <code>http://</code> or <code>https://</code>):<br /><input name="link2url" type="text" size="30" value="<?php echo $link2url ; ?>" /><br />
</fieldset>
<input type="hidden" name="submitted" value="true" />
<br /><br />
<input type="submit" value="Submit">
</form>
</body>
</html>

<?php

else :

$config = '<?php 
	$dbhost = "' . $dbhost . '";
	$dbuname = "' . $dbuname . '";
	$dbpass = "' . $dbpass . '";
	$dbname = "' . $dbname . '";
	$sitename = "' . $sitename . '";
	$serverhost = "' . $serverhost . '";
	' . $https . '
	$https = "' . $https . '";
	$link1url = "' . $_POST['link1url'] . '";
	$link1title = "' . $_POST['link1title'] . '";
	$link2url = "' . $_POST['link2url'] . '";
	$link2title = "' . $_POST['link2title'] . '";
	?>';
	
	/* Write Variables to file */
	$fp = fopen("../includes/config.php", "w");
	fwrite($fp, $config);
	fclose($fp);
harlie
?>

<!html>
<head>
	<title>Site Settings | <?php echo $sitename; ?></title>
</head>
<body>

<div style="padding:10px;">
<h1 style="text-align:center;">Site Settings | <?php echo $sitename; ?><br><br></h1>
Settings successfully applied!<br />
<a href="/">Back to Home</a><br />
<a href="/admin/">Admin Panel</a><br />
<a href="/admin/site-settings.php">Back to Site Settings</a>
</body>
</html>
<?php endif ; ?>
