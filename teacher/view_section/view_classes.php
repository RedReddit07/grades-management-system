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

$sections_list = null;
$subject_id = $_GET['subject_id'];

/* MySQL Connection */
include_once("../../connection/connection.php");
$con = connection();


$sql = "SELECT * FROM `subject_assigned_section_tbl` WHERE `subject_id` = '$subject_id' AND `subject_teacher` = '$teacher_id'";
$class_res = $con->query($sql) or die($con->error);

while ($class_row = $class_res->fetch_assoc()) {
    $sections_list[] = $class_row;
}

function getGradeLevel($section_id)
{
    $con = connection();

    $sql = "SELECT * FROM `section_tbl` WHERE `id` = '$section_id'";
    $res = $con->query($sql) or die($con->error);
    $row = $res->fetch_assoc();



    if ($row > 0) {

        $grdlvl = $row['gradelevel_id'];

        $sql = "SELECT * FROM gradelevel_tbl WHERE id = '$grdlvl'";
        $res2 = $con->query($sql) or die($con->error);
        $row2 = $res2->fetch_assoc();
        if ($row2 > 0) {
            return $row2['grade'];
        }
    }
}

function getSectionName($section_id)
{
    $con = connection();

    $sql = "SELECT * FROM `section_tbl` WHERE `id` = '$section_id'";
    $res = $con->query($sql) or die($con->error);
    $row = $res->fetch_assoc();

    if ($row > 0) {
        return $row['sectionname'];
    }
}

function getSubjectname($subject_id)
{

    $con = connection();

    $sql = "SELECT * FROM `subject_tbl` WHERE `id` = '$subject_id'";
    $res = $con->query($sql) or die($con->error);
    $row = $res->fetch_assoc();

    if ($row > 0) {
        return $row['subject_name'];
    }
}

/* To get Subject Info */
include '../functions/subjectinfo.php';

function getSubjectTeacher($subject_teacher)
{
    $con = connection();

    $sql = "SELECT * FROM `teacher` WHERE `id` = '$subject_teacher'";
    $res = $con->query($sql) or die($con->error);
    $row = $res->fetch_assoc();

    if ($row > 0) {
        return $row['name'];
    }
}

/* Logout Button */
if (isset($_POST['btn-logout'])) {
    session_destroy();
    echo header("Location ../../login/login.php");
}

/* For Teacher Info */
$sql = "SELECT * FROM `teacher` WHERE `id` = '$teacher_id'";
$teacher_res = $con->query($sql) or die($con->error);
$teacher_row = $teacher_res->fetch_assoc();

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
                <a href="../main_page/dashboard.php">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a> <!-- end of Dashboard -->

                <!-- My Classes -->
                <a href="../main_page/myclasses.php">
                    <span class="material-icons-sharp">class</span>
                    <h3>My Classes</h3>
                </a> <!-- end of My Classes -->

                <!-- My Subjects -->
                <a href="../main_page/mysubjects.php" class="active">
                    <span class="material-icons-sharp">auto_stories</span>
                    <h3>My Subjects</h3>
                </a> <!-- end of My Subjects -->

                <!-- My Account -->
                <a href="../main_page/mysettings.php">
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
                    <li class="breadcrumb-item" aria-current="page"> <a href="../main_page/mysubjects.php">My Subjects</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo getSubjectInfo($subject_id, 'subject_code') ?></li>
                </ol>
            </nav> <!-- end of Breadcrumbs -->

            <div class="class-menu">
                <?php if ($sections_list > 0) { ?>
                    <?php foreach ($sections_list as $section) : ?>
                        <div class="class-item">
                            <a href="../quarterly_grade/grading_period.php?section_id=<?php echo $section['section_id'] ?>&subject_id=<?php echo $subject_id ?>">
                                <div class="class-card">
                                    <div class="class-icon">
                                        <img src="../../img/assets/teacher/room-card.svg">
                                    </div>
                                    <div class="class-info">
                                        <div class="class-name">
                                            <h2 class="section"><b> <?php echo getGradeLevel($section['section_id']) ?> </b> <?php echo GetSectionName($section['section_id']) ?></h2>
                                        </div>
                                        <div class="class-status">
                                            <p>Adviser: <span> <?php echo getSubjectTeacher($section['subject_teacher']) ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <br>
                    <?php endforeach; ?>
                <?php } else {

                    echo "<tr> <td></td><td>No sections who has this subject yet.</td> </tr>";
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