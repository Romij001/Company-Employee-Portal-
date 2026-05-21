<?php

?>



<!DOCTYPE html>
<html>
<head>
  <title>Forget Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="JS Files/ForgotPass.js"></script>
  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
      integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="FP-main">

  
  <div class=" text-center FP_body">
    <br>
    <img src="../CSS/Data Logo.jpg" width="100" height="50">
<br>
<div class="FP-head">
<h2>Forgot Password</h2>
</div>
<br>
<form action=" ../Controller/FPassCheck.php" method="POST" novalidate onsubmit="return isPass_valid(this);">
  <div class="text_field">
  <!-- <label for="email">Email:</label><br> -->
  <input type="email" id="email" name="email" placeholder="Email">
  <?php  
	$_SESSION['ispass_valid']= false;
      if(isset($_SESSION['email_error_msg'])){
      echo $_SESSION['email_error_msg - Forgotpass.php:38'] ;
            
      if ($_SESSION['ispass_valid']) $_SESSION['email_error_msg'] = "";

    } 
  ?>
  <br>
  <span id="email_error_msg" style="color:red"></span>
  <br>
  <!-- <label for="pwd">New Password:</label><br> -->
  <input type="Password" id="pwd" name="pwd3" placeholder="New Password">
  <?php  
     if(isset($_SESSION['Password3_error_msg'])){
     echo $_SESSION['Password3_error_msg - Forgotpass.php:51'] ;
            
     if ($_SESSION['ispass_valid']) $_SESSION['Password3_error_msg'] = "";

    } 
  ?>
  <br>
  <span id="Password3_error_msg" style="color:red"></span>  
  <br>  
  <!-- <label for="pwd">Confirm Password:</label><br> -->
  <input type="Password" id="pwd" name="pwd4" placeholder="Confirm Password">
  <?php  
     if(isset($_SESSION['Password4_error_msg'])){
     echo $_SESSION['Password4_error_msg - Forgotpass.php:64'] ;
            
     if ($_SESSION['ispass_valid']) $_SESSION['Password4_error_msg'] = "";

    } 
  ?>
  <br>
  <span id="Password4_error_msg" style="color:red"></span>
  <br>   
  <input type="submit" value="Submit">
  <a href="Login.php"><input type="button" value="Back"></a>
  </div>
</form>
</div>
</div>
</body>
</html>
