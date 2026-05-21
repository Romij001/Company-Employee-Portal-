<?php
	
	function Login($email, $password) {
		$conn = mysqli_connect("localhost", "root", "", "Data_Employee_Portal");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$stmt = mysqli_stmt_init($conn);
		$status = 1;
		mysqli_stmt_prepare($stmt, "SELECT * FROM employee_registration WHERE Email = ? AND Password = ? AND Status = ?");
		mysqli_stmt_bind_param($stmt, "ssi", $email, $password, $status);
		mysqli_stmt_execute($stmt);
		$res = mysqli_stmt_get_result($stmt);

		$num = mysqli_num_rows($res);
		if($num > 0)
		{
		$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
		
		$userId =$row['UserID'];
		$empId =$row['EmployeeID'];
		$fname = $row['FullName'];
		$designation = $row['Designation'];
		$empgender = $row['Gender'];
		$email = $row['Email'];
		$emptype = $row['EmployeeType']; 
		$_SESSION['Name']=$fname;
		$_SESSION['Signed_in']=TRUE;
		$_SESSION['UserID']= $userId;
		$_SESSION['EmpID']= $empId;
		$_SESSION['Designation']= $designation;
		$_SESSION['Email']= $email;
		$_SESSION['EmployeeType'] = $emptype;
		$_SESSION['Gender'] = $empgender;
		}
		return $num;
	} 
?>