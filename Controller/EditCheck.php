<?php  

session_start();
    require("../Model/EditCheckDB.php");

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		// $id =  $_POST['id'];
		// $fname =  $_POST['fname'];
        // $lname =  $_POST['lname'];
        // $gender=  $_POST['gender'];
        // $email =  $_POST['email'];
        $id = $_POST['userId'];
        $empId =  $_POST['empId'];
		$fname =  $_POST['fname'];
        $designation =  $_POST['designation'];
        $empType =  $_POST['employeeType'];
        $gender=  $_POST['gender'];
        $email =  $_POST['email'];
        
		$_SESSION['isEdit_Success'] = false ;
        $isvalid = true;
        
		function ContainsNumbers($String){
			return preg_match('~[0-9]~', $String);
		}

		if (empty($empId)) {
		     $_SESSION['empId_error_msg'] = "Employee ID is empty";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../Views/Rpage.php");
		}
		else 
		if (empty($fname)) {
		     $_SESSION['fname_error_msg'] = "First name  is empty";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../Views/Rpage.php");
		}
		else if (ContainsNumbers($fname)) {
		     $_SESSION['fname_error_msg'] = "Name can not be Number";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../Views/Rpage.php");
		}
		else if(empty($designation)) {
		     $_SESSION['designation_error_msg'] = "Designation field is empty";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../Views/Rpage.php");
		}
		else if (ContainsNumbers($designation)) {
		     $_SESSION['designation_error_msg'] = "Designation can not be Number";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../Views/Rpage.php");
		}
		else if (empty($empType)) {
		     $_SESSION['employeeType_error_msg'] = "Employee Type option must be selected";
		     $_SESSION['isReg_valid'] = false ;
		     $isvalid = false;
		     header ("Location: ../Views/Rpage.php");
		}
		else if (empty($gender)) {
		     $_SESSION['gender_error_msg'] = "Gender option must be selected";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../Views/Rpage.php");
		}
		else if(empty($email)) {
		     $_SESSION['email_error_msg'] = "Email is empty";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../Views/Rpage.php");
		}
		else  {
		     $_SESSION['fname_error_msg'] = "";
		     $_SESSION['lname_error_msg'] = "";
		     $_SESSION['gender_error_msg'] = "";
		     $_SESSION['email_error_msg'] = "";
		     $_SESSION['isEdit_Success'] = true ;

			$servername = "localhost";
			$username = "root";
			$password = "";
			
			$update = EditCheck($empId, $fname, $designation, $empType, $gender, $email, $id);
			
			if($update > 0) 
			{
				$_SESSION['isEdit_Success'] = true;
				$_SESSION['error_msg'] = "";
				header('Location: ../Views/EDashboard.php');
			}
			else{
				$_SESSION['isEdit_Success'] = false;
				$_SESSION['error_msg'] = "Sorry could not edit Employee.";
				header('location: ../Views/EmployeeEdit.php');
			}
		}
	}


?>