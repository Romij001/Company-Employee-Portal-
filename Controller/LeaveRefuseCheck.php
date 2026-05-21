<?php  

session_start();
require("../Model/LeaveRefuseDB.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	
    $id = $_POST['Id'];

        
    $update = RefuseLeave($id);

    $conn = mysqli_connect("localhost", "root", "", "Data_Employee_Portal");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, "SELECT * FROM leave_application WHERE ID = " . $id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($res) > 0) {               

        // output data of each row
        while($row = mysqli_fetch_assoc($res)) {
        // echo "id: " . $row["EmployeeID"]. " - Name: " . $row["FullName"]. " " . $row["Designation"]. "<br>";
        $leave_id = (!empty($row["ID"]))? $row["ID"] : "";
        $user_id = (!empty($row["UserID"]))? $row["UserID"] : "";
        $employee_name = (!empty($row["EmployeeName"]))? $row["EmployeeName"] : "";
        $emp_designation = (!empty($row["Designation"]))? $row["Designation"] : "";
        $leave_type = (!empty($row["TypeOfLeave"]))? $row["TypeOfLeave"] : "";
        $leave_name = (!empty($row["LeaveName"]))? $row["LeaveName"] : "";
        $date_from = (!empty($row["Datefrom"]))? $row["Datefrom"] : "";
        $date_to = (!empty($row["DateTo"]))? $row["DateTo"] : "";
        $reason = (!empty($row["Reason"]))? $row["Reason"] : "";
        $approval_status = $row["ApprovalStatus"];
                            
        // echo $employee_id;
        $stmt_emp = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt_emp, "SELECT * FROM employee_registration WHERE UserID = " . $user_id);
        mysqli_stmt_execute($stmt_emp);
        $res_emp = mysqli_stmt_get_result($stmt_emp);

        $emp_email = "";
        $emp_name = "";

        while($row_emp = mysqli_fetch_assoc($res_emp)){
            $emp_email = (!empty($row_emp["Email"]))? $row_emp["Email"] : "";
            $emp_name = (!empty($row_emp["FullName"]))? $row_emp["FullName"] : "";
        }

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
                $mail->addAddress($emp_email, $emp_name);     //Add a recipient
                
              

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Leave Application Status';
                $mail->Body    = '
                 <h4>Name: '. $employee_name .'</h4>                 
                 <h4>Designation: '. $emp_designation .'</h4>
                 <h4>Type Of Leave: '. $leave_name .'</h4> 
                 <h4>Date(From): '. $date_from .'</h4> 
                 <h4>Date(To): '. $date_to .'</h4> 
                 <h4>Reason: '. $reason .'</h4>
                 <h4>Status: Refused</h4>  
                ';
            

                $email_status = $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            }
        }
    
    if($update > 0 && $email_status) 
    {
        $_SESSION['isEdit_Success'] = true;
        $_SESSION['error_msg'] = "";
        header('Location: ../Views/LApplicationDashboard.php');
    }
    else{
        $_SESSION['isEdit_Success'] = false;
        $_SESSION['error_msg'] = "Sorry could not refuse leave.";
        header('Location: ../Views/LApplicationDashboard.php');
    }
}