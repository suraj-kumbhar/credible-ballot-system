<?php

require('connection.php');

session_start();

if( empty($_SESSION['member_id']) ) {
  header("location:access-denied.php");
}

?> 

<?php

$positions = mysql_query("SELECT * FROM tbPositions") or die("There are no records to display ... \n" . mysql_error()); 

?>

<?php

if (isset($_POST['Submit'])) {
  $position = addslashes( $_POST['position'] ); 
   
  $result = mysql_query("SELECT * FROM tbCandidates WHERE candidate_position='$position'")
  or die(" There are no records at the moment ... \n"); 
}

?>

<?php

if(isset($_POST['Submit'])) {
  $totalvotes=$candidate_1+$candidate_2;
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Credible Ballot System</title>
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <script language="JavaScript" src="js/admin.js"></script>
</head>

<body id="top">

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="voter.php">Credible Ballot System</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li><a href="voter.php">Home</a></li>
          <li><a href="vote.php">Vote</a></li>
            <li><a href="manage-profile.php">Profile Manager</a></li>
            <li class="active"><a href="result.php">Results</a></li>
          <ul>
          
          </ul>
        </li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>

<div id="header" class="hoc clear"></div>

<div>
  <div>
  <!-- results -->
  <form name="fmNames" id="fmNames" method="post" action="result.php" onsubmit="return positionValidate(this)">
 <div align= "center">
    <input type="submit" value="See Results" name = "Submit" class="my-button">
    </div>
    </form>
     <br><br>

    <table width="420" align="center">
      <tr>
      <td bgcolor="#5D7B9D" style="color:#ffffff">Candidate Name</td>
        <td bgcolor="#5D7B9D" style="color:#ffffff">Vote(s)</td>

      </tr>
      
      <?php

      if( isset( $_POST['Submit'] ) ) {
        $result = mysql_query("SELECT * FROM tbcandidates") or die("There are no records to display ... \n" . mysql_error());

        while( $row = mysql_fetch_array( $result ) ) {
          $blockchain = fopen( "blockchain/blocks.txt", "r" ) or die( "Unable to open file!" );
					$candidate = $row['candidate_name'];
          
					$votes = 0;
					while( !feof( $blockchain ) ) {
            $data = fgets( $blockchain );
            //echo $data;
					  if( substr_count( $data, $candidate ) ) {
              $votes += substr_count( $data, $candidate );
              
					  }
					}
          //echo $votes;
					fclose( $blockchain );

          echo "<tr>";
          echo "<td style='color: black;'>".$candidate."</td>";
          echo "<td style='color: black;'>"."<b>".$votes."</b>"."</td>";

/*          echo "<td style='color: black;'>".$row['candidate_name']."</td>";
          echo "<td style='color: black;'>"."<b>".$row['candidate_cvotes']."</b>"."</td>";*/
          echo "</tr>";
        }
      }

      ?>
        
    </table>
  
  </div>
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