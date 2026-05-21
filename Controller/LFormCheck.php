<?php  

session_start();
require("../Model/LFormDB.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


?>
<?php

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		$UserID =  $_POST['userid'];
		$Name =  $_POST['name'];
        $designation =  $_POST['Designation'];
        $TypeOfLeave =  $_POST['typeofleave'];
        $LeaveName =  $_POST['leaveName'];
        $DateFrom=  $_POST['DateFrom'];
        $DateTo =  $_POST['DateTo'];
        $Reason = $_POST['Reason'];
        // $PersonSelect  =  $_POST['PersonSelect'];
        // $MailedPerson  =  $_POST['mailedPerson'];
        

        $servername = "localhost";
		$username = "root";
		$password = "";
        

        $isvalid = true;
		function ContainsNumbers($String){
			return preg_match('~[0-9]~', $String);
		} 
		if (empty($Name)) {
		     $_SESSION['name_error_msg'] = "Name field is empty";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../Views/LForm.php");
		}
		else if (ContainsNumbers($Name)) {
		     $_SESSION['name_error_msg'] = "Name can not be Number";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../Views/LForm.php");
		}
		else if(empty($designation)) {
		     $_SESSION['designation_error_msg'] = "Designation field is empty";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../Views/LForm.php");
		}
		else if (ContainsNumbers($designation)) {
		     $_SESSION['designation_error_msg'] = "Designation can not be Number";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../Views/LForm.php");
		}
		else if (empty($TypeOfLeave)) {
		     $_SESSION['typeofleave_error_msg'] = "Date must be checked";
		     $_SESSION['isReg_valid'] = false ;
		     $isvalid = false;
		     header ("Location: ../Views/LForm.php");
		}
		else if (empty($DateFrom)) {
		     $_SESSION['DateFrom_error_msg'] = "Date must be selected";
		     $_SESSION['isReg_valid'] = false ;
		     $isvalid = false;
		     header ("Location: ../Views/LForm.php");
		}
		else if (empty($DateTo)) {
		     $_SESSION['DateTo_error_msg'] = "Date must be selected";
		     $_SESSION['isReg_valid'] = false ;
		     $isvalid = false;
		     header ("Location: ../Views/LForm.php");
		}
		else if (empty($Reason)) {
		     $_SESSION['PersonSelect_error_msg'] = "Reason must be Filed";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../Views/LForm.php");
		}
		// else if (empty($PersonSelect)) {
		//      $_SESSION['PersonSelect_error_msg'] = "Person option must be selected";
		//      $_SESSION['isReg_valid'] = false ;
		// 	     $isvalid = false;
		//      header ("Location: ../Views/LForm.php");
		// }	 
		else  {
			$_SESSION['name_error_msg'] = "";
			$_SESSION['designation_error_msg'] = "";
			$_SESSION['typeofleave_error_msg'] = "";
			$_SESSION['DateFrom_error_msg'] = "";
			$_SESSION['DateTo_error_msg'] = "";
			$_SESSION['PersonSelect_error_msg'] = "";


		
		    // $name = htmlspecialchars($_POST['name']);
		    // $email = htmlspecialchars($_POST['email']);
		    // $subject = htmlspecialchars($_POST['subject']);
		    // $message = htmlspecialchars($_POST['message']);

		    // // Specify the recipient email address
		    // $to = 'your-specific-email@example.com'; // Replace with your email address

		    // // Build the email content
		    // $email_body = "Name: $name\n\nEmail: $email\n\nSubject: $subject\n\nMessage:\n$message";

		    // // Set the email headers (important for "From" address)
		    // // The Reply-To header allows you to reply directly to the sender's email
		    // $headers = "From: $email\r\n";
		    // $headers .= "Reply-To: $email\r\n";

		    // // Send the email using the mail() function
		    // $mail_sent = mail($to, $subject, $email_body, $headers);

		    // // Provide user feedback
		    // if ($mail_sent) {
		    //     // Redirect to a thank you page
		    //     header('Location: thank_you.html');
		    //     exit;
		    // } else {
		    //     echo "Message could not be sent. Please try again later.";
		    // }
	  
		    $rec_mail="romijnipu001@gmail.com, cfahima12@gmail.com";

			$res = LeaveForm($UserID, $Name, $designation, $TypeOfLeave, $LeaveName, $DateFrom, $DateTo, $Reason, $rec_mail);

           //Create an instance; passing `true` enables exceptions
			$mail = new PHPMailer(true);
			$email_status;
			try {
				//Server settings
				// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
				$mail->isSMTP();
				$mail->SMTPAuth   = true;    

				$email = $_SESSION['Email'];
				$fname = $_SESSION['Name'];
				$password = $_SESSION['Password'];                                //Enable SMTP authentication
				                                            //Send using SMTP
				$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
				$mail->Username   = 'romijnipu001@gmail.com';                     //SMTP username
				$mail->Password   = 'ctkvvyjaqzftibae';
				// $mail->Password   = $password;
				// $mail->SMTPSecure = 'tls';                               //SMTP password
				
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
				$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure  = PHPMailer::ENCRYPTION_STARTTLS`
                
				//Recipients
				$mail->setFrom($email, $fname);
				$mail->addAddress('romijnipu001@gmail.com', 'Romij');
				$mail->addAddress('cfahima12@gmail.com', 'Fahima');      //Add a recipient
				
				// $subject = 'Apply for leave';
				// $massage = `'Name: '. $Name .
				// ' Designation: ' . $designation .
				// 'Type Of Leave: ' . $LeaveName .
				// 'Date(From): ' . $DateFrom .
				// 'Date(To): ' . $DateTo .
				// 'Reason: ' . $Reason .
				// `;

				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = 'Apply for leave Application';
				$mail->Body    = '
				 <h4>Name: '. $Name .'</h4> 				
				 <h4>Designation: '. $designation .'</h4>
				 <h4>Type Of Leave: '. $LeaveName .'</h4> 
				 <h4>Date(From): '. $DateFrom .'</h4> 
				 <h4>Date(To): '. $DateTo .'</h4> 
				 <h4>Reason: '. $Reason .'</h4>  
				';
			

				$email_status = $mail->send();
				echo 'Message has been sent';
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}

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
			
			if($res > 0 && $email_status) 
			{
				$_SESSION['isReg_valid'] = true;
				$_SESSION['File_error_msg'] = "";
				header('location: ../Views/LForm.php');
                // Display the details
                // echo "<p><strong>EmployeeName:</strong> " . $Name . "</p>";
                // echo "<p><strong>Designation</strong> " . $designation . "</p>";
                // echo "<p><strong>Type of Leave:</strong> " . $LeaveName . "</p>";
                // echo "<p><strong>Date(From):</strong> " . $DateFrom . "</p>";
                // echo "<p><strong>Date(To):</strong> " . $DateTo . "</p>";
                // echo "<p><strong>Reason:</strong> " . $Reason . "</p>";
                // echo "<p><strong>Persion(List of Officials) Select:</strong> " . $MailedPerson . "</p>";
            } else {
                
	            $_SESSION['isReg_valid'] = false;
				$_SESSION['File_error_msg'] = "Sorry could not register user.";
				 header('location: ../Views/LForm.php');
            }
		}
	}
?>