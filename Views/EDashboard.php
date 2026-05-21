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
                <button id="applications" class="menu-btn"><i class="fa fa-caret-down"></i>Applications</button>
                <div id='applications-content' class="dropdown-content">
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
                <h2 style="float: left;">Employee Data</h2>
                <?php 
                if ($role == 'Admin' ) {
                ?>
                <a style="float: right;" href="../Views/Rpage.php" ><input style="padding: 4px;" type="button" value="Create Employee"></a>
                <?php
                }
                ?>
                
            </div>

            <div class="table-container">
                <table class="employee-table">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Gender</th>
                            <th>Employee Type</th>
                            <th>Email</th>
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
                        mysqli_stmt_prepare($stmt, "SELECT * FROM employee_registration WHERE Status = 1");
                        mysqli_stmt_execute($stmt);
                        $res = mysqli_stmt_get_result($stmt);
                        if (mysqli_num_rows($res) > 0) {               

                          // output data of each row
                          while($row = mysqli_fetch_assoc($res)) {
                            // echo "id: " . $row["EmployeeID"]. " - Name: " . $row["FullName"]. " " . $row["Designation"]. "<br>";
                            $user_id = (!empty($row["UserID"]))? $row["UserID"] : "";
                            $employee_id = (!empty($row["EmployeeID"]))? $row["EmployeeID"] : "";
                            $full_name = (!empty($row["FullName"]))? $row["FullName"] : "";
                            $emp_designation = (!empty($row["Designation"]))? $row["Designation"] : "";
                            $emp_gender = (!empty($row["Gender"]))? $row["Gender"] : "";
                            $emp_type = (!empty($row["EmployeeType"]))? $row["EmployeeType"] : "";
                            $emp_email = (!empty($row["Email"]))? $row["Email"] : "";
                    ?>
                            <tr>
                                <td><?php echo $employee_id ?></td>
                                <td><?php echo $full_name ?></td>
                                <td><?php echo $emp_designation ?></td>
                                <td><?php echo $emp_gender ?></td>
                                <td><?php echo $emp_type ?></td>
                                <td><?php echo $emp_email ?></td>
                                <?php
                                if ($role == 'Admin' ) {
                                ?>
                                <td width="120px">
                                    
                                    <form  method="post" action="../Views/EmployeeEdit.php" style="float:left;">
                                      <input type="hidden" name="userId" value="<?php echo $user_id; ?>">
                                      <button type="submit" class="btn-update"><i class="fas fa-edit"></i></button>
                                    </form>
                                    <!-- <a href="../Views/EmployeeEdit.php" class="btn-update"><i class="fas fa-edit"></i></a> -->
                                    <form  method="post" action="../Controller/DeleteCheck.php" style="float:left;">
                                      <input type="hidden" name="userId" value="<?php echo $user_id; ?>">
                                      <button class="btn-delete"><i class="fas fa-trash-alt"></i></button>                             
                                    </form> 
                                    
                                </td>
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