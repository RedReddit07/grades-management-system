<?php
if (!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['adminID'])){

    $admin_id = $_SESSION['adminID'];
    
}else{
    echo "<script>alert('Please relogin Again')</script>";
    echo header("Location: ../../login/login.php");
}

/* MySQL Connection */
include_once("../../connection/connection.php");
$con = connection();

function classCount(){
    
    $con = connection();

    $sql ="SELECT COUNT(DISTINCT `id`) FROM `section_tbl`";

    $res = $con->query($sql);
    $row = $res->fetch_row()[0];

    if ($row > 0 && $row < 10){
        print("0". $row);
    }else{
        print($row);
    }

}

function subjectCount(){
    
    $con = connection();

    $sql ="SELECT COUNT(`id`) FROM `subject_list_tbl`";

    $res = $con->query($sql);
    $row = $res->fetch_row()[0];

    if ($row > 0 && $row < 10){
        print("0". $row);
    }else{
        print($row);
    }

}

function teacherCount(){
    
    $con = connection();

    $sql ="SELECT COUNT(DISTINCT `id`) FROM `teacher` WHERE `gradetohandle` IS NOT NULL";

    $res = $con->query($sql);
    $row = $res->fetch_row()[0];

    if ($row > 0 && $row < 10){
        print("0". $row);
    }else{
        print($row);
    }

}


?>

<!-- D A S H B O A R D  A D M I N -->

<!--=====================================================-->
<!doctype html>
<html lang="en">
<head>
    <!-- Website Logo -->
    <link rel="shortcut icon" type="x-icon" href="../../img/logo/speslogo.png">
    <!-- end of Website Logo -->
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--=====================================================-->

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<!--=====================================================-->

<!-- Google Material Icon Link -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

<!--=====================================================-->

<!-- My Navbar -->
<link rel="stylesheet" href="../../css/res-sidenav/respons-side.css">

<!-- Admin CSS-->
<link rel="stylesheet" href="../../css/admin/admin.css">

<!-- Table CSS -->
<link rel="stylesheet" href="../../css/table/table.css">

<!--=====================================================-->

<title>Grades Management System</title>
</head>
<body>
<!--=====================================================-->
<!-- Main Container -->
<div class="main-container">
<aside>
    <!-- Top Navbar -->
        <div class="top"> 
            <!-- Logo -->
            <div class="logo">
                <img src="../../img/logo/speslogo.png" alt="">
                <h2>GMS <span class="variant">SPES</span></h2>
            </div> <!-- end of Logo -->

            <!-- Close Button -->
            <div class="close" id="close-btn">
            <span class="material-icons-sharp">close</span>
            </div> <!-- end of Close Button --> 

        </div> <!-- end of Top Navbar -->

            <!-- Side Navbar -->
            <div class="sidebar">

                <!-- Dashboard -->
                <a href="dashboard.php" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a> <!-- end of Dashboard -->

                <!-- My Subjects -->
                <a href="subjects.php">
                <span class="material-icons-sharp">auto_stories</span>
                    <h3>Subjects</h3>
                </a> <!-- end of My Subjects -->

                <!-- Assigned Subjects -->
                <a href="assignedsubjects.php">
                <span class="material-icons-sharp">local_library</span>
                    <h3>Assigned Subjects</h3>
                </a> <!-- end of Assigned Subjects -->


                <!-- My Account -->
                <a href="mysettings.php">
                <span class="material-icons-sharp">manage_accounts</span>
                    <h3>My Account</h3>
                </a> <!-- end of My Account -->

                <form action="../functions/logout.php" method="POST">
                    <button type="submit" name="btn-logout">
                        <a><!-- Logout -->
                            <span class="material-icons-sharp">logout</span>
                            <h3>Logout</h3>
                        </a><!-- end of Logout -->
                    </button>
                </form>
                
            </div>

    </aside>   <!-- end of ASIDE-->
    <main>
        <h1>Dashboard</h1>

        <!-- Insights Card -->
        <div class="insights">
            <!-- Pupil Handled Card -->
            <div class="pupil">
                <span class="material-icons-sharp">school</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Teachers</h3>
                        <h1><?php echo teacherCount(); ?></h1>
                    </div>
                </div>
                
            </div> <!-- end of Pupil Handled Card -->
            
            <!-- Subject Handled Card -->
            <div class="subject">
            <span class="material-icons-sharp">menu_book</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Subjects</h3>
                        <h1><?php echo subjectCount(); ?></h1>
                    </div>
                </div>
                <a href="subjects.php">
                    <small class="text-muted">Check</small>
                </a>
                
            </div> <!-- end of Subject Handled Card -->

            <!-- Class Handled Card -->
            <div class="class">
            <span class="material-icons-sharp">class</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Classes</h3>
                        <h1><?php echo classCount(); ?></h1>
                    </div>
                </div>
                <a href="myclasses.php">
                    <small class="text-muted">Check</small>
                </a>
                
            </div> <!-- end of Class Handled Card -->
        </div> <!-- end of Insights Card-->

    </main> <!-- end of Main -->

    <!-- Right -->
    <div class="right">
        <div class="top">
            <button id="menu-btn">
                <span class="material-icons-sharp">menu</span>
            </button>
            <!-- Light and Dark Icon -->
            <!-- <div class="theme-toggler">
                <span class="material-icons-sharp active">light_mode</span>
                <span class="material-icons-sharp">dark_mode</span>
            </div> -->
            <div class="profile">
                <div class="info">
                    <p>Hey, <b>Admin</b></p>
                    <small class="text-muted">Admin</small>
                </div>
                <div class="profile-photo">
                    <img src="../../img/admin/admin.png" alt="">
                </div>
            </div>
        </div> <!-- end of Top -->

    </div> <!-- end of Right -->
    
</div> <!-- end of Main Container -->
<!--=====================================================-->
<!-- Bootstrap Javascript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!--=====================================================-->
<!-- Sidebar Javascript-->
<script src="../../js/res-sidenav/respons-side.js"></script>
<!--=====================================================-->
</body>
</html>