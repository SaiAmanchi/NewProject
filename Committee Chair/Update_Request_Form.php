<?php 
session_start();
$rid='';
if(isset($_GET['id'])) { 
$rid=$_GET['id'];
}
include '../Database_Connection.php';
$sql="select id, user_id, `academic_unit`, `item_desc`, `cost`, `how_it_will_use`, `justification`, `classes_support`, `no_of_students`, `date` from request_form where id='".$rid."'";
$result=$connection->query($sql);
if($result->num_rows>0)
{
	while ($row=$result->fetch_assoc())
	{
		$uid=$row["user_id"];
		$unit=$row["academic_unit"];
		$item=$row["item_desc"];
		$cost=$row["cost"];
		$how_it_will_use=$row["how_it_will_use"];
		$justification=$row["justification"];
		$classes_support=$row["classes_support"];
		$no_of_students=$row["no_of_students"];
		$date=$row["date"];
	}	
}
$connection->close();
?>
<html>
<head>
  <link rel="stylesheet" href="../Css/bootstrap.min.css">
</head>
<body>
<div style="min-height: 450px;margin-top: 0px;">
	<center><h2><span>Faculty Request Form</span></h2>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
		<table style="height: 400px;">
			<tr> <td>Request ID</td><td> <input type="text" name="f0" required="required" value="<?php echo $rid; ?>" readonly="readonly" class="form-control"></td> </tr>
			<tr> <td>User ID</td><td> <input type="text" name="f9" required="required" value="<?php echo $uid; ?>" readonly="readonly" class="form-control"></td> </tr>
			<tr> <td>Academic Unit</td><td> <input type="text" name="f1" required="required" value="<?php echo $unit; ?>" class="form-control"></td> </tr>
			<tr> <td>Item Description</td><td> <input type="text" name="f2" required="required" value="<?php echo $item; ?>" class="form-control"></td> </tr> 
			<tr> <td>Cost (with shipping)</td><td> <input type="text" name="f3" required="required" value="<?php echo $cost; ?>" class="form-control"></td> </tr> 
			<tr> <td>How it will be used</td><td> <input type="text" name="f4" required="required" value="<?php echo $how_it_will_use; ?>" class="form-control"></td> </tr>
			<tr> <td>Justification</td><td> <input type="text" name="f5" required="required" value="<?php echo $justification; ?>" class="form-control"></td> </tr> 
			<tr> <td>Classes supported</td><td> <input type="text" name="f6" required="required" value="<?php echo $classes_support; ?>" class="form-control"></td> </tr> 
			<tr> <td>No of students impacted each year</td><td> <input type="text" name="f7" value="<?php echo $no_of_students; ?>" required="required" class="form-control"></td> </tr>
			<tr> <td>Date</td><td> <input type="text" name="f8" value="<?php echo $date; ?>" readonly="readonly" class="form-control"></td> </tr>			
			
			<tr align="center"> <td colspan="2"><input type="submit" name="submit" class="btn btn-success" value="Update"></td> </tr> 
		</table>
	</form>
</div>

</body>
</html>

<?php 
include '../Database_Connection.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{		
	$sql="update request_form set academic_unit='".$_REQUEST["f1"]."', item_desc='".$_REQUEST["f2"]."', cost='".$_REQUEST["f3"]."', `how_it_will_use`='".$_REQUEST["f4"]."', `justification`='".$_REQUEST["f5"]."', `classes_support`='".$_REQUEST["f6"]."', `no_of_students`='".$_REQUEST["f7"]."' where `user_id`='".$_REQUEST["f9"]."' and id='".$_REQUEST["f0"]."'";		
		
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