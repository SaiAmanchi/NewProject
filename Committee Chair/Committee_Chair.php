
<html>
<head>
  <title>Committee Chair</title>
  <link rel="stylesheet" href="../Css/bootstrap.min.css">
  <script src="../Css/jquery.min.js"></script>
  <script src="../Css/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
     
      padding-top: 10px;
    }
    div
	{
		margin-top:5px;
	}
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
</head>
<body>
<?php 
session_start();
if(isset($_SESSION['CommitteeChair']) && !empty($_SESSION['CommitteeChair']))
{
?>
<div style="height: 120px;margin-top:-35px; padding-top: 40px; text-align: center; background-color: black;">
	<h1><span spellcheck="false" style="font-weight: bold; color: white; ">Student Tech Request Evaluation System</span></h1>
</div>

<nav class="navbar navbar-inverse"  style="background-color: #C62703;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      	  <li><a href="Committee_Chair.php" target="committee">Home</a></li>
      	  <li><a href="Registration.php" target="committee">Registration</a></li>
      	  <li><a href="View_Registrations.php" target="committee">Registration Details</a></li>
      	  <li><a href="Committee_Chair_Review.php" target="committee">Review</a></li>
      	  <li><a href="../Logout.php" target="_parent">LogOut</a></li>  	 
      </ul>
    </div>
  </div>
</nav>

<div style="min-height: 470px;margin-top: 0px;">
	<iframe id="committee" name="committee" src="" style="width: 99.5%;min-height: 470px;"></iframe>
</div>
<footer class="container-fluid text-center"  style="background-color: #C62703;">
  <p> &#169; Copyright 2018</p>  
</footer>

<?php 
}
else
{
	header('Refresh: 0; url=../SessionExpire.php');
}
?>
</body>
</html>