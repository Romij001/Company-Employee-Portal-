<?php
   
  function ApproveLeave($id) {
  $conn = mysqli_connect("localhost", "root",  "", "Data_Employee_Portal", 3306);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
    $stmt = mysqli_stmt_init($conn);
    $status = 1;
    $user_id = $_SESSION['UserID'];
    $user_name = $_SESSION['Name'];

    mysqli_stmt_prepare($stmt, "UPDATE `leave_application` SET  ApprovedById = ?, ApprovedByName = ?, ApprovalStatus = ?  WHERE ID = ?");
    mysqli_stmt_bind_param($stmt, "isii", $user_id, $user_name, $status, $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_affected_rows($stmt);
    
    return $res ;

   } 

?>