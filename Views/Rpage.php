<?php
session_start();
if($_SESSION['UserID'] > 0)
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
      integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../CSS/dashboard.css">

    <style>

    </style>
</head>
<body>

    <!-- Mobile Overlay -->
    <div class="mobile-overlay" id="overlay"></div>

    <!-- Header -->
    <header class="dashboard-header">
        <div class="logo">
            <!-- <i class="fas fa-briefcase"></i>  -->
           <img src="../CSS/Data Logo.jpg" width="100" height="50">
            Employees Portal
        </div>
        <button class="toggle-btn" id="toggleMenu">
            <i class="fas fa-bars"></i>
        </button>
        <?php include("../Views/header.php") ?>
    </header>

    <!-- Main Container -->
  <div class="dashboard-container-body" style="margin-top: 100px;">


        <!-- LEFT SECTION -->
        <div class="dashboard-Left-Sction" id="leftSidebar">
            <div class="menu-buttons">
                <div class="menu-button-head"><h3>DASHBOARD</h3></div>
                <a href="../Views/EDashboard.php" class="menu-btn"><i class="fas fa-users"></i> Employees</a>
                <div class="dropdown">
                <button class="menu-btn"><i class="fa fa-caret-down"></i>Applications</button>
                <div class="dropdown-content">
                    <a href="../Views/LApps.php">Leave Application</a>
                </div>
                </div>
                                                                    
                <button class="menu-btn"><i class="fas fa-clock"></i> Attendance</button>
            </div>
            <div class="logout-button">
                <a href="../Views/Login.php" class="menu-btn logout-btn"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
        </div>
        <div class="dashboard-Right-Sction">       
          <div class="registration_form">
            <div style="width:100%; height: 40px; border-bottom: 2px solid var(--primary);">
              <h2 style="float: left;">Employee Registration</h2>                
            </div>
            <form action=" ../Controller/RCheck.php" method="POST" novalidate onsubmit="return isReg_valid(this)";>
              <br>
              <div class="text_field">
              <!-- <label for="fname">First name:</label><br> -->              
                           
                          
              <br>
              <label for="empId">Employee ID:</label><br>
              <input type="text" id="empId" name="empId" placeholder="Enter Employee ID" required>
              <?php
               $_SESSION['isReg_valid'] = false;
                  if(isset($_SESSION['empId_error_msg'])){
                  echo $_SESSION['empId_error_msg'] ;   
                  if ($_SESSION['isReg_valid']) $_SESSION['empId_error_msg'] = "";

                  } 
              ?> 
              <span id="empId_error_msg" style="color:red"></span>
              <br><br>
              <label for="fname">Full Name:</label><br>
              <input type="text" id="fname" name="fname" placeholder="Enter employees Full Name" required>
              <br>
              <?php
               $_SESSION['isReg_valid'] = false;
                  if(isset($_SESSION['fname_error_msg'])){
                  echo $_SESSION['fname_error_msg'] ;   
                  if ($_SESSION['isReg_valid']) $_SESSION['fname_error_msg'] = "";

                  } 
              ?> 
              <span id="fname_error_msg" style="color:red"></span>
              <br>
              <label for="designation">Designation:</label><br>
              <input type="text" id="designation" name="designation" placeholder="Enter a Designation" required>
              <?php  
                  if(isset($_SESSION['designation_error_msg'])){
                    echo $_SESSION['designation_error_msg'] ;
                  if($_SESSION['isReg_valid']) $_SESSION['designation_error_msg'] = "";
                } 
              ?>
              <span id="designation_error_msg" style="color:red"></span>
              <br><br>
              <label for="EmployeeType">Employee Type:</label><br>
              <select id="employeeType" name="employeeType" required>
                <option value="Admin">Admin</option>
                <option value="Head">Head</option>
                <option value="Employee">Employee</option>
              </select>
              <?php  
                  if(isset($_SESSION['employeeType_error_msg'])){
                    echo $_SESSION['employeeType_error_msg'] ;
                  if($_SESSION['isReg_valid']) $_SESSION['employeeType_error_msg'] = "";
                } 
              ?>
              <span id="employeeType_error_msg" style="color:red"></span>
              <br><br>
              <label for="gender">Gender:</label><br>
              <input type="radio" id="male" name="gender"  value="male" required>
              <label for="male">Male</label><br>
              <input type="radio" id="female" name="gender" value="female" required>
              <label for="female">Female</label>
               <?php  
                  if(isset($_SESSION['gender_error_msg'])){
                    echo $_SESSION['gender_error_msg'] ;
            		  if($_SESSION['isReg_valid']) $_SESSION['gender_error_msg'] = "";
            		} 
            	?>
              <span id="gender_error_msg" style="color:red"></span>
              <br><br><br>
              <label for="email">Email:</label><br>
              <input type="email" id="email" name="email" placeholder="Enter your Email" required>
              <?php 
              	if(isset($_SESSION['email_error_msg'])){
              	echo $_SESSION['email_error_msg'] ;
              	if($_SESSION['isReg_valid']) $_SESSION['email_error_msg'] = "";
              	}
              ?>
              <span id="email_msg" style="color:red"></span>
              <br><br>
              <label for="pwd">Password:</label><br>
              <input type="password" id="pwd" name="pwd" placeholder="Enter Password" required>
             <?php 
              	if(isset($_SESSION['Password_error_msg'])){
              	echo $_SESSION['Password_error_msg'] ;   
              	//if($_SESSION['isReg_valid']) $_SESSION['Password_error_msg'] = "";
              	}
              ?>
              <span id="password_msg" style="color:red"></span>  
              <br><br>
              <label for="pwd1">Confirm Password:</label><br>
              <input type="password" id="pwd1" name="pwd1" placeholder="Confirm Password" required>
             <?php
              	if(isset($_SESSION['CPassword_error_msg'])){
              	echo $_SESSION['CPassword_error_msg'] ;   
              	//if($_SESSION['isReg_valid']) $_SESSION['CPassword_error_msg'] = "";
              	}
              ?>
              <span id="Cpassword_msg" style="color:red"></span>  
              <br><br>
              
              <input type="submit" style="padding: 4px;" value="Submit">
              <a href="../Views/EDashboard.php"><input type="button" style="padding: 4px;" value="Back"></a>
              </div>
            </form>
                    <!-- if(isset($_SESSION['File_error_msg'])){ -->
                    <!-- echo $_SESSION['File_error_msg'] ; -->
                        
                    <!-- if ($_SESSION['isReg_valid']) $_SESSION['File_error_msg'] = ""; -->

               <!-- }   -->
              </div>
          </div>
        </div>

    <!-- JavaScript -->
    <script>
        const toggleBtn = document.getElementById('toggleMenu');
        const leftSidebar = document.getElementById('leftSidebar');
        const overlay = document.getElementById('overlay');

        toggleBtn.addEventListener('click', () => {
            leftSidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        });

        overlay.addEventListener('click', () => {
            leftSidebar.classList.remove('show');
            overlay.classList.remove('show');
        });

        document.querySelectorAll('.menu-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                if (window.innerWidth <= 576) {
                    leftSidebar.classList.remove('show');
                    overlay.classList.remove('show');
                }
            });
        });
    </script>

</body>
</html>
<?php
}
else{
    header("Location: ../Views/Login.php");
    exit();
}
?>