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
    <title>Leave Approved Form</title>

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

        <!-- RIGHT SECTION -->
        <div class="LApps-Right-Sction">
          <h2>Leave Approved Form</h2>
          <label for="name">Employee Name:</label><br>
          <input type="text" id="name" name="name" placeholder="Write a Full Name" required><br><br>
          <label for="name">Designation:</label><br>
          <input type="text" id="name" name="name" placeholder="Enter a Designation" required>
            <br><br>
            <label for="date">Leave Approved Person Name:</label><br>
            <input type="text" id="Reason" name="Reason" placeholder="Enter a person name whose leave you want to approve" required>
            <br><br><br>
            <label for="typeofleave">Type of Leave:</label><br><br>
            <input type="radio" id="Earned" name="Type of Leave"  required>
            <label for="typeofleave">Earned</label><br>
            <input type="radio" id="Special" name="Type of Leave"  required>
            <label for="typeofleave">Special</label><br>
            <input type="radio" id="Medical" name="Type of Leave"   required>
            <label for="typeofleave">Medical</label><br>
            <input type="radio" id="Compensatory" name="Type of Leave"  required>
            <label for="typeofleave">Compensatory</label><br>
            <input type="radio" id="L.W.O.P" name="Type of Leave"  required>
            <label for="typeofleave">L.W.O.P</label>
            <br><br><br>
            <label for="date">Date:</label><br><br>
            <label for="date">From:</label><br>
            <input type="date" id="Date" name="Date"  required><br>
            <label for="date">To:</label><br>
            <input type="date" id="Date" name="Date"  required>
            <br><br><br>
             <label for="PersomSelect">Persion(List of Officials) Select:</label><br><br>
            <select id="PersomSelect" name="PersomSelect"  required>
                <option value="0">Select Employee</option>
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
                                $full_name = (!empty($row["FullName"]))? $row["FullName"] : "";
                                $emp_email = (!empty($row["Email"]))? $row["Email"] : "";
                    ?>
                    <option value="<?php echo $user_id ?>"><?php echo $full_name ?></option>
                    <?php
                            }
                        }
                    ?>
            </select>
            <!-- <label for="PersomSelect">Persion(List of Officials) Select:</label><br><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect"> Md. Zahidul Hassan</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Zobair</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Imrul Hassan</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Zarif Ajhan Dhruba</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Abul Khair Mahabbubur Rashid</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Afazuddin</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Biswas Akhteruzzaman</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Maksura Khatun</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Belal</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Afia Binte Latif Shanta</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Mahabubul Alam</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Ruma Akter</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Kazi Najirul Islam</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Abdur Rahman</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Mohammad Mamunur Rashid</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Khabir Hossain</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Shahidul Islam</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Arif hossain</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Romij Uddin Ahmed Chowdhury</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md. Habibur Rahman</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Mamunur Rashid Nirob</label><br>
            <input type="radio" id="PersomSelect" name="PersomSelect"  required>
            <label for="PersomSelect">Md Nuruzzaman</label><br> -->
             <br>
             <div class="L-Form-btn">
            <a href="#" class="LF-btn">Leave Approved</a>
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