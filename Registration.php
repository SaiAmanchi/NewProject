
<html>
<head>
  <title>Student Tech Request</title>
  <link rel="stylesheet" href="Css/bootstrap.min.css">
  <script src="Css/jquery.min.js"></script>
  <script src="Css/bootstrap.min.js"></script>
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

<div style="height: 120px;margin-top:-35px; padding-top: 40px; text-align: center; background-color: black;">
	<h1><span spellcheck="false" style="font-weight: bold; color: white; ">Student Tech Request Evaluation System</span></h1>
</div>

<nav class="navbar navbar-inverse" style="background-color: #C62703;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" style="margin-left: 560px; color: green;">
      	  <li><a href="Index.php">Login</a></li>    	 
      </ul>
    </div>
  </div>
</nav>

<div style="min-height: 450px;margin-top: 0px;">
	<center><h2><span>Committee Chait Registration</span></h2>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
		<table style="height: 400px;">
			<tr> <td>User ID *</td><td> <input type="text" name="userid" required="required" class="form-control" placeholder="Enter User ID" pattern="700[0-9]{6}"></td> </tr>
			<tr> <td>First Name *</td><td> <input type="text" name="fname" required="required" class="form-control" placeholder="Enter First Name" pattern="[a-zA-Z ]*"></td> </tr> 
			<tr> <td>Last Name *</td><td> <input type="text" name="lname" required="required" class="form-control" placeholder="Enter Last Name" pattern="[a-zA-Z ]*"></td> </tr> 			
			<tr> <td>Email Id *</td><td> <input type="text" name="email" required="required" class="form-control" pattern="^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" placeholder="example@ucmo.edu"></td> </tr>
			<tr> <td>Course *</td><td> <select name="course" style="width: 185px" class="btn btn-default dropdown-toggle" required> 								       																					
                                                              <option value="">--Select--</option>				       																				
                                                              <option value="CIS">CIS</option>				       																				
                                                              <option value="CS">CS</option>
                                                              <option value="IT">IT</option>
                                                      </select> </tr> 
			<tr> <td>Department *</td><td> <select name="dept" style="width: 185px" class="btn btn-default dropdown-toggle" required> 								       																					
                                                              <option value="">--Select--</option>				       																				
                                                              <option value="2">Committee Chair</option>
                                                      </select> </tr>
			
			<tr align="center"> <td colspan="2"><input type="submit" name="submit" class="btn btn-success" value="Register"></td> </tr> 
		</table>
	</form>
</div>

<footer class="container-fluid text-center"  style="background-color: #C62703;">
  <p> &#169; Copyright 2018</p>  
</footer>

</body>
</html>

<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST')
{	
	require 'RegistrationDetails.php';
	
	$password=randompassword();
	
	$details = new RegistrationDetails();
	
	$details->department_id=$_POST["dept"];
	$details->user_id=$_POST["userid"];
	$details->first_name=$_POST["fname"];
	$details->last_name=$_POST["lname"];
	$details->email_id=$_POST["email"];
	$details->course=$_POST["course"];
	$details->status='Active';
	$details->password=$password;
	
	$details->FacultyRegistration();
}

function randompassword()
{
	$string = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$pwd = array();
	$stringLength = strlen($string) - 1;
	for ($i = 0; $i < 8; $i++) {
		$n = rand(0, $stringLength);
		$pwd[] = $string[$n];
	}
	return implode($pwd);
}
?>