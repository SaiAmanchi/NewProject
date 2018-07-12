<?php 
session_start();
$rid='';
if(isset($_GET['id'])) {
$rid=$_GET['id'];
}
include '../Database_Connection.php';
$sql="Select * from request_form where id='".$rid."'";
$result=$connection->query($sql);
if($result->num_rows>0)
{
	while ($row=$result->fetch_assoc())
	{
		$uid=$row["user_id"];
		$unit=$row["academic_unit"];
		$item=$row["item_desc"];
	}
}
?>

<html>
<link rel="stylesheet" href="../Css/bootstrap.min.css">
<body>
<center>
<br><br>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table>
<tr><td>User ID</td><td> <input type="text" name="f0" readonly="readonly" class="form-control" value="<?php echo  $uid; ?>"></td> </tr>
<tr> <td>Academic Unit</td><td> <input type="text" name="f1" class="form-control" value="<?php echo  $unit; ?>"></td> </tr>
<tr> <td>Item Description</td><td> <input type="text" name="f2" class="form-control" value="<?php echo  $item; ?>"></td> </tr> 
<tr> <td>Action</td><td> <select name="f3" style="width: 195px" class="btn btn-default dropdown-toggle" required> 								       																					
                                                              <option value="">--Select--</option>				       																				
                                                              <option value="Yes">Yes</option>				       																				
                                                              <option value="No">No</option>
                                                              <option value="Yes, with reservations">Yes, with reservations</option>				       																				
                                                              <option value="Need more information">Need more information</option>
                                                      </select> </tr>
<tr> <td>Comments</td><td> <input type="text" name="f4" class="form-control"></td> </tr>
<tr><td>&nbsp;</td> <td><input type="hidden" name="f5" value="<?php echo $rid; ?>"> </td></tr>
<tr align="center"> <td colspan="2">
<input id="button" type="submit" name="submit" class="btn btn-success" value="Update"></td> </tr> 

</table>
</form>
</body>
</html>
	
<?php 
		
	if(isset($_REQUEST["submit"]))
	{					
		$review=$_REQUEST["f3"];
		
		$sql=null;
		
		$sql2="Select * from committe_members where request_no='".$_REQUEST["f5"]."' and committe_member='".$_SESSION['CommitteeMembers']."'";
		$result2=$connection->query($sql2);
		if($result2->num_rows>0)
		{
			if($review=="Yes")
			{
				$sql="update committe_members set Yes='X',`Yes_with Reservations`='', No='', `Need More Info`='', Comment='".$_REQUEST["f4"]."' where request_no='".$_REQUEST["f5"]."' and committe_member='".$_SESSION['CommitteeMembers']."'";
			}
			else if($review=="No")
			{
				$sql="update committe_members set Yes='', `Yes_with Reservations`='', No='X', `Need More Info`='', Comment='".$_REQUEST["f4"]."' where request_no='".$_REQUEST["f5"]."' and committe_member='".$_SESSION['CommitteeMembers']."'";
			}
			else if($review=="Yes, with reservations")
			{
				$sql="update committe_members set Yes='', `Yes_with Reservations`='X', No='', `Need More Info`='', Comment='".$_REQUEST["f4"]."' where request_no='".$_REQUEST["f5"]."' and committe_member='".$_SESSION['CommitteeMembers']."'";
			}
			else if($review=="Need more information")
			{
				$sql="update committe_members set Yes='', `Yes_with Reservations`='', No='', `Need More Info`='X', Comment='".$_REQUEST["f4"]."' where request_no='".$_REQUEST["f5"]."' and committe_member='".$_SESSION['CommitteeMembers']."'";
			}
		}
		else
		{
			if($review=="Yes")
			{
				$sql="insert into committe_members(request_no, committe_member, Yes, Comment) values('".$_REQUEST["f5"]."','".$_SESSION['CommitteeMembers']."','X','".$_REQUEST["f4"]."')";
			}
			else if($review=="No")
			{
				$sql="insert into committe_members(request_no, committe_member, No, Comment) values('".$_REQUEST["f5"]."','".$_SESSION['CommitteeMembers']."','X','".$_REQUEST["f4"]."')";
			}
			else if($review=="Yes, with reservations")
			{
				$sql="insert into committe_members(request_no, committe_member, `Yes_with Reservations`, Comment) values('".$_REQUEST["f5"]."','".$_SESSION['CommitteeMembers']."','X','".$_REQUEST["f4"]."')";
			}
			else if($review=="Need more information")
			{
				$sql="insert into committe_members(request_no, committe_member, `Need More Info`, Comment) values('".$_REQUEST["f5"]."','".$_SESSION['CommitteeMembers']."','X','".$_REQUEST["f4"]."')";
			}					
		}
		
		if ($connection->query($sql) === TRUE)
		{
			?>
			<script>
				if(true)
				{
					window.location="Committee_Members_Review.php";
				}
			</script>
			<?php
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . $connection->error;
		}
	
		$connection->close();
	}
?>
