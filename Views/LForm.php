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
    <title>Leave Form</title>

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
                <div class="LForm-dropdown-content">
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
        <form id="LeaveForm" action=" ../Controller/LFormCheck.php" method="POST" novalidate onsubmit="return isReg_valid(this);">  
          <h2>Leave Form</h2>
          <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['UserID'] ?>">
          <label for="name">Employee Name:</label><br>
          <input type="text" id="name" name="name" readonly value="<?php echo $_SESSION['Name'] ?>" placeholder="Write a Full Name" required><br><br>
          <label for="Designation">Designation:</label><br>
          <input type="text" id="Designation" name="Designation" readonly value="<?php echo $_SESSION['Designation'] ?>" placeholder="Enter a Designation" required>
            <br><br>
            <label for="typeofleave">Type of Leave:</label><br><br>
            <input type="hidden" id="leaveName" name="leaveName">
             <?php 
                        $conn = mysqli_connect("localhost", "root", "", "Data_Employee_Portal");
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, "SELECT * FROM leave_type WHERE Status = 1");
                        mysqli_stmt_execute($stmt);
                        $res = mysqli_stmt_get_result($stmt);
                        if (mysqli_num_rows($res) > 0) {               

                          // output data of each row
                            while($row = mysqli_fetch_assoc($res)) {
                                $leave_id = (!empty($row["Id"]))? $row["Id"] : "";
                                $leave_name = (!empty($row["LeaveName"]))? $row["LeaveName"] : "";
                    ?>
                    <input type="radio" id="typeofleave-<?php echo $leave_id ?>" name="typeofleave" value="<?php echo $leave_id ?>" required>
                    <label id="typename-<?php echo $leave_id ?>" for="typeofleave"><?php echo $leave_name ?></label><br>
                    <?php
                            }
                        }
                    ?>
            
            
            <!-- <input type="radio" id="typeofleave" name="typeofleave"  required>
            <label for="typeofleave">Special</label><br>
            <input type="radio" id="typeofleave" name="typeofleave"   required>
            <label for="typeofleave">Medical</label><br>
            <input type="radio" id="typeofleave" name="typeofleave"  required>
            <label for="typeofleave">Compensatory</label><br>
            <input type="radio" id="typeofleave" name="typeofleave"  required>
            <label for="typeofleave">L.W.O.P</label> -->
            <br><br><br>
            <label for="date">Date:</label><br><br>
            <label for="DateFrom">From:</label><br>
            <input type="date" id="DateFrom" name="DateFrom"  required><br>
            <label for="DateFrom">To:</label><br>
            <input type="date" id="DateTo" name="DateTo"  required><br><br><br>
            <div class="LFReason-Style">
            <label for="text">Reason:</label><br>
            <textarea type="text" id="Reason" name="Reason" rows="4" cols="90" required></textarea>
            </div> 
            <br><br>
        
            <label  for="summary">Summary:</label>

            
            <div id="outputBox">
                
            </div>
            <br>
            <div class="P-Button">
            <a style="float: left;" ><input style="padding: 4px;" type="button" id="Preview" value="Preview"></a>
            </div>
            <!-- <input type="radio" id="PersomSelect" name="PersomSelect"  required>
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
             <br><br>
             <div class="L-Form-btn">
            <!-- <a href="#" class="LF-btn">Submit</a> -->
            <input class="LF-btn" type="submit" value="Submit">
             </div>
             </form> 
             <!-- <br><br> -->
            
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


            // Wait for the DOM to be fully loaded
            document.addEventListener('DOMContentLoaded', (event) => {
                // Select the form and the output div by their IDs
                const myForm = document.getElementById('LeaveForm');
                const outputBox = document.getElementById('outputBox');
                const previewBtn = document.getElementById('Preview');

            // Add an event listener for the 'submit' event on the form
            previewBtn.addEventListener('click', function (event) {
                // 1. Prevent the default form submission behavior (stops page reload)
                event.preventDefault();

                // 2. Collect the input data
                const nameInput = document.getElementById('name');
                const designationInput = document.getElementById('Designation');
                const checkedleave = document.querySelector('input[name="typeofleave"]:checked');
                const dateformInput = document.getElementById('DateFrom');
                const datetoInput = document.getElementById('DateTo');
                const reasonInput = document.getElementById('Reason');
                var leaveValue = 0;
                var leaveName = "";
                if (checkedleave) {
                    leaveValue = checkedleave.value;                    
                    leaveName = document.getElementById('typename-' + leaveValue).innerText
                    document.getElementById('leaveName').value = leaveName;
                }
                const nameValue = nameInput.value;
                const designationValue = designationInput.value;
                // const leaveValue = leaveInput.value;
                const dateformValue = dateformInput.value;
                const datetoValue = datetoInput.value;
                const reasonValue = reasonInput.value;
                // const pselectValue = pselectInput.value;
                // const pselectName = pselectInput.options[pselectInput.selectedIndex].text;
                // document.getElementById('pSelectName').value = pselectName;

                // 3. Format the data to be displayed
                const displayData = `Name: ${nameValue}
                    Designation: ${designationValue}
                    Type Of Leave: ${leaveName}
                    Date(From): ${dateformValue}
                    Date(To): ${datetoValue}
                    Reason: ${reasonValue}
                `;

                // 4. Inject the formatted data into the output box div
                // innerText is safer as it treats content as text, preventing potential XSS issues
                outputBox.innerText = displayData;

                // Optional: Clear the form fields after submission
                // myForm.submit();
                // myForm.reset();
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