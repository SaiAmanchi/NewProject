
<html>
<head>
  <link rel="stylesheet" href="../Css/bootstrap.min.css">
</head>
<body>

<div style="min-height: 450px;margin-top: 0px;">
	<center><h2><span>Department Registration</span></h2>
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
                                                              <option value="1">Dean</option>				       																				
                                                              <option value="3">Committee Members</option>
                                                              <option value="4">Department Chairs</option>
                                                              <option value="5">Faculty of HCBPS</option>
                                                      </select> </tr>
			
			<tr align="center"> <td colspan="2"><input type="submit" name="submit" class="btn btn-success" value="Register"></td> </tr> 
		</table>
	</form>
</div>

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