<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['teacherID'])) {

    $teacher_id = $_SESSION['teacherID'];
} else {
    echo "<script>alert('Please relogin Again')</script>";
    echo header("Location: ../../login/login.php");
}

/* MySQL Connection */
include_once("../../connection/connection.php");
$con = connection();

$subject_list = null;

$sql = "SELECT DISTINCT(subject_id) FROM subject_assigned_section_tbl WHERE subject_teacher = '$teacher_id' AND `sy` = '{$_SESSION['selected_sy']}'";
$res = $con->query($sql) or die($con->error);

while ($row = $res->fetch_assoc()) {
    $subject_list[] = $row;
}
/*get Subject Name*/
include '../functions/subjectinfo.php';

/* For Teacher Info */
$sql = "SELECT * FROM `teacher` WHERE `id` = '$teacher_id'";
$teacher_res = $con->query($sql) or die($con->error);
$teacher_row = $teacher_res->fetch_assoc();

/* Logout Button */
if (isset($_POST['btn-logout'])) {
    session_destroy();
    echo header("Location ../../login/login.php");
}

?>
<!-- D A S H B O A R D  T E A C H E R -->

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

    <!-- Teacher CSS-->
    <link rel="stylesheet" href="../../css/teacher/teacher.css">

    <!-- Table CSS -->
    <link rel="stylesheet" href="../../css/table/table.css">


    <script src="../../js/theme/load-theme.js"></script>

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
                <a href="dashboard.php">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a> <!-- end of Dashboard -->

                <!-- My Classes -->
                <a href="myclasses.php">
                    <span class="material-icons-sharp">class</span>
                    <h3>My Classes</h3>
                </a> <!-- end of My Classes -->

                <!-- My Subjects -->
                <a href="mysubjects.php" class="active">
                    <span class="material-icons-sharp">auto_stories</span>
                    <h3>My Subjects</h3>
                </a> <!-- end of My Subjects -->

                <!-- My Account -->
                <a href="mysettings.php">
                    <span class="material-icons-sharp">manage_accounts</span>
                    <h3>My Account</h3>
                </a> <!-- end of My Account -->

                <form action="../functions/logout.php" method="POST">
                    <button type="submit" name="btn-logout">
                        <a>
                            <!-- Logout -->
                            <span class="material-icons-sharp">logout</span>
                            <h3>Logout</h3>
                        </a><!-- end of Logout -->
                    </button>
                </form>

            </div>

        </aside> <!-- end of ASIDE-->
        <main>
            <h1>My Subjects</h1>

            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">My Subjects</li>
                </ol>
            </nav> <!-- end of Breadcrumbs -->

            <div class="class-menu">
                <?php if ($subject_list > 0) { ?>
                    <?php foreach ($subject_list as $subject) : ?>
                        <div class="class-item">
                            <a href="../view_section/view_classes.php?subject_id=<?php echo $subject['subject_id'] ?>">
                                <div class="class-card" style="padding-left: 35px;">
                                    <div class="class-icon">
                                        <img src="../../img/assets/teacher/subject-book.svg">
                                    </div>
                                    <div class="class-info">
                                        <div class="class-name" style="padding-left: 20px;">
                                            <h1><?php echo getSubjectInfo($subject['subject_id'], 'subject_name') ?></h1>
                                            <p style="font-size: 15px;">For Grade <?php echo getSubjectInfo($subject['subject_id'], 'subject_grade_lvl') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <br>
                    <?php endforeach; ?>
                <?php } else {
                    echo "<h1 style='text-align: center'>You have no assigned subjects yet.</h1>";
                } ?>
            </div>

        </main> <!-- end of Main -->

        <!-- Right -->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <!-- Light and Dark Icon -->
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b><?php echo $teacher_row['name'] ?></b></p>
                        <small class="text-muted">Teacher</small>
                    </div>
                    <div class="profile-photo">
                        <img src="../../img/assets/teacher/teacher-logo.svg" alt="">
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