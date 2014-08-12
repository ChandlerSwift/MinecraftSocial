<?php
include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start();

if (login_check($mysqli) == true) { $logged = "in" ; } else { $logged = "out" ; }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Chandler Swift">
    <title><?php echo $page ; ?> | <?php echo $sitename; ?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
  </head>

  <body onload="serverStatus(); setInterval(function(){serverStatus()},10000);">
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img src="/images/icon-xs.png" style="padding:0px;margin:0px;"> &nbsp;&nbsp;<?php echo $sitename; ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
			<?php if ($logged == "in") : ?>
            <li><a>Welcome, <?php echo htmlentities($_SESSION['first']); ?></a></li>
            <!--<li><a href="/user/settings/">Settings</a></li>-->
			<?php if ($_SESSION['usertype'] == 'administrator') : ?>
			<li><a href="/admin/">Admin Panel</a></li>
			<?php endif; ?>
            <!--<li><a href="#">Profile</a></li>-->
            <li><a href="/user/logout.php">Logout</a></li>
			<?php else : ?>
			<li><a href="/login.php">Log in</a></li>
			<?php endif; ?>
          </ul>
          <!-- Search Bar!<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li<?php
if ($page == "Home")
  echo ' class="active"';
?>><a href="/">Home</a></li>
            <li<?php
if ($page == "Read Statuses")
  echo ' class="active"';
?>><a href="/read.php">Read Statuses</a></li>
            <?php if ($logged == "in") : ?><li<?php
if ($page == "Update Status")
  echo ' class="active"';
?>><a href="/update.php">Update Status</a></li>
            <?php endif; ?>
          </ul>
          <ul class="nav nav-sidebar">
            <li<?php
if ($page == "Bulletin Board")
  echo ' class="active"';
?>><a href="/bulletin-board/">Bulletin Board</a></li>
            <li<?php
if ($page == "Downloads")
  echo ' class="active"';
?>><a href="/files/">Files/Downloads</a></li>
            <li<?php
if ($page == "Announcement Archive")
  echo ' class="active"';
?>><a href="/announcement-archive.php">Announcement Archive</a></li>
            <li<?php
if ($page == "Chat")
  echo ' class="active"';
?>><a href="/chat/">Live Chat</a></li>
            <!--<li><a href="">More navigation</a></li>-->
          </ul>
		<hr>
          <ul class="nav nav-sidebar">
			<li><p style="text-align:center;"><br>Links:</p></li>
            <li><a href="http://minecraft.net/" target="_blank">Official Minecraft Site</a></li>
            <li><a href="http://minecraft.gamepedia.com" target="_blank">Official Minecraft Wiki</a></li>
          </ul>
		<hr>
		<div style="text-align:center;" id="ServerStatus"><b>Server Status:</b><br><span class='label label-warning'>Loading</span></div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <!--<h1 class="page-header"><?php // echo $title ; ?></h1>-->
<?php include_once 'announcements.php' ?>
