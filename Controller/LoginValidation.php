<?php

	session_start();

	require("../model/LoginDB.php");

	if ($_SERVER['REQUEST_METHOD'] === "POST") {

		$email = sanitize($_POST['email']);
		$password = sanitize($_POST['password']);

		$servername = "localhost";
		$username = "root";
		$pass = "";
		$isvalid = true;

		if (empty($email)) {
			 $_SESSION['email_error_msg'] = "Email is empty";
			 $_SESSION['islogin_valid'] = false ;
			 $isvalid = false;
			 header ("Location: ../Views/Login.php");
		}

		if (empty($password)) {
			 $_SESSION['Password_error_msg'] = "Password is empty";
			 $_SESSION['islogin_valid'] = false ;
			 $isvalid = false;
			 header ("Location: ../Views/Login.php");
		}

		if ($isvalid === true) {
			$_SESSION['email_error_msg'] = "" ;
			$_SESSION['Password_error_msg'] = "" ;
			$_SESSION['global_error_msg'] = "";

			$num = Login($email, $password);
			echo $_SESSION['EmployeeType'];
			
			// $conn = mysqli_connect($servername, $username, $password, "voting_management", 3306);
			// if (!$conn) {
			//   die("Connection failed: " . mysqli_connect_error());
			// }
			// $sql = "SELECT * FROM `users` WHERE `Email` = '$email' And `Password` = '$Password'";
			// //echo $sql;
			// $res = mysqli_query($conn, $sql);
			// $num = mysqli_num_rows($res);
			
			if($num > 0) 
			{
		  		$_SESSION['islogin_valid'] = true;
		  		$_SESSION['global_error_msg'] = "";
				echo($_SESSION['islogin_valid']);
				header ("Location: ../Views/EDashboard.php");
			}
			else{
			  $_SESSION['islogin_valid'] = false;
			  $_SESSION['global_error_msg'] = "Email or Password does not match";
			  header ("Location: ../Views/Login.php");
			}
		}
	}

	Function sanitize($data){
		  $data = trim($data);
		  $data = stripcslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;


	}


?>