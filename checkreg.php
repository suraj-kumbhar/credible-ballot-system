<?php

require('connection.php');

if (isset($_POST['submit'])) {
  $myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
  $myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
  $myEmail = $_POST['email'];
  $myPassword = $_POST['password'];
  $myVoterid = $_POST['voter_id'];

  $_SESSION['voter_id'] = $myVoterid;

  $newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

  /*$sql = mysql_query( "INSERT INTO tbMembers(first_name, last_name, email, voter_id, password) VALUES ('$myFirstName','$myLastName', '$myEmail','$myVoterid', '$newpass')" )
          or die( mysql_error() );*/

  $sql = mysql_query( "INSERT INTO tbMembers(first_name, last_name, email, voter_id, password) VALUES ('$myFirstName','$myLastName', '$myEmail','$myVoterid', '$myPassword')" ) or die( mysql_error() );
  }

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
      <h1><a href="index.php">CREDIBLE BALLOT SYSTEM</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded" style="background-color: #141414;">
  <section id="testimonials" class="hoc container clear">
    <ul class="nospace group">
      <li class="one_half first">

          <div id="container">
              <h1>You have successfully registered your account.</h1>
              <p>Go to <a href="login.php"><b>Login</b></a></p>
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