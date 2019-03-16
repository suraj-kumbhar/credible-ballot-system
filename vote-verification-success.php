<?php

require('connection.php');
session_start();

if( empty($_SESSION['member_id'])) {
  header("location:access-denied.php");
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Credible Ballot System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <style>body{background-image: linear-gradient(to bottom, #304269 0%, #91bed4 100%);}
  </style>
</head>

<body id="top">

<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left">
      <h1><a href="voter.php">Credible Ballot System</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="voter.php">Home</a></li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded">
  <section id="testimonials" class="hoc container clear">
    <ul class="nospace group">
			<li>
				<center>
					<h3>Congratulation!</h3>
					<p>You Have Successfully Verified Yourself.</p>
					<p><a href="vote.php"><b>Click here</b></a> to continue.</p>
				</center>
			</li>
    </ul>
  </section>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>