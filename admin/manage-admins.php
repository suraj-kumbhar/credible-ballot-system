<?php

session_start();
require('../connection.php');

if(empty($_SESSION['admin_id']) ){
 	 header("location:access-denied.php");
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Credible Ballot Syatem</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <script language="JavaScript" src="js/admin.js"></script>
  <style>
  body{background-image: linear-gradient(to bottom, #304269 0%, #91bed4 100%);}
  </style>
</head>

<body id="top">

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="admin.php">Credeble Ballot Syatem</a></h1>
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
     
       <li class="">

          
            <p><h1>

    <?php

	//If your session isn't valid, it returns you to the login screen for protection
	if(empty($_SESSION['admin_id'])){
	 	header("location:access-denied.php");
	}
	//Process
	if (isset($_POST['submit'])) {
		$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
		$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
		$myEmail = $_POST['email'];
		$myPassword = $_POST['password'];

		$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

      	$sql = mysql_query( "INSERT INTO tbAdministrators(first_name, last_name, email, password) VALUES ('$myFirstName','$myLastName', '$myEmail', '$myPassword')" ) or die( mysql_error() );

/*					$sql = mysql_query( "INSERT INTO tbAdministrators(first_name, last_name, email, password) VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass')" )
					        or die( mysql_error() );*/

		die( "A new administrator account has been created." );
	}
	//Process
	if (isset($_GET['id']) && isset($_POST['update'])) {
		$myId = addslashes( $_GET['id']);
		$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
		$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
		$myEmail = $_POST['email'];
		$myPassword = $_POST['password'];

		$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

/*					$sql = mysql_query( "UPDATE tbAdministrators SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', password='$newpass' WHERE admin_id = '$myId'" )
					        or die( mysql_error() );*/

      	$sql = mysql_query( "UPDATE tbAdministrators SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', password='$myPassword' WHERE admin_id = '$myId'" ) or die( mysql_error() );

		die( "Your account has been updated." );
	}

	?>

        </h1></p>
      </li> 

    </ul>
    
  </section>
</div>


<table align="center">
  <tr>
    <td>

    <form action="manage-admins.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
      <table align="center">
        <CAPTION><h4 style="color:#000000">Update Admin Data</h4></CAPTION>

        <tr>
          <td style="color:#000000";>First Name:</td>
          <td style="color:#000000"><input type="text"  font-weight:bold;" name="firstname" maxlength="15" value="" class="my-input"></td>
        </tr>
        <tr>
          <td style="color:#000000">Last Name:</td>
          <td style="color:#000000"><input type="text" font-weight:bold;" name="lastname" maxlength="15" value="" class="my-input"></td>
        </tr>
        <tr>
          <td style="color:#000000">Email Address:</td>
          <td style="color:#000000"><input type="text"  font-weight:bold;" name="email" maxlength="100" value="" class="my-input"></td>
        </tr>
        <tr>
          <td style="color:#000000">New Password:</td>
          <td style="color:#000000"><input type="password"  font-weight:bold;" name="password" maxlength="15" value="" class="my-input"></td>
        </tr>
        <tr>
          <td style="color:#000000">Confirm New Password:</td>
          <td style="color:#000000"><input type="password"  font-weight:bold;" name="ConfirmPassword" maxlength="15" value="" class="my-input"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td style="color:#000000"><input type="submit" name="update" value="Update Account" class="my-button"></td>
        </tr>
      </table>
    </form>

    </td>

    <td>
      <form action="manage-admins.php" method="post" onsubmit="return registerValidate(this)">
        <table align="center">
          <CAPTION><h4 style="color:#000000">Create Sub Admins</h4></CAPTION>

          <tr>
            <td style="color:#000000">First Name:</td>
            <td style="color:#000000"><input type="text"  font-weight:bold;" name="firstname" maxlength="15" value="" class="my-input"></td>
          </tr>
          <tr>
            <td style="color:#000000">Last Name:</td>
            <td style="color:#000000"><input type="text" font-weight:bold;" name="lastname" maxlength="15" value="" class="my-input"></td>
          </tr>
          <tr>
            <td style="color:#000000">Email Address:</td>
            <td style="color:#000000"><input type="text"  font-weight:bold;" name="email" maxlength="100" value="" class="my-input"></td>
          </tr>
          <tr>
            <td style="color:#000000">Password:</td>
            <td style="color:#000000"><input type="password" font-weight:bold;" name="password" maxlength="15" value="" class="my-input"></td>
          </tr>
          <tr>
            <td style="color:#000000">Confirm Password:</td>
            <td style="color:#000000"><input type="password" font-weight:bold;" name="ConfirmPassword" maxlength="15" value="" class="my-input"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td style="color:#000000"><input type="submit" name="submit" value="Create Account" class="my-button"></td>
          </tr>
        </table>
    </form>

    </td>
  </tr>
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