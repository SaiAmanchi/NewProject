<center>
<?php 
	
include '../Database_Connection.php';
session_start();

	$sql="select request_form.id as ID, request_form.user_id, `academic_unit`, `item_desc`, `cost`, `how_it_will_use`, `justification`, `classes_support`, `no_of_students`, `date`, `c_chair_review`, `c_chair_comment`, d_chair_approval, rank, dean_approval, CONCAT(`first_name`, ' ', `last_name`) as Name from request_form inner join registration_details on request_form.user_id=registration_details.user_id where course='".$_SESSION['course']."'";
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
	      <th>User ID</th>      
	      <th>Name</th>
	      <th>Unit</th>      
	      <th>Item</th>
	      <th>Cost</th> 
	      <th>How it will</th>
	      <th>Justification</th>
	      <th>Classes</th>           
	      <th>No of Std</th>
	      <th>Date</th>
	      <th>Department Chair Approval</th>
	      <th>Rank</th>
	      <th>Committee Review</th>
	      <th>Comments</th>
	      <th>Dean Approval</th>
	      <th></th>
	      <th></th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php
	    while($row = $res->fetch_assoc()){
				$id=$row["ID"];
	          echo "<tr><td>{$row['user_id']}</td><td>{$row['Name']}</td><td>{$row['academic_unit']}</td><td>{$row['item_desc']}</td><td>{$row['cost']}</td><td>{$row['how_it_will_use']}</td><td>{$row['justification']}</td><td>{$row['classes_support']}</td><td>{$row['no_of_students']}</td><td>{$row['date']}</td><td>{$row['d_chair_approval']}</td><td>{$row['rank']}</td><td>{$row['c_chair_review']}</td><td>{$row['c_chair_comment']}</td><td>{$row['dean_approval']}</td><td><a href='Update_Status.php?id=$id'>Update Status</a></td><td><a href='View_Members_Review.php?id=$id'>Committee Members Review</a></td></tr>\n";
	        }      
	    ?>
	  </tbody>
	</table>
	
	<?php 
	}
	else
		echo "\nNo records found at this time.";

?>