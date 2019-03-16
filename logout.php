<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Vote-Chain</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <script language="JavaScript" src="js/user.js"></script>
  body{background-image: linear-gradient(to bottom, #304269 0%, #91bed4 100%);}</style>
</head>

<body id="top">

<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left">
      <h1><a href="index.php">Credible Ballot System</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
      
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded">
  <section id="testimonials" class="hoc container clear">
    <ul class="nospace group">
      <li class="one_third">
        <p><h1></h1></p>
      </li>
      <li class="one_third">
        <center>
        <div id="page">
  					<div id="header">
  					<h1>Logged Out Successfully </h1>
  					
  					</div>
  					<?php
  						session_destroy();
  					?>
  					<br>
  					Return to <a href="login.php"><b>Login</b></a>

				</div>
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