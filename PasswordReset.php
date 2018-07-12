<?php
	session_start();
	$userid=$_SESSION['pwdreset'];
?>
<html>
<head>
<link rel="stylesheet" href="Css/bootstrap.min.css">
</head>
	<body>
		<center><h2><span>Password Reset</span></h2>
		<br>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
			<table style="height: 250px;">
			  
				<tr> <td>User ID</td><td> <input type="text" name="userid" id="userid" required="required" class="form-control" readonly="readonly" value="<?php echo  $userid; ?>"></td> </tr>				 					
				<tr> <td>New Password</td><td> <input type="password" name="newpwd" id="newpwd" required="required" class="form-control"></td> </tr>
				<tr> <td>Confirm Password</td><td> <input type="password" name="cnpwd" id="cnpwd" required="required" class="form-control"></td> </tr> 
				 
				<tr><td>&nbsp;</td></tr> 
				<tr align="center"> <td colspan="2"><input id="button" type="submit" name="submit" class="btn btn-success" value="Reset"></td> </tr> 
				
			</table>
		</form>
	</body>
</html>
<?php
if(isset($_REQUEST["submit"]))
{
	include 'Database_Connection.php';
	
	$userid=$_REQUEST['userid'];
	$newpwd=$_REQUEST['newpwd'];
	$cnpwd=$_REQUEST['cnpwd'];
	if($newpwd==$cnpwd)
	{		
		$sql="update login set password='".sha1($newpwd)."', status='1' where user_id='".$userid."'";
		if ($connection->query($sql) === TRUE) 
		{
			if($_SESSION['dept2']=="1")
			{
				$_SESSION['Dean']=$_REQUEST["userid"];
				header("location: Dean/Dean.php");
			}
			else if($_SESSION['dept2']=="2")
			{
				$_SESSION['CommitteeChair']=$_REQUEST["userid"];
				header("location: Committee Chair/Committee_Chair.php");
			}
			else if($_SESSION['dept2']=="3")
			{
				$_SESSION['CommitteeMembers']=$_REQUEST["userid"];
				header("location: Committee Members/Committee_Members.php");
			}
			else if($_SESSION['dept2']=="4")
			{
				$_SESSION['DepartmentChairs']=$_REQUEST["userid"];
				header("location: Department Chairs/Department_Chairs.php");
			}
			else if($_SESSION['dept2']=="5")
			{
				$_SESSION['Faculty']=$_REQUEST["userid"];
				header('location: Faculty/Faculty.php');
			}			
		}
	}
	else
	{
?>
		<script type="text/javascript">
		alert("Password and Confirm Password Does't Match");
		</script>
<?php
	}
	$connection->close();
}	
?>