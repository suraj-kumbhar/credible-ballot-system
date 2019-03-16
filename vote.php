<?php

session_start();
require('connection.php');


if( empty($_SESSION['member_id'])) {
  header("location:access-denied.php");
}

/*
0 >> verify yourself
1 >> can vote
2 >> can't vote
*/

if( empty($_SESSION['voter_status']) ) {
  header("location: voter-verification.php");
}
else if( $_SESSION['voter_status'] == 2 ) {
  header("location: access-denied-to-vote.php");
}

?>

<?php

$positions = mysql_query("SELECT * FROM tbPositions")
or die("There are no records to display ... \n" . mysql_error()); 


?>

<?php

 // $position = addslashes( $_POST['position'] ); 
   
  $result = mysql_query("SELECT * FROM tbCandidates")
  or die(" There are no records at the moment ... \n"); 


?>


<!DOCTYPE html>
<html>
<head>
  <title>Credible Ballot System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <script language="JavaScript" src="js/user.js"></script>
  <style>body{background-image: linear-gradient(to bottom, #304269 0%, #91bed4 100%);}</style>
  <script type='text/javascript'>
    $('input[type=radio]').click(function() {
        $("form id or class").submit();
    });
  </script>
  <script type="text/javascript">
    function getVote(int) {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }
      else {
        // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }

      if( confirm("Your vote is for "+int) ) {
        xmlhttp.open("GET","vote-success.php?vote="+int,true);
        xmlhttp.send();
      }
      else {
        alert("Choose another candidate "); 
      }
    }

    function getPosition(String) {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }
      else {
        // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }

      xmlhttp.open("GET","vote.php?position="+String,true);
      xmlhttp.send();
    }
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      var j = jQuery.noConflict();
      j(document).ready(function() {
            j(".refresh").everyTime(1000,function(i){
                j.ajax({
                  url: "admin/refresh.php",
                  cache: false,
                  success: function(html){
                    j(".refresh").html(html);
                  }
                })
            })
        });
       j('.refresh').css({color:"green"});
    });
  </script>
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
        <li><a href="voter.php">Home</a></li>
        <li class="active"><a href="vote.php">Vote</a></li>
            <li><a href="manage-profile.php">Profile Manager</a></li>
            <li><a href="result.php">Results</a></li>
        
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded">
  <section id="testimonials" class="hoc container clear">
    <ul class="nospace group">
      <div>
        <table bgcolor="#00FF00" width="420" align="center">
        <tr>
            <td bgcolor="#5D7B9D" align="center"><lable style="color: white;" >Candidate Name</lable></td>
            <td bgcolor="#5D7B9D" style="color:#ffffff"; align="center"> Party </td>
            <td bgcolor="#5D7B9D" style="color: white;" align="center"> Vote Here</td>
        </tr>
        <?php
          // output data of each row
          echo "<form action='vote-success.php' method='GET'>";
          while ($row=mysql_fetch_array($result)) {
            echo "<tr>";
            echo "<td bgcolor='#5D7B9D' align='center' style='color:#ffffff'>";
            echo $row["candidate_name"];
            echo "</td>";
            echo "<td bgcolor='#5D7B9D' align='center' style='color:#ffffff'>";
            echo $row["candidate_position"];
            echo "</td>";
            echo "<td bgcolor='#5D7B9D' align='center'>";
            echo "<input type='radio' name='vote' value='$row[candidate_name]' onclick='this.form.submit();'/>";
            echo "</td>";
            echo "</tr>";
            
          }
          echo "</form>";
          mysql_free_result($result);
              mysql_close($link);
        ?>
        <tr>
            <p><b>NB:</b> Click a circle under a respective candidate to cast your vote. You can't vote more than once. This process can not be undone so think wisely before casting your vote.</p>
        </tr>
        
        <!-- </form>  -->
        </table>
        <!-- <input type = "submit" name='vote' value='Vote' onclick='this.form.submit()';/> -->

       
      </div>
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