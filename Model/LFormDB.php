<?php
	
	function LeaveForm($UserID, $Name, $designation, $TypeOfLeave, $LeaveName, $DateFrom, $DateTo, $Reason, $rec_mail) {
		$conn = mysqli_connect("localhost", "root", "", "Data_Employee_Portal");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$stmt = mysqli_stmt_init($conn);
		$status = 0;
		mysqli_stmt_prepare($stmt, "INSERT INTO Leave_Application (UserID, EmployeeName, Designation, TypeOfLeave, LeaveName, Datefrom, DateTo, Reason, MailedPersonEmail, ApprovalStatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		mysqli_stmt_bind_param($stmt, "isssssssss", $UserID, $Name, $designation, $TypeOfLeave, $LeaveName, $DateFrom, $DateTo, $Reason, $rec_mail, $status);
		mysqli_stmt_execute($stmt);
		$res = mysqli_stmt_affected_rows($stmt);
		// $num = mysqli_num_rows($res);
		
		return $res;

	} 
?>