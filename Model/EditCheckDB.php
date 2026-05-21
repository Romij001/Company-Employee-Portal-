<?php
	
	function EditCheck($empId, $fname, $designation, $empType, $gender, $email, $id) {
		$conn = mysqli_connect("localhost", "root", "", "Data_Employee_Portal");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$stmt = mysqli_stmt_init($conn);
		
		mysqli_stmt_prepare($stmt, "UPDATE `employee_registration` SET EmployeeID = ?, FullName = ?, Designation = ?, EmployeeType = ?, Gender = ?, email = ? WHERE UserID = ?");
		mysqli_stmt_bind_param($stmt, "ssssssi", $empId, $fname, $designation, $empType, $gender, $email, $id);
		mysqli_stmt_execute($stmt);
		$num =  mysqli_stmt_affected_rows($stmt);
		
		return $num;
    } 
?>