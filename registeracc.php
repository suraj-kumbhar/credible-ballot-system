<!DOCTYPE html>
<html>
<head>
  <title>Credible Ballot System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <script language="JavaScript" src="js/user.js"></script>
  <style>body{background-image: linear-gradient(to bottom, #304269 0%, #91bed4 100%);}
  a {
  color: white;
}</style>
</head>

<body id="top">

<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left">
        <h1><a href="index.php"><b>CREDIBLE BALLOT SYSTEM</b></a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li><a href="index.php">Home</a></li>
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded">
  <section id="testimonials" class="hoc container clear">
    <ul class="nospace group">
      <li class="one_half">
<!--         <blockquote> -->

  <div>
  <center><h3>Register Here</h3></center>
  </div> 
  
		<table style="background-color:powderblue;" width="300" border="0" align="center" cellpadding="0" cellspacing="1">
    <tr>
      <form name="form1" method="post" action="checkreg.php" onSubmit="return registerValidate(this)">
  <td>
<table style="background-color:powderblue;" width="100%" border="0" cellpadding="3" cellspacing="1" >
	<tr>
	<td style="color:#000000"; width="120" >First Name</td>
	<td style="color:#000000"; width="6">:</td>
	<td style="color:#000000"; width="294"><input name="firstname" type="text" class="my-input"></td>
	</tr>

	<tr>
	<td style="color:#000000"; width="120" >Last Name</td>
	<td style="color:#000000"; width="6">:</td>
	<td style="color:#000000"; width="294"><input name="lastname" type="text" class="my-input"></td>
	</tr>

	<tr>
	<td style="color:#000000"; width="180" >Email</td>
	<td style="color:#000000"; width="6">:</td>
	<td style="color:#000000"; width="294"><input name="email" type="text" class="my-input"></td>
	</tr>

	<tr>
	<td style="color:#000000"; width="120" >Voter ID</td>
	<td style="color:#000000"; width="6">:</td>
	<td style="color:#000000"; width="294"><input name="voter_id" type="text" class="my-input"></td>
	</tr>

	<tr>
	<td style="color:#000000"; >Password</td>
	<td style="color:#000000"; >:</td>
	<td style="color:#000000"; ><input name="password" type="password" class="my-input"></td>
	</tr>

	<tr>
	<td style="color:#000000"; >Confirm Password</td>
	<td style="color:#000000"; >:</td>
	<td style="color:#000000"; ><input name="ConfirmPassword" type="password" class="my-input"></td>
	</tr>

	<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td style="color:#000000";><input type="submit" name="submit" value="Register Account" class="my-button"></td>
	</tr>

</table>
</td>
</form>
</tr>
</table>

          <center><br><p>Already have an account? <a href="login.php"><b>Login Here</b></p></a></center>

        <!-- </blockquote> -->
      
      </li>
    </ul>
  </section>
</div>
    <div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <center>
      <p>Copyright &copy; 2019 - <i>Ratheesh H Nair & Suraj Kumbhar</i></p>
      <p>All Rights Reserved</p>
  </center>
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