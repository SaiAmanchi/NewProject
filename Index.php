<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Student Tech Request</title>
  <meta charset="UTF-8">
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

<div style="min-height: 460px;margin-top: 0px;">
	<div class="row">&nbsp;</div>
	<div class="row">&nbsp;</div>
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-3">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" target="_parent">
				<div class="col-sm-3"><label>User&nbsp;ID</label></div><div class="col-sm-9"><input type="text" name="userid" required="required" class="form-control" placeholder="Enter User ID" pattern="700[0-9]{6}" title="not allowed alphabets and special charactes"></div>
				<div class="col-sm-3"><label>Password</label></div><div class="col-sm-9"><input type="password" name="pwd" required="required" class="form-control" placeholder="Enter Password"></div>
				<div class="col-sm-3"><label>Department</label></div><div class="col-sm-9"><select name="dept" style="width: 205px" class="btn btn-default dropdown-toggle" required> 								       																					
									                                                              <option value="">--Select--</option>				       																				
									                                                              <option value="1">Dean</option>
									                                                              <option value="2">Committee Chair</option>				       																				
									                                                              <option value="3">Committee Members</option>
									                                                              <option value="4">Department Chairs</option>
									                                                              <option value="5">Faculty of HCBPS</option>
									                                                      </select></div>
				
				<div class="col-sm-4">&nbsp;</div><div class="col-sm-8"><input type="submit" class="btn btn-success" value="Login"></div>
				<div class="col-sm-12">&nbsp;</div><div class="col-sm-12">&nbsp;</div>
				<div class="col-sm-4"></div><div class="col-sm-8"><a href="Registration.php">New Committee Chair Register Here</a></div>
			</form>
		</div>
		<div class="col-sm-5"></div>
	</div>
	<div class="row">&nbsp;</div>
	
	<div class="row">&nbsp;</div>
	
</div>
<footer class="container-fluid text-center"  style="background-color: #C62703;">
  <p> &#169; Copyright 2018</p>  
</footer>

</body>
</html>
<?php
include 'Database_Connection.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{	
	$sql="select * from login where user_id='".$_REQUEST["userid"]."' and password='".sha1($_REQUEST["pwd"])."' and department_id='".$_REQUEST["dept"]."' and status!='0'";
	
	$result = $connection->query($sql);
	
	if ($result->num_rows > 0) 
	{
		if ($row=$result->fetch_assoc())
		{			
			$_SESSION['course']=$row["course"];
			
			if($row["status"]=="1")
			{
				if($_REQUEST["dept"]=="1")
				{
					$_SESSION['Dean']=$_REQUEST["userid"];
					?>
					<script type="text/javascript">
						window.location.href = "Dean/Dean.php";
					</script>
					<?php
				}
				else if($_REQUEST["dept"]=="2")
				{
					$_SESSION['CommitteeChair']=$_REQUEST["userid"];
					?>
					<script type="text/javascript">
						window.location.href = "Committee Chair/Committee_Chair.php";
					</script>
					<?php
				}
				else if($_REQUEST["dept"]=="3")
				{
					$_SESSION['CommitteeMembers']=$_REQUEST["userid"];
					?>
					<script type="text/javascript">
						window.location.href = "Committee Members/Committee_Members.php";
					</script>
					<?php
				}
				else if($_REQUEST["dept"]=="4")
				{
					$_SESSION['DepartmentChairs']=$_REQUEST["userid"];
					?>
					<script type="text/javascript">
						window.location.href = "Department Chairs/Department_Chairs.php";
					</script>
					<?php
				}
				else if($_REQUEST["dept"]=="5")
				{
					$_SESSION['Faculty']=$_REQUEST["userid"];
					?>
					<script type="text/javascript">
						window.location.href = "Faculty/Faculty.php";
					</script>
					<?php
				}
			}
			else
			{
				$_SESSION['pwdreset']=$_REQUEST["userid"];
				$_SESSION['dept2']=$_REQUEST["dept"];
				?>
				<script type="text/javascript">
					window.location.href = "PasswordReset.php";
				</script>
				<?php
			}
		}		
	} 
	else 
	{
?>
		<script type="text/javascript">
			alert("Sorry, your credentials are not valid, Please try again.");
			window.location.href = "Index.php";
		</script>
<?php
	}
	$connection->close();	
}
?>