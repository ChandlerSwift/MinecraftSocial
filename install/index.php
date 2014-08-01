<?php
if ((!isset($_GET['step'])) or ($_GET['step'] == 1)) {
	include_once '1.php';
} elseif  ($_GET['step'] == 2) {
	include_once '2.php';
} elseif  ($_GET['step'] == 3) {
	include_once '3.php';
}
?>
