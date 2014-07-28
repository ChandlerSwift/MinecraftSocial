<?php
if (!file_exists('includes/config.php'))
{
header('Location: install.php');
exit;
}

		/* SETTING VARIABLES*/
		$page = "Home" ;

		include "includes/top.php" ; 
	?>

	<img src="images/cover/cover<?php $random = rand(1,6); echo $random; ?>.jpg" style="width:100%;">

	<?php include "includes/bottom.php" ; ?>