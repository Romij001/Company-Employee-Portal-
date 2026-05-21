<?php
	
	function Registration($empId, $fname, $designation, $empType, $gender, $email, $pwd) {
		$conn = mysqli_connect("localhost", "root", "", "Data_Employee_Portal");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$stmt = mysqli_stmt_init($conn);
		$status = 1;
		mysqli_stmt_prepare($stmt, "INSERT INTO employee_registration (EmployeeID, FullName, Designation, EmployeeType, Gender, Email, Password, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		mysqli_stmt_bind_param($stmt, "ssssssss", $empId, $fname, $designation, $empType, $gender, $email, $pwd, $status);
		mysqli_stmt_execute($stmt);
		$res = mysqli_stmt_get_result($stmt);

		// $num = mysqli_num_rows($res);
		return $res;
	} 
?>