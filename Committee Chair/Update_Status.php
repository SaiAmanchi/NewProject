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
                                                              <option value="Recommended">Recommended</option>				       																				
                                                              <option value="Recommended, with Reservations">Recommended, with Reservations</option>
                                                              <option value="Not Recommended">Not Recommended</option>	
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
		$sql="update request_form set c_chair_review='".$_REQUEST["f3"]."', c_chair_comment='".$_REQUEST["f4"]."' where id='".$_REQUEST["f5"]."'";
	
		if ($connection->query($sql) === TRUE) {		
			?>
			<script>
				if(true)
				{
					window.location="Committee_Chair_Review.php";
				}
			</script>
			<?php
		} else {
			echo "Error: " . $sql . "<br>" . $connection->error;
		}
		$connection->close();
	}
?>
