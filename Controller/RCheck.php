<?php  

session_start();

    require("../Model/RpageDB.php");

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		$empId =  $_POST['empId'];
		$fname =  $_POST['fname'];
        $designation =  $_POST['designation'];
        $empType =  $_POST['employeeType'];
        $gender=  $_POST['gender'];
        $email =  $_POST['email'];
        $pwd   =  $_POST['pwd'];
        $pwd1  = $_POST['pwd1'];

        $servername = "localhost";
		$username = "root";
		$password = "";
        

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
		else if(empty($pwd)) {
		     $_SESSION['Password_error_msg'] = "Password is empty";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../Views/Rpage.php");
		}  

		else if(empty($pwd1)) {
		     $_SESSION['CPassword_error_msg'] = "Confirm Password is empty";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../Views/Rpage.php");
		} 
		else  {
			$_SESSION['empId_error_msg'] = "";
			$_SESSION['fname_error_msg'] = "";
			$_SESSION['designation_error_msg'] = "";
			$_SESSION['employeeType_error_msg'] = "";
			$_SESSION['gender_error_msg'] = "";
			$_SESSION['email_error_msg'] = "";
			$_SESSION['Password_error_msg'] = "";
			$_SESSION['CPassword_error_msg'] = "";
			$_SESSION['isReg_valid'] = true ;
			$_SESSION['islogin_valid'] = true ;

			$res = Registration($empId, $fname, $designation, $empType, $gender, $email, $pwd);

			

			// $conn = mysqli_connect($servername, $username, $password, "voting_management", 3306);
			// if (!$conn) {
			//   die("Connection failed: " . mysqli_connect_error());
			// }
			// $sql = "INSERT INTO `users`(`FirstName`, `LastName`, `Gender`, `Email`, `Password`) VALUES ('$fname','$lname','$gender','$email','$pwd')";
			
			// $insert = mysqli_query($conn, $sql);
			// $rows_count = count($users);
			// $new_user = array(
			// "ID" => $rows_count + 1,
			// "FirstName" => $fname,
			// "LastName" => $lname,
			// "Gender" => $gender,
			// "Email" => $email,
			// "Password" => $pwd,
			// );
			// array_push($users,$new_user);
			
			// require("../controller/WriteFile.php");			
			
			if($res > 0) 
			{
				$_SESSION['isReg_valid'] = true;
				$_SESSION['File_error_msg'] = "";
				header('location: ../Views/EDashboard.php');
			}
			else {
                $_SESSION['isReg_valid'] = false;
				$_SESSION['File_error_msg'] = "Sorry could not register user.";
				header('location: ../Views/Rpage.php');

			}
			header("Location: ../Views/EDashboard.php");
		}

}


?>