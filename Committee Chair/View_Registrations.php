
<center>
<?php 
	
include '../Database_Connection.php';
session_start();

	$sql="select registration_details.id as id, `department`, `user_id`, `first_name`, `last_name`, `course`, `email_id`, status from registration_details inner join user_types on registration_details.department_id=user_types.id where registration_details.department_id!='2' and course='".$_SESSION['course']."'";
	$res=$connection->query($sql);

	if($res->num_rows>0)
	{
	?>
	<br> 
	<br>
	<br>
	<table border="2">
	  <thead>
	    <tr style="color: green;">
	      <th>Department</th>      
	      <th>User ID</th>
	      <th>First Name</th>      
	      <th>Last Name</th>
	      <th>Email ID</th>
	      <th>Course</th> 
	      <th>Status</th>
	      <th></th>      
	    </tr>
	  </thead>
	  <tbody>
	    <?php
	    while($row = $res->fetch_assoc()){
				$id=$row["user_id"];
				$status=$row["status"];
	          echo "<tr><td>{$row['department']}</td><td>{$row['user_id']}</td><td>{$row['first_name']}</td><td>{$row['last_name']}</td><td>{$row['email_id']}</td><td>{$row['course']}</td><td>{$row['status']}</td>
	          <td>"?><form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
				  <input type="hidden" name="id" value="<?php echo $id; ?>">
				  <input type="hidden" name="status" value="<?php echo $status; ?>">
				  <input type="submit" class="btn btn-success" name="update" value="Update Status">
				  </form></td></tr><?php 
	        }      
	    ?>
	  </tbody>
	</table>
	
	<?php 
	}
	else
		echo "\nNo records found at this time.";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{		
		$st=$_REQUEST["status"];
		if($st=="Active")
		{
			$sql="update registration_details set status='InActive' where user_id='".$_REQUEST["id"]."'; ";
			$sql.="update login set `status`='0' where user_id='".$_REQUEST["id"]."'";
		}
		if($st=="InActive")
		{
			$sql="update registration_details set status='Active' where user_id='".$_REQUEST["id"]."'; ";
			$sql.="update login set `status`='1' where user_id='".$_REQUEST["id"]."'";
		}
	
		if ($connection->multi_query($sql) === TRUE) {	
			?>
			<script>
				alert("Status Updated Successfully");			
			</script>
			<?php
			header('Refresh: 0; url=View_Registrations.php');
		} else {
			echo "Error: " . $sql . "<br>" . $connection->error;
		}
		$connection->close();	
	}
?>