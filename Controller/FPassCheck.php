<?php

session_start();

  require("../Model/FPasswordDB.php");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $email = $_POST['email'];
  $pwd3 =  $_POST['pwd3'];
  $pwd4 =  $_POST['pwd4'];

  $servername = "localhost";
  $username = "root";
  $password = "";


  $isvalid = true;


  if(empty($email)) {
  $_SESSION['email_error_msg'] = "Email is empty";
  $_SESSION['ispass_valid'] = false ;
  $isvalid = false;
  header ("Location: ../Views/Forgotpass.php");
  }  

  else if(empty($pwd3)) {
  $_SESSION['Password3_error_msg'] = "New Password is empty";
  $_SESSION['ispass_valid'] = false ;
  $isvalid = false;
  header ("Location: ../Views/Forgotpass.php");
  } 

  else if(empty($pwd4)) {
  $_SESSION['Password4_error_msg'] = "Confirm Password is empty";
  $_SESSION['ispass_valid'] = false ;
  $isvalid = false;
  header ("Location: ../Views/Forgotpass.php");
  }

  else {

    // require("../Controller/ReadFile.php");

    // if (count($users) > 0) {
    //   for ($i = 0; $i < count($users); $i++){
    //     echo $i;
    //     if ($users[$i]->Email === $email){
    //       $users[$i]->Password = ($pwd3 != "")? $pwd3 : $users[$i]->Password;
    //       break;
    //     }
    //   }
    // }       
    // $conn = mysqli_connect($servername, $username, $password, "voting_management", 3306);
    // if (!$conn) {
    // die("Connection failed: " . mysqli_connect_error());
    // }
    
    // $sql = "UPDATE `users` SET `Password`='$pwd3' WHERE `Email` = '$email'";
    // $update = mysqli_query($conn,$sql);
    // echo $sql;
    // // require("../Controller/WriteFile.php");
    $update = FPassword($pwd, $pwd4, $email);
 

    if($update > 0) 
    {
    $_SESSION['email_error_msg'] = "";
    $_SESSION['Password3_error_msg'] = "";
    $_SESSION['Password4_error_msg'] = "";
    $_SESSION['ispass_valid'] = true ;
    header ("Location: ../Views/Login.php");
    }
    else{
    $_SESSION['ispass_valid'] = false;
    header('location: ../Views/ForgotPass.php');
    }  
  }
}    
?>