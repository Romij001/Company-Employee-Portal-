<?php
session_start();
$role=$_SESSION['EmployeeType'];
if($_SESSION['UserID'] > 0)
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Applications Dashboard</title>

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
                <button id="applications" class="menu-btn"><i class="fa fa-caret-down"></i>Applications</button>
                <div id='applications-content' class="LADashboard-dropdown-content">
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
        <div class="dashboard-Right-Sction">            
            <div style="width:100%; height: 40px; border-bottom: 2px solid var(--primary);">
                <h2 style="float: left;">Leave Applications</h2>
                
                
            </div>

            <div class="table-container">
                <table class="employee-table">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <th>Leave Type</th>
                            <th>Date From</th>
                            <th>Date To</th>
                            <th>Reason</th>
                            <?php 
                                if ($role == 'Admin' ) {
                            ?>
                            <th>Actions</th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $conn = mysqli_connect("localhost", "root", "", "Data_Employee_Portal");
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, "SELECT * FROM leave_application");
                        mysqli_stmt_execute($stmt);
                        $res = mysqli_stmt_get_result($stmt);
                        if (mysqli_num_rows($res) > 0) {               

                          // output data of each row
                          while($row = mysqli_fetch_assoc($res)) {
                            // echo "id: " . $row["EmployeeID"]. " - Name: " . $row["FullName"]. " " . $row["Designation"]. "<br>";
                            $leave_id = (!empty($row["ID"]))? $row["ID"] : "";
                            $employee_name = (!empty($row["EmployeeName"]))? $row["EmployeeName"] : "";
                            $emp_designation = (!empty($row["Designation"]))? $row["Designation"] : "";
                            $leave_type = (!empty($row["TypeOfLeave"]))? $row["TypeOfLeave"] : "";
                            $leave_name = (!empty($row["LeaveName"]))? $row["LeaveName"] : "";
                            $date_from = (!empty($row["Datefrom"]))? $row["Datefrom"] : "";
                            $date_to = (!empty($row["DateTo"]))? $row["DateTo"] : "";
                            $reason = (!empty($row["Reason"]))? $row["Reason"] : "";
                            $approval_status = $row["ApprovalStatus"];
                    ?>
                            <tr>
                                <td><?php echo $employee_name ?></td>
                                <td><?php echo $emp_designation ?></td>
                                <td><?php echo $leave_name ?></td>
                                <td><?php echo $date_from ?></td>
                                <td><?php echo $date_to ?></td>
                                <td><?php echo $reason ?></td>
                                <?php
                                if ($role == 'Admin') {
                                ?>
                                <td>
                                    
                                    <!-- <form  method="post" action="../Views/EmployeeEdit.php" style="float:left;">
                                      <input type="hidden" name="userId" value="<?php echo $user_id; ?>">
                                      <button type="submit" class="btn-update"><i class="fas fa-edit"></i></button>                              
                                    </form>  -->
                                    <!-- <a href="../Views/EmployeeEdit.php" class="btn-update"><i class="fas fa-edit"></i></a> -->
                                <?php
                                if ($approval_status == '0') { 
                                ?>
                                    <form  method="post" action="../Controller/LeaveApproveCheck.php" style="float:left;">
                                      <input type="hidden" name="Id" value="<?php echo $leave_id; ?>">
                                      <button class="btn-Approve">Approve</button>                               
                                    </form>
                                    <form  method="post" action="../Controller/LeaveRefuseCheck.php" style="float:left;">
                                      <input type="hidden" name="Id" value="<?php echo $leave_id; ?>">
                                      <button class="btn-Refuse">Refuse</button>                               
                                    </form>  
                                <?php
                                 }
                                 else if ($approval_status == '1') {
                                    echo "Approved";
                                 }
                                 else if ($approval_status == '2') {
                                    echo "Refused";
                                 }
                                ?>  
                              


                                    
                                    <!-- <form  method="post" action="../Views/EmployeeEdit.php" style="float:left;">
                                      <input type="hidden" name="userId" value="<?php echo $user_id; ?>">
                                      <button type="submit" class="btn-update"><i class="fas fa-edit"></i></button>                              
                                    </form>  -->
                                    <!-- <a href="../Views/EmployeeEdit.php" class="btn-update"><i class="fas fa-edit"></i></a> -->
                       

                             <?php
                                }
                                ?>
                            </tr>
                    <?php
                          }
                        } 
                    ?>
                    </tbody>
                </table>
                <?php 
                // echo $_SESSION['error_msg'] 
                ?>
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

        // overlay.addEventListener('click', () => {
        //     leftSidebar.classList.remove('show');
        //     overlay.classList.remove('show');
        // });

        document.querySelectorAll('.menu-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                if (window.innerWidth <= 576) {
                    leftSidebar.classList.remove('show');
                    overlay.classList.remove('show');
                }
            });
            btn.addEventListener('mouseover', () => { 
                if (window.innerWidth <= 576) {                   
                var btn_id = btn.id;
                const menu_content = document.getElementById(btn_id +'-content');
                menu_content.style.display = ('block');
                }
            });

            // btn.addEventListener('mouseleave', () => {                    
            //     var btn_id = btn.id;
            //     const menu_content = document.getElementById(btn_id +'-content');
            //     menu_content.style.display = ('none');
            // });
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