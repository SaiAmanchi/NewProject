<?php
class RegistrationDetails
{		
	public $department_id;
	public $user_id;
	public $first_name;
	public $last_name;
	public $email_id;
	public $course;
	public $status;
	public $password;
	
	public function FacultyRegistration()
	{
		include '../Database_Connection.php';
		
		$sql="insert into registration_details(`department_id`, `user_id`, `first_name`, `last_name`, `email_id`, `course`, status) values ('".$this->department_id."','".$this->user_id."','".$this->first_name."','".$this->last_name."','".$this->email_id."','".$this->course."','".$this->status."'); ";
		$sql.="insert into login(`department_id`, `course`, `user_id`, `password`, `status`) values ('".$this->department_id."','".$this->course."','".$this->user_id."','".sha1($this->password)."','2')";
		
		if ($connection->multi_query($sql) === TRUE) {
		
			$to=$this->email_id;
			$sub="Registration";
			$msg="Registration Details\nUser ID: ".$this->user_id."\nFull Name: ".$this->first_name." ".$this->last_name."\nCourse: ".$this->course."\nDepartment: ".$this->department_id."\nPassword: ".$this->password."\nThank You.";
			$headers="From: uremail@gmail.com";
				
			mail($to, $sub, $msg, $headers);
			?>
				<script>
					alert("Registration Successfully Completed");			
				</script>
				<?php
			} else {
				echo "Error: " . $sql . "<br>" . $connection->error;
			}
			$connection->close();
	}	
	
}

?>