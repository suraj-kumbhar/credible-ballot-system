<!DOCTYPE html>
<html>
  <head>
  <title>Credible Ballot System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <script language="JavaScript" src="js/user.js"></script>
  <style>
  body{background-image: linear-gradient(to bottom, #304269 0%, #91bed4 100%);}
  * {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
  </style>
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
        <li><a href="login.php">Login</a></li>
        <li><a href="registeracc.php">Registration</a></li>
        <li><a href="admin/index.php">Admin</a></li>
            
        </li>
       
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded">
  <section id="testimonials" class="hoc container clear">
    <ul class="nospace group">
      <li>
        <h1>Welcome to Credible Ballot System!</h1>
        <br>

        <h1><marquee color="#1111" bgcolor="#1D3775" height="35" onmouseover="stop()" onmouseout="start()"><a href="registeracc.php">Registration Opens..!</a></marquee><br><br><br>
        
        <embed align="center" width="980" height="315" src="../CBS/images/Slide/voteindia.mp4">

        <div class="slideshow-container">

<div class="mySlides fade">
  <img src="..\CBS\images\Slide\C.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="..\CBS\images\Slide\A.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="../CBS/images/Slide/D.jpg" style="width:100%">
</div>

</div>


      </li>
    </ul>
  </section>
</div>

<br>
<br>
<br>
<br>
<br>

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
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

<!-- / IE9 Placeholder Support -->
</body>
</html>