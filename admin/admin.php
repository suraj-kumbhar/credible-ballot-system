<?php

session_start();
require('../connection.php');
$log1 = $_SESSION['log1'];

?>

<?php

if(isset($_COOKIE['$email']) && $_COOKIE['$pass']){
  $curnam = $_SESSION['curname'];
  $curpas = $_SESSION['curpass'];
}
else if($log1 == 11)
{
  $curnam = $_SESSION['curname'];
  $curpas = $_SESSION['curpass'];
}
else 
{
  /* here goes the page when destroy the cookies */
  header( "location:access-denied.php" );
  exit;
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Credible Ballot Syatem</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <script language="JavaScript" src="js/user.js"></script>
  <style>
  body{background-image: linear-gradient(to bottom, #304269 0%, #91bed4 100%);}
  </style>
</head>

<body id="top">

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="admin.php">Credible Ballot System</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="admin.php">Home</a></li>
        <li><a class="drop" href="#">Admin Panel</a>
          <ul>
            <li><a href="manage-admins.php">Admin Manager</a></li>
            <li><a href="positions.php">Manage Parties</a></li>
            <li><a href="candidates.php">Manage Members</a></li>
            <li><a href="refresh.php">Results</a></li>
          </ul>
        </li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded">
  <section id="testimonials" class="hoc container clear">
    <ul class="nospace group">
		<li>
	        <div id="container">
	        	<h1>In this page, Admin can set candidates for voting and view results.</h1>
	        </div>
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