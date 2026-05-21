<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="JS Files/LoginPage.js"></script>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
      integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>

    </style>
  </head>

<body>


  <div class="login-main-con">

    <!-- <div class="col-md-6 text-center py-2 my-1 mx-auto Name-form">
      <h1>DATA EMPLOYEE PORTAL</h1>
    </div> -->
    

    <div class=" text-center  login-container">
      <br>
      
      
      <img src="../CSS/Data Logo.jpg" width="100" height="50">
      
      <br>
      <h3>Employee login</h3>
      <br>
      
      <div>
        
        <form class="login-form" action=" ../Controller/LoginValidation.php" method="POST" novalidate
          onsubmit="return isReg_valid(this)" ;>
          <div class="input-icon">
            <i class="fa-regular fa-envelope"></i>
            <input type="email" id="email" name="email" placeholder="Email" required>
          </div>
          <br>
          <div class="input-icon">
            <i class="fa-solid fa-lock"></i>
            <input type="password" id="password" name="password" placeholder="Password" required>
          </div>
          <div class="show-password">
            <input type="checkbox" id="showPassword" onclick="togglePassword()">
            <label for="showPassword">Show Password</label>
          </div>

          <input type="submit" value="Login" class="button-class">
          <div class="links">
            <a href="Forgotpass.php">Forgot Password?</a><br>
            <!-- <span>Don’t have an account? <a href="Rpage.php">Sign up</a></span> -->
          </div>
        </form>
      </div>




    </div>
  </div>








  <script>
    function togglePassword() {
      const password = document.getElementById("password");
      password.type = password.type === "password" ? "text" : "password";
    }
  </script>
</body>

</html>