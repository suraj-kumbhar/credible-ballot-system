<?php

require('connection.php');
session_start();

if( empty($_SESSION['member_id'])) {
  header("location:access-denied.php");
}

?>

<?php

if( isset($_GET['vote']) ) {
  $vote = $_REQUEST['vote'];

  mysql_query( "UPDATE tbCandidates SET candidate_cvotes=candidate_cvotes+1 WHERE candidate_name='$vote'" );
  /*mysql_close( $con );*/

  $_SESSION['voter_status'] = 2;
  $voter_status = $_SESSION['voter_status'];
  $voterid = $_SESSION['voter_id'];
  $sql = "UPDATE tbmembers SET voter_status='$voter_status' WHERE voter_id='$voterid'";
  $result = mysql_query( $sql ) or die( mysql_error() ); 

  // New Transaction

  $sender = $voterid;
  $recipient = $vote;
  $amount = 1;

  $data = array( "sender"=>$sender, "recipient"=>$recipient, "amount"=>$amount );
  $string = json_encode( $data );

  $ch = curl_init( "http://localhost:5000/transactions/new" );
  curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, "POST" );
  curl_setopt( $ch, CURLOPT_HTTPHEADER, array( 'Content-Type:application/json' ) );
  curl_setopt( $ch, CURLOPT_POSTFIELDS, $string );
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  curl_exec( $ch );

  curl_close( $ch );

  // Mining

  $ch = curl_init( "http://localhost:5000/mine" );
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  curl_exec( $ch );

  curl_close( $ch );

  // Saving

  $ch = curl_init( "http://localhost:5000/save" );
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  curl_exec( $ch );

  curl_close( $ch );

  mysql_close( $con );

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

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="voter.php">Vote-Chain</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="voter.php">Home</a></li>
        <li><a href="vote.php">Vote</a></li>
            <li><a href="manage-profile.php">Profile Manager</a></li>
            <li><a href="result.php">Results</a></li>
        
        </li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded">
  <section id="testimonials" class="hoc container clear">
    <ul class="nospace group">
      <li class="one_half first">
          <div id="container" style="color: black;">
            <p><h1>Congratulation!</h1></p>
            <p>You have successfully voted.</p>
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