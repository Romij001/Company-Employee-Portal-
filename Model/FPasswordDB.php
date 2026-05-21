<?php
	
	function FPassword($pwd3, $pwd4, $email) {
		$conn = mysqli_connect("localhost", "root", "", "Data_Employee_Portal");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$stmt = mysqli_stmt_init($conn);
		
		mysqli_stmt_prepare($stmt, "UPDATE `employee_registration` SET Password = ? WHERE Email = ? ");
		mysqli_stmt_bind_param($stmt, "ss", $pwd4, $email);
		mysqli_stmt_execute($stmt);
		$num =  mysqli_stmt_affected_rows($stmt);
		
		return $num;
    } 
?>