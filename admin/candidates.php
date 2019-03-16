<?php

session_start();
require('../connection.php');

if(empty($_SESSION['admin_id'])){
  header("location:access-denied.php");
} 

$result = mysql_query("SELECT * FROM tbCandidates")
or die("There are no records to display ... \n" . mysql_error()); 

if (mysql_num_rows($result)<1){
  $result = null;
}

?>

<?php

$positions_retrieved=mysql_query("SELECT * FROM tbPositions")
or die("There are no records to display ... \n" . mysql_error()); 

?>

<?php

if (isset($_POST['Submit'])) {
  $newCandidateName = addslashes( $_POST['name'] ); //prevents types of SQL injection
  $newCandidatePosition = addslashes( $_POST['position'] ); //prevents types of SQL injection  

  $sql = mysql_query( "INSERT INTO tbCandidates(candidate_name,candidate_position) VALUES ('$newCandidateName','$newCandidatePosition')" )
          or die("Could not insert candidate at the moment". mysql_error() );

  // redirect back to candidates
  header("Location: candidates.php");
}

?>

<?php

// deleting sql query
// check if the 'id' variable is set in URL
if (isset($_GET['id'])) {
  // get id value
  $id = $_GET['id'];

  // delete the entry
  $result = mysql_query("DELETE FROM tbCandidates WHERE candidate_id='$id'")
  or die("The candidate does not exist ... \n"); 

  // redirect back to candidates
  header("Location: candidates.php");
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

<div id="header" class="hoc clear"></div>

<div>

  <table width="380" align="center">
    <CAPTION><h3 style="color: #ffffff">Add New Candidate</h3></CAPTION>

    <form name="fmCandidates" id="fmCandidates" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">

      <tr>
          <td bgcolor="#5D7B9D" style="color: #ffffff;">Member Name</td>
          <td bgcolor="#5D7B9D" style="color: #000000;">
            <input type="text" name="name" value="" class="my-input" style="width: 40%;"/>
          </td>
      </tr>

      <tr>
        <td bgcolor="#5D7B9D" style="color: #ffffff">Party Name</td>
        
        <td bgcolor="#5D7B9D" style="color: #000000">
          <div class="my-select" style="width: 40%;">
            <SELECT NAME="position" id="position">select
            <OPTION VALUE="select">Select
              <?php

              //loop through all table rows
              while ($row=mysql_fetch_array($positions_retrieved)){
                echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
              }

              ?>
            </SELECT>
          </div>
        </td>
      </tr>

      <tr>
          <td bgcolor="#5D7B9D" >&nbsp;</td>
          <td bgcolor="#5D7B9D" style="color: #000000">
            <input type="submit" name="Submit" value="Add" class="my-button" style="margin-left:0; margin-right:auto;"/>
          </td>
      </tr>

    </form>
  </table>

  <table border="0" width="620" align="center">
    <CAPTION><h3 style="color: #ffffff">Present Candidates</h3></CAPTION>

    <tr>
      <td bgcolor="#5D7B9D" style="color: #ffffff">Member ID</td>
      <td bgcolor="#5D7B9D" style="color: #ffffff">Member Name</td>
      <td bgcolor="#5D7B9D" style="color: #ffffff">Party Name</td>
      <td bgcolor="#5D7B9D" style="color: #ffffff"></td>
    </tr>

    <?php
    //loop through all table rows
    while ($row=mysql_fetch_array($result)){
      echo "<tr>";
      echo '<td style="color: #000000">' . $row['candidate_id']."</td>";
      echo '<td style="color: #000000">' . $row['candidate_name']."</td>";
      echo '<td style="color: #000000">' . $row['candidate_position']."</td>";
      echo '<td style="color: #000000">'.'<a style="color: #5D7B9D" href="candidates.php?id=' . $row['candidate_id'] . '"><b>Delete Candidate</b></a></td>';
      echo "</tr>";
    }

    mysql_free_result($result);
    mysql_close($link);

    ?>
  </table>

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