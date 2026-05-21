<?php
   
  function DeleteEmployee($id) {
  $conn = mysqli_connect("localhost", "root",  "", "Data_Employee_Portal", 3306);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
    $stmt = mysqli_stmt_init($conn);
    $status = 0;
    mysqli_stmt_prepare($stmt, "UPDATE `employee_registration` SET Status = ? WHERE UserID = ?");
    mysqli_stmt_bind_param($stmt, "ii", $status, $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_affected_rows($stmt);
    
    return $res ;

   } 

?>