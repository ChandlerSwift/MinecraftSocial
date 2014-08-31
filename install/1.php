<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MinecraftSocial - Configuration</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/forms.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <form method="post" name="db_info_form" action="?step=2" class="form-signin" role="form">
        <h2 class="form-signin-heading" style="text-align:center;">MinecraftSocial Config</h2>
<?php if (isset($_GET["error"])) { echo "		<p style='color:red'><b>Error connecting to database! Please try again!</b></p>\n"; } ?>
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
