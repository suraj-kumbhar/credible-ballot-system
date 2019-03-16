<?php

require( 'connection.php' );
session_start();

$vote = $_REQUEST['vote'];

mysql_query( "UPDATE tbCandidates SET candidate_cvotes=candidate_cvotes+1 WHERE candidate_name='$vote'" );
/*mysql_close( $con );*/

$_SESSION['voter_status'] = 2;
$voter_status = $_SESSION['voter_status'];
$voterid = $_SESSION['voter_id'];
$sql = "UPDATE tbmembers SET voter_status='$voter_status' WHERE voter_id='$voterid'";
$result = mysql_query( $sql ) or die( mysql_error() ); 

mysql_close( $con );

header( "location: vote.php" );

?>