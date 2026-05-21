<?php
session_start();
if($_SESSION['userId'] > 0)
{
?>


<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../CSS/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
      integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- <br>
    <div class="col-md-6 text-center py-2 my-auto mx-auto Dashboard-form">
        <h1>DATA EMPLOYEE PORTAL</h1>
    </div> -->
    <!-- <div class="Dashboard-body">
      <div class="Logo">
    <img src="../CSS/Data Logo.jpg"  width="100" height="30">
    </div>
    <div class="Dash-name">
    <img src="../CSS/Name.jpg"  width="200" height="60">
    </div> -->
    <?php include   ("../Views/header.php") ?>

    <!-- <div class="Apps-style">
     <br>
     <div class=" Apps-head">
    <h2>Applications</h2>
    </div>

    <div class="Buttons-body-style">
          <a  href="../Views/LApps.php" class="LAButtons-style">LEAVE APPLICATION</a>
          <a  href="#" class="AEButtons-style">ATTENDENCE ENTRY</a>
          <a  href="#" class="DEButtons-style">DATA EXCHANGE</a>
    </div>


    </div>
    <div class="App_form">
    <br>
    <h2>Dashboard</h2>
   
    <a href=" ../Views/EDashboard.php" class="Leave-button-class">EMPLOYEE PROFILE</a>
    <a href=" ../Views/Apps.php" class="Leave-button-class">Applications</a>
    <a  href=" ../Views/Login.php" class="Log-out">Logout</a>
 
 
    </div>
    
    <div class="Bottom_text">
    <p2>Data Analysis and Technical Assistance (DATA)</p2>
    <br>
    <p2>Address:8/4, Block A, (Unit 2), Lalmatia, Dhaka – 1207, Bangladesh</p2>
    </div>
    </div> -->



    
</body>
</html>
<?php
}
else{
    header ("Location: ../Views/Login.php");
}
?>
