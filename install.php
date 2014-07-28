<?php if ( !file_exists('includes/config.php') && (!isset($_POST["dbhost"])) ) : ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MinecraftSocial - Configuration</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/forms.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <form method="post" name="db_info_form" action="/install.php" class="form-signin" role="form">
        <h2 class="form-signin-heading" style="text-align:center;">MinecraftSocial Config</h2>
		<p>Welcome to MinecraftSocial! Before getting started, we need some information on the database. You will need to know the following items before proceeding. <a onclick="alert('In all likelihood, these items were supplied to you by your web host. If you do not have this information, then you will need to contact them before you can continue.\n\nHover over each input for more information.')">(?)</a></p>
		<input name="sitename" type="text" class="form-signin-top form-control" placeholder="Site Name" title="Title of your site -- It does not have to be your domain name. Examples: 'MinecraftSocial' or 'Minecraft on MinecraftSocial.net'." autofocus>
		<input name="serverhost" type="text" class="form-signin-middle form-control" placeholder="Minecraft Server Host" title="This is the IP of your Minecraft Server - If it's hosted on the same machine, put 'localhost' (no quotes).">
		<input name="dbname" type="text" class="form-signin-middle form-control" title="Name of your database" placeholder="Database Name">
        <input name="dbuname" type="text" class="form-signin-middle form-control" title="Username used to access your database" placeholder="Database User">
        <input name="dbpass" type="password" class="form-signin-middle form-control" title="Password for the database user" placeholder="Database Password">
		<input name="dbhost" type="text" class="form-signin-bottom form-control" title="host for your database (If you run LAMP or similar, use 'localhost' (no quotes)." placeholder="Database Host">
   		<div class="checkbox">
          <label>
			<input type="checkbox" name="https" value="https"> <span title="Does your site have an HTTPS certificate and is configured to use SSL?">Site uses HTTPS</span>
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Continue...</button>
      </form>
    </div>
  </body>
</html>
<?php elseif ((!file_exists('includes/config.php')) && (isset($_POST["dbhost"]))) : 
/* Set Variables from POST */
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
	$fp = fopen("includes/config.php", "w");
	fwrite($fp, $config);
	fclose($fp);
	include_once "includes/config.php" ;
	
	$fp = fopen("index.php", "w");
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
		  <form method="post" name="registration_form" action="/install.php" class="form-signin" role="form">
			<h2 class="form-signin-heading">Please Register:</h2>
			<?php
			?>
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
	
<?php elseif (file_exists('includes/config.php')) :

$admin_user=1;
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
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
		  <form method="post" name="registration_form" action="/install.php" class="form-signin" role="form">
			<h2 class="form-signin-heading">Please Register:</h2>
			<?php echo $error_msg; ?>
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
	<?php endif ; ?>