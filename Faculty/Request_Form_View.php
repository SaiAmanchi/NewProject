<center>
<?php 
	
include '../Database_Connection.php';
session_start();

	$sql="select * from request_form where user_id='".$_SESSION['Faculty']."'";
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
	    </tr>
	  </thead>
	  <tbody>
	    <?php
	    while($row = $res->fetch_assoc()){
				$id=$row["id"];
	          echo "<tr><td>{$row['academic_unit']}</td><td>{$row['item_desc']}</td><td>{$row['cost']}</td><td>{$row['how_it_will_use']}</td><td>{$row['justification']}</td><td>{$row['classes_support']}</td><td>{$row['no_of_students']}</td><td>{$row['date']}</td><td>{$row['d_chair_approval']}</td><td>{$row['rank']}</td><td>{$row['c_chair_review']}</td><td>{$row['c_chair_comment']}</td><td>{$row['dean_approval']}</td><td><a href='View_Members_Review.php?id=$id'>Committee Members Review</a></td></tr>\n";
	        }      
	    ?>
	  </tbody>
	</table>
	
	<?php 
	}
	else
		echo "\nNo records found at this time.";

?>