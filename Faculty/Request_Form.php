
<html>
<head>
  <link rel="stylesheet" href="../Css/bootstrap.min.css">
</head>
<body>
<div style="min-height: 450px;margin-top: 0px;">
	<center><h2><span>Faculty Request Form</span></h2>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
		<table style="height: 400px;">
			<tr> <td>Academic Unit</td><td> <input type="text" name="f1" required="required" class="form-control" placeholder="Enter Academic Unit" pattern="[a-zA-Z ]*"></td> </tr>
			<tr> <td>Item Description</td><td> <input type="text" name="f2" required="required" class="form-control" placeholder="Enter Item Description" pattern="[a-zA-Z ]*"></td> </tr> 
			<tr> <td>Cost (with shipping)</td><td> <input type="text" name="f3" required="required" class="form-control" placeholder="Enter Cost (with shipping)" pattern="[0-9]*"></td> </tr> 
			<tr> <td>How it will be used</td><td> <input type="text" name="f4" required="required" class="form-control" placeholder="Enter How it will be used" pattern="[a-zA-Z ]*"></td> </tr>
			<tr> <td>Justification</td><td> <input type="text" name="f5" required="required" class="form-control" pattern="[a-zA-Z ]*" placeholder="Enter Justification"></td> </tr> 
			<tr> <td>Classes supported</td><td> <input type="text" name="f6" required="required" class="form-control" placeholder="Enter Classes supported" pattern="[a-zA-Z, ]*"></td> </tr> 
			<tr> <td>No of students impacted each year</td><td> <input type="text" name="f7" required="required" class="form-control" placeholder="Enter No of students impacted each year" pattern="[0-9]*"></td> </tr>			
			
			<tr align="center"> <td colspan="2"><input type="submit" name="submit" class="btn btn-success" value="Submit"></td> </tr> 
		</table>
	</form>
</div>

</body>
</html>

<?php 
session_start();
include '../Database_Connection.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{	
	$date=date("Y-m-d");
	$sql="insert into request_form(`user_id`, `academic_unit`, `item_desc`, `cost`, `how_it_will_use`, `justification`, `classes_support`, `no_of_students`, `date`, `d_chair_approval`, `rank`, `c_members_review`, `c_chair_review`, `dean_approval`, `status`) 
		values ('".$_SESSION['Faculty']."','".$_REQUEST["f1"]."','".$_REQUEST["f2"]."','".$_REQUEST["f3"]."','".$_REQUEST["f4"]."','".$_REQUEST["f5"]."','".$_REQUEST["f6"]."','".$_REQUEST["f7"]."','".$date."','Pending','0','Pending','Pending','Pending','0'); ";
		
	if ($connection->query($sql) === TRUE) {
		?>
		<script>
			alert("Request Submitted Successfully Completed");			
		</script>
		<?php
	} else {
		echo "Error: " . $sql . "<br>" . $connection->error;
	}
	$connection->close();	
}
?>