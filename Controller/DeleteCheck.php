<?php  

session_start();
require("../Model/EmployeeDeleteDB.php");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	
    $id = $_POST['userId'];

        
    $update = DeleteEmployee($id);
    
    if($update > 0) 
    {
        $_SESSION['isEdit_Success'] = true;
        $_SESSION['error_msg'] = "";
        header('Location: ../Views/EDashboard.php');
    }
    else{
        $_SESSION['isEdit_Success'] = false;
        $_SESSION['error_msg'] = "Sorry could not Delete Employee.";
        header('Location: ../Views/EDashboard.php');
    }
}