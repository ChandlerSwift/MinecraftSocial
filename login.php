<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    header( 'Location: /' ) ;
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login | Minecraft on ChandlerSwift.tk</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/forms.css" rel="stylesheet">
    <script type="text/JavaScript" src="/js/sha512.js"></script> 
    <script type="text/JavaScript" src="/js/forms.js"></script> 
  </head>
  <body>

    <div class="container">
      <form action="includes/process_login.php" method="post" name="login_form" class="form-signin" role="form">
        <h2 class="form-signin-heading">Please sign in</h2>
		<?php
        if (isset($_GET['error'])) {
            echo '		<p style="color:red;">Error Logging In!</p>';
        }
        ?> 
		<p>Don't have an account? <a href="register.php">Register Here.</a></p>
		<p>Don't want to be here? <a href="/">Go Back to Home</a>.</p>
        <input name="email" type="email" class="form-signin-top form-control" placeholder="Email address" autofocus>
        <input name="password" id="password" type="password" class=" form-signin-bottom form-control" placeholder="Password">
        <!--<label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>-->
        <button class="btn btn-lg btn-primary btn-block" onclick="formhash(this.form, this.form.password);">Sign in</button>
      </form>
    </div>
  </body>
</html>
