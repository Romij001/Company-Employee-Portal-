<?php

  session_start();
  if($_SESSION['userId'] > 0)
{

?>  



<!DOCTYPE html>
<html>
<head>
	<title></title>
  <script src="JS Files/ChPass.js"></script>
  <link rel="stylesheet" href="../CSS/Style.css">
</head>
<body>
  <div class="FP_form">

<h1>Change Password</h1>

<form action=" ../Controller/ChPassCheck.php" method="POST" novalidate onsubmit="return isChPass_valid(this)">
  <div class="text_field">
  <label for="pwd">Current Password:</label><br>
  <input type="Password" id="pwd" name="pwd">
  <?php  
	$_SESSION['ispass_valid'] = false;
   if(isset($_SESSION['Password_error_msg'])){
   echo $_SESSION['Password_error_msg'] ;
            
   if ($_SESSION['ispass_valid']) $_SESSION['Password_error_msg'] = "";

  } 
  ?>
  <span id="password_msg" style="color:red"></span>    
  <br>
  <label for="pwd1">New Password:</label><br>
  <input type="Password" id="pwd1" name="pwd1">
  <?php  
     if(isset($_SESSION['Password1_error_msg'])){
     echo $_SESSION['Password1_error_msg'] ;
            
     if ($_SESSION['ispass_valid']) $_SESSION['Password1_error_msg'] = "";

    } 
  ?>
  <span id="New_password_msg" style="color:red"></span>    
  <br>
  <label for="pwd2">Re-type new Password:</label><br>
  <input type="Password" id="pwd2" name="pwd2">
  <?php  
     if(isset($_SESSION['Password2_error_msg'])){
     echo $_SESSION['Password2_error_msg'] ;
            
     if ($_SESSION['ispass_valid']) $_SESSION['Password2_error_msg'] = "";

    } 
  ?>
  <span id="Retype_password_msg" style="color:red"></span> 
  <br><br>
  <input type="submit" value="Submit">
  <a href="Admin.php"><input type="button" value="Back"></a>
  </div>
</form>
</div>

</body>
</html>

<?php
}
else{
    header ("Location: ../View/Login.php");
}
?>