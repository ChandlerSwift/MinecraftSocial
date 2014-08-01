<?php
	/* Test Database Connection */
	$db = new mysqli($_POST["dbhost"], $_POST["dbuname"], $_POST["dbpass"], $_POST["dbname"]);
	if($db->connect_errno > 0){
		header("Location: ?step=1&error=1");
		die;
	}

	/*	We can assume the Database Connection hasn't failed
		Set up Config and Replacement root index files       */

	if (isset($_POST['https'])) {
		$https = "define('SECURE', TRUE);";
	} else {
		$https = "define('SECURE', FALSE);";
	}
	$config = '<?php 
	$dbhost = "'. $_POST["dbhost"]. '";
	$dbuname = "'. $_POST["dbuname"]. '";
	$dbpass = "'. $_POST["dbpass"]. '";
	$dbname = "'. $_POST["dbname"]. '";
	$sitename = "'. $_POST["sitename"]. '";
	$serverhost = "'. $_POST["serverhost"]. '";
	'. $https .'
	?>';
	
	$index = '<?php
		/* SETTING VARIABLES*/
		$page = "Home" ;

		include "includes/top.php" ; 
	?>

	<img src="images/cover/cover<?php $random = rand(1,6); echo $random; ?>.jpg" style="width:100%;">

	<?php include "includes/bottom.php" ; ?>';
	
	/* Write Variables to file */
	$fp = fopen("../includes/config.php", "w");
	fwrite($fp, $config);
	fclose($fp);
	include_once "../includes/config.php" ;
	
	$fp = fopen("../index.php", "w");
	fwrite($fp, $index);
	fclose($fp);
	
	/* INSTALL DATABASE! */
	// Name of the file
	$filename = 'MinecraftSocial.sql';
	// MySQL host

	// Connect to MySQL server
	mysql_connect($dbhost, $dbuname, $dbpass) or die('Error connecting to MySQL server: ' . mysql_error());
	// Select database
	mysql_select_db($dbname) or die('Error selecting MySQL database: ' . mysql_error());

	// Temporary variable, used to store current query
	$templine = '';
	// Read in entire file
	$lines = file($filename);
	// Loop through each line
	foreach ($lines as $line)
		{
		// Skip it if it's a comment
		if (substr($line, 0, 2) == '--' || $line == '')
			continue;

		// Add this line to the current segment
		$templine .= $line;
		// If it has a semicolon at the end, it's the end of the query
		if (substr(trim($line), -1, 1) == ';')
		{
			// Perform the query
			mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
			// Reset temp variable to empty
			$templine = '';
		}
	}
	/* Preprocessing complete, now we ask the user for his or her user details... */
	?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Register | <?php echo $sitename; ?></title>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/forms.css" rel="stylesheet">
	<script type="text/JavaScript" src="/js/sha512.js"></script> 
	<script type="text/JavaScript" src="/js/forms.js"></script>
  </head>

  <body>
	<div class="container">
	  <form method="post" name="registration_form" action="?step=3" class="form-signin" role="form">
		<h2 class="form-signin-heading">Please Register:</h2>
		<p>Please sign up for your administrative account.</p>
		<input name="username" type="text" class="form-signin-top form-control" placeholder="Minecraft Username" id="username" autofocus>
		<input name="email" type="email" class="form-signin-middle form-control" placeholder="Email address">
		<input name="first" type="text" class="form-signin-middle form-control" placeholder="First Name">
		<input name="last" type="text" class="form-signin-middle form-control" placeholder="Last Name">
		<input name="password" id="password" type="password" class="form-signin-middle form-control" placeholder="Password">
		<input name="confirmpwd" id="confirmpwd" type="password" class="form-signin-bottom form-control" placeholder="Confirm Password">
		<button class="btn btn-lg btn-primary btn-block" onclick="regformhash(this.form, this.form.username, this.form.email, this.form.password, this.form.confirmpwd);">Register</button>
	  </form>
	</div>
  </body>
</html>
