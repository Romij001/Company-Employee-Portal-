<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if($_SESSION['UserID'] > 0)
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Information</title>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

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
                <div class="LIMassage-dropdown-content">
                    <a href="../Views/LApps.php">Leave Application</a>
                </div>
                </div>
                                                                    
                <button class="menu-btn"><i class="fas fa-clock"></i> Attendance</button>
            </div>
            <div class="logout-button">
                <a href="../Views/Login.php" class="menu-btn logout-btn"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
        </div>

        <!-- RIGHT SECTION -->
        <div class="LApps-Right-Sction">
          <h2>Leave Information</h2>
          <label for="name">Name:</label><br>
          <input type="text" id="name" name="name" readonly value="<?php echo $_SESSION['Name'] ?>" placeholder="Write a Full Name" required><br><br>
          <label for="name">Designation:</label><br>
          <input type="text" id="name" name="name" readonly value="<?php echo $_SESSION['Designation'] ?>" placeholder="Enter a Designation" required>
            <br><br>
            <div class="LM-Style">
            <label for="date">Leave Message:</label><br>
            <textarea type="text" id="Reason" name="Reason" rows="4" cols="90" required></textarea>
            </div>
            <br><br><br>
            <label for="PersonSelect">Persion(List of Officials) Select:</label><br><br>
            <input type="hidden" id="PersonName" name="PersonName">
            <?php 
                        $conn = mysqli_connect("localhost", "root", "", "Data_Employee_Portal");
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, "SELECT * FROM employee_registration WHERE Status = 1");
                        mysqli_stmt_execute($stmt);
                        $res = mysqli_stmt_get_result($stmt);
                        if (mysqli_num_rows($res) > 0) {               

                          // output data of each row
                            while($row = mysqli_fetch_assoc($res)) {
                            $user_id = (!empty($row["UserID"]))? $row["UserID"] : "";
                            $employee_id = (!empty($row["EmployeeID"]))? $row["EmployeeID"] : "";
                            $full_name = (!empty($row["FullName"]))? $row["FullName"] : "";
                            $emp_designation = (!empty($row["Designation"]))? $row["Designation"] : "";
                            $emp_gender = (!empty($row["Gender"]))? $row["Gender"] : "";
                            $emp_type = (!empty($row["EmployeeType"]))? $row["EmployeeType"] : "";
                            $emp_email = (!empty($row["Email"]))? $row["Email"] : "";
                    ?>
                    <input type="checkbox" id="PersonSelect-<?php echo $user_id ?>" name="PersonSelect" class="person" value="<?php echo $user_id ?>" required>
                    <label id="name-<?php echo $user_id ?>" for="PersonSelect"><?php echo $full_name ?></label><br>
                    <input type="hidden" id="email-<?php echo $user_id ?>" value="<?php echo $emp_email ?>">
                    <?php
                            }
                        }
                    ?>
            <!-- <label for="PersomSelect"> Md. Zahidul Hassan</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Zobair</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Imrul Hassan</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Zarif Ajhan Dhruba</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Abul Khair Mahabbubur Rashid</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Afazuddin</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Biswas Akhteruzzaman</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Maksura Khatun</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Belal</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Afia Binte Latif Shanta</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Mahabubul Alam</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Ruma Akter</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Kazi Najirul Islam</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Abdur Rahman</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Mohammad Mamunur Rashid</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Khabir Hossain</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Shahidul Islam</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Arif hossain</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Romij Uddin Ahmed Chowdhury</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Habibur Rahman</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Mamunur Rashid Nirob</label><br>
            <input type="checkbox" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md Nuruzzaman</label><br> -->
             <br>
             <div class="L-Form-btn">
                <input type="button" id="submit_btn" class="LF-btn" value="Submit" />
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
        var submit_btn = document.getElementById('submit_btn');
        submit_btn.addEventListener('click',() =>{
            var person_list =[];
            var message_element = document.getElementById('Reason');
            var msg = message_element.value;
            var person_elements = document.querySelectorAll('.person');
            if(person_elements != null && person_elements.length > 0){
                for(var i=0; i < person_elements.length; i++){
                    var element = person_elements[i];
                    if(element.checked){
                        var element_id = element.id;
                        var emp_id = element_id.split('-')[1];
                        var name_element = document.getElementById('name-' + emp_id);
                        var emp_name = name_element.textContent;
                        var email_element = document.getElementById('email-' + emp_id);
                        var emp_email = email_element.value;
                        var emp ={
                            id : emp_id,
                            name: emp_name,
                            email : emp_email
                        }
                        person_list.push(emp);
                    }
                }
                $.ajax({
                    url: 'LIFucntion.php',
                    type: 'POST',
                    data: {person_list:person_list, massage: msg},
                    success: function(data) {
                        console.log(data); // Inspect this in your console
                    }
                });
            }
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
