<!DOCTYPE html>
<html>
<head>
  <title>Credible Ballot System</title>
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
        <li class="active"><a href="checklogin.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
            <li><a href="registeracc.php">Registration</a></li>
        
        
        </li>
        
      </ul>
    </nav>

  </header>
</div>


<div class="wrapper bgded" style="background-color: #141414;">
  <section id="testimonials" class="hoc container clear">
    <ul class="nospace group">
      <li class="one_half">

      	<div>
		<h1>Invalid Credentials Provided </h1>

		</div>

		<div>

		<?php
			ini_set ("display_errors", "1");
			error_reporting(E_ALL);
			ob_start();

			session_start();
			require('connection.php');

			// Defining your login details into variables
			$myusername=$_POST['myusername'];
			$mypassword=$_POST['mypassword'];

			$encrypted_mypassword=md5($mypassword); //MD5 Hash for security
			// MySQL injection protections
			$myusername = stripslashes($myusername);
			$mypassword = stripslashes($mypassword);
			$myusername = mysql_real_escape_string($myusername);
			$mypassword = mysql_real_escape_string($mypassword);

			/*$sql="SELECT * FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword'" or die(mysql_error());*/

      		$sql = "SELECT * FROM tbmembers WHERE email='$myusername' and password='$mypassword'" or die(mysql_error());
			$result=mysql_query($sql) or die(mysql_error());

			// Checking table row
			$count=mysql_num_rows($result);
			// If username and password is a match, the count will be 1

			if($count==1){
				// If everything checks out, you will now be forwarded to voter.php
				$user = mysql_fetch_assoc($result);

				$_SESSION['member_id'] = $user['member_id'];
				$_SESSION['voter_id'] = $user['voter_id'];
				$_SESSION['voter_status'] = $user['voter_status'];
				$_SESSION['login_status'] = $user['login_status'];
				
				header("location:voter.php");
			}
			//If the username or password is wrong, you will receive this message below.
			else {
				echo "Wrong Username or Password<br><br>Return to <a href=\"login.php\"><b>Login</b></a>";
			}

			ob_end_flush();

		?> 

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