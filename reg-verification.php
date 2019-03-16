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
  <script language="JavaScript" src="js/user.js"></script>
  <style>
  body{background-image: linear-gradient(to bottom, #304269 0%, #91bed4 100%);}</style>
</head>
<body id="top">

<div class="wrapper bgded">
 <section id="testimonials" class="hoc container clear">
  	
    <ul class="nospace group">
      <li class="">
      	<center>
          <div id="container">
            <form action="reg-verification.php" method="POST">
              <h1>Please Verify Yourself!</h1>
              <p>Press the Start button to start face recognition process.</p>
              <br>
              <input type="submit" name="start" value="Start" class="my-button">
            </form>

            <?php

      		if( isset($_POST['start']) ) {
              $voterid = $_SESSION['voter_id'];

      			  $result = exec("C:\\Python27\\python.exe C:\\xampp\\htdocs\\e-voting-with-blockchain\\face-recognition\\dataset_creator.py. $voterid");

              $result = exec("C:\\Python27\\python.exe C:\\xampp\\htdocs\\e-voting-with-blockchain\\face-recognition\\trainer.py");

              $_SESSION['login_status'] = 1;
              $login_status = $_SESSION['login_status'];

              $sql = "UPDATE tbmembers SET login_status='$login_status' WHERE voter_id='$voterid'";
              $result = mysql_query( $sql ) or die( mysql_error() ); 
      			  
      			  header( "location: voter.php" );
      			}

            ?>

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