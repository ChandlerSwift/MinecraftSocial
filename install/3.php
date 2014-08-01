<?php 
$admin_user=1;
include_once '../includes/register.inc.php';
include_once '../includes/functions.php';
	// The following HTML is for if an error took place during the administrator registration process.
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
