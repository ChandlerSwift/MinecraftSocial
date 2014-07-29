<?php
	include_once 'config.php';
	include_once 'serverstatus.class.php';
	$status = new MinecraftServerStatus();
	$response = $status->getStatus($serverhost,'1.6.*');
	if(!$response) {
		echo "<b>Server Status:</b><br><span class='label label-danger'>Offline</span>";
	} else {
		echo "<b>Server Status:</b><br><span class='label label-success'>Online</span><br><br>".$response['players']." of ".$response['maxplayers']." players are online.";
	}

?>
