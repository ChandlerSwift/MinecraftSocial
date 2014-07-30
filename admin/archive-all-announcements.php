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
	<title>Archive ALL Announcements | <?php echo $sitename; ?></title>
	<script>
		function submitForm()
			{
				document.getElementById("areyousure").submit();
			} 
	</script>
</head>
<body>
<h1 style="text-align:center;padding:20px;">Archive All Announcements | <?php echo $sitename; ?></h1>
<?php
	$imsure = $_GET['imsure'];

		if (is_null($imsure)) {
			echo "Archive all announcements? Are you sure? <br>
			<a href='?imsure=yes'>Yes</a><br><a href=/admin/>No, take me back!</a>";
		} else {
			$query = "UPDATE announcements SET front=0";
			if(!$result = $mysqli->query($query))
				die('There was an error');
				echo "<h1 style='text-align:center'>Done!<br><br></h1><a style'text-align:center;' href='/'>Back Home?</a>";
		}

?>

</body>
