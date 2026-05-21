  <?php
   
  function EditEmployee($id) {
  $conn = mysqli_connect("localhost", "root",  "", "Data_Employee_Portal", 3306);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "SELECT * FROM `employee_registration` WHERE UserID = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    return $res ;

   } 

?> 