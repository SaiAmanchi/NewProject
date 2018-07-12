<center>
<?php 
session_start();
$rid=$_GET['id'];
include '../Database_Connection.php';

	$sql="SELECT committe_members.id, `request_no`, CONCAT(`first_name`, ' ', `last_name`) as committe_member, `Yes`, `Yes_with Reservations`, `Need More Info`, `No`, `Comment` FROM `committe_members` inner join registration_details on committe_members.committe_member=registration_details.user_id where request_no='".$rid."'";
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
	      <th>Request No</th>      
	      <th>Committee Member</th>
	      <th>Yes</th> 
	      <th>Yes, with Reservations</th>
	      <th>Need More Info</th>
	      <th>No</th> 
	      <th>Comments</th>
	      
	    </tr>
	  </thead>
	  <tbody>
	    <?php
	    while($row = $res->fetch_assoc()){
				
	          echo "<tr><td>{$row['request_no']}</td><td>{$row['committe_member']}</td><td>{$row['Yes']}</td><td>{$row['Yes_with Reservations']}</td><td>{$row['Need More Info']}</td><td>{$row['No']}</td><td>{$row['Comment']}</td></tr>\n";
	        }      
	    ?>
	  </tbody>
	</table>
	
	<?php 
	}
	else
		echo "\nNo records found at this time.";

?>