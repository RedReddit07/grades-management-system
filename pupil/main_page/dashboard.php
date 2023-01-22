<?php

if (!isset($_SESSION)) {
    session_start();
}
//get current pupilID
if (isset($_SESSION['pupilID'])) {

    $student_id = $_SESSION['pupilID'];
} else {
    echo "<script>alert('Please relogin Again')</script>";
    echo header("Location: ../../login/login.php");
}

/* MySQL Connection */
include_once("../../connection/connection.php");
$con = connection();

include '../functions/refresh-grades.php';
onLoad($student_id);

$user_lrn = getLRN($student_id);
$section_id = getPupilSection($student_id);

/* School Year Selector*/
$sql = "SELECT * FROM `section_tbl` WHERE `id` = '$section_id'";
$sec_res = $con->query($sql) or die($con->error);
$sec_row = $sec_res->fetch_assoc();

$sy = $sec_row['sy'];

/* School Year Selector*/
$sql = "SELECT * FROM `schoolyear_tbl` WHERE `SchoolYear` = '$sy'";
$sy_res = $con->query($sql) or die($con->error);
$sy_row = $sy_res->fetch_assoc();

/* Getting the subject name from the database. */
function getSubjectInfo($subject_id, $type)
{

    $con = connection();

    $sql = "SELECT * FROM `subject_tbl` WHERE `id` = '$subject_id'";
    $res = $con->query($sql) or die($con->error);

    $row = $res->fetch_assoc();

    if ($row > 0) {
        return $row[$type];
    } else {
        return 'No Subject found';
    }
}

/**
 * It gets the LRN of a student.
 * 
 * @param student_id the id of the student
 * 
 * @return The LRN of the student.
 */
function getLRN($student_id)
{
    $con = connection();

    $lrn = null;

    $sql = "SELECT * FROM `student_tbl` WHERE id = '$student_id'";
    $res = $con->query($sql) or die($con->error);

    $row = $res->fetch_assoc();

    $lrn = $row['lrn'];

    return $lrn;
}

/**
 * It returns the full name of a student based on the student id.
 * 
 * @param student_id The id of the student
 * 
 * @return the fullname of the student.
 */
function getPupilName($student_id)
{
    $con = connection();


    $sql = "SELECT * FROM `student_tbl` WHERE id = '$student_id'";
    $res = $con->query($sql) or die($con->error);

    $row = $res->fetch_assoc();

    $fullname = "";

    if ($row > 0) {
        $fullname = $row['firstname'] . ' ' . $row['lastname'];
    }


    return $fullname;
}

/**
 * It returns the section_id of the student_id passed as parameter.
 * 
 * @param student_id the id of the student
 * 
 * @return The section_id of the student.
 */
function getPupilSection($student_id)
{
    $con = connection();

    $sql = "SELECT * FROM `enrollment_tbl` WHERE `student_id` = '$student_id'";
    $res = $con->query($sql) or die($con->error);

    $row = $res->fetch_assoc();

    if ($row > 0) {
        return $row['section_id'];
    }
}

/**
 * It returns an array of subjects that a student is enrolled in.
 * 
 * @param student_id the id of the student
 * @param section_id 1
 * 
 * @return an array of subjects.
 */
function getPupilSubjects($student_id, $section_id)
{
    $con = connection();

    $sql = "SELECT * FROM `student_subject_record_tbl` WHERE student_id = '$student_id' AND section_id = '$section_id'";
    $res = $con->query($sql) or die($con->error);

    $subjects = null;

    while ($row = $res->fetch_assoc()) {
        $subjects[] = $row;
    }


    return $subjects;
}

/**
 * It gets the teacher name of a subject in a section.
 * 
 * @param section_id The section id of the student
 * @param subject_id The id of the subject
 * 
 * @return the teacher name.
 */
function getTeacherName($section_id, $subject_id)
{
    $con = connection();

    $sql = "SELECT * FROM `subject_assigned_section_tbl` WHERE section_id = '$section_id' AND subject_id = '$subject_id'";
    $res = $con->query($sql) or die($con->error);

    $row = $res->fetch_assoc();

    if ($row > 0) {
        $teacher_id = $row['subject_teacher'];
        $sql = "SELECT * FROM `teacher` WHERE id = '$teacher_id'";
        $res2 = $con->query($sql) or die($con->error);

        $row2 = $res2->fetch_assoc();
        if ($row2 > 0) {

            return "<b><i>Subject Teacher: </b></i>" . $row2['name'];
        } else {
            echo "<b></i>No Subject Teacher yet.<b></i>";
        }
    }
}


/**
 * It gets the grades of a student in a subject.
 * 
 * @param subject_id the id of the subject
 * @param type 1st, 2nd, 3rd, 4th, Final
 * @param student_id the id of the student
 * 
 * @return the grades of the student in a particular subject.
 */
function getGradeInfo($subject_id, $type, $student_id)
{
    $con = connection();

    $grades = null;

    $sql = "SELECT * FROM `student_subject_record_tbl` WHERE subject_id = '$subject_id' AND student_id = '$student_id'";
    $res = $con->query($sql) or die($con->error);

    $row = $res->fetch_assoc();

    $grades = $row[$type];

    return $grades;
}

/**
 * It gets the gender of a student from the database.
 * 
 * @param student_id The id of the student
 * @param type gender, firstname, lastname, middlename, etc.
 */
function getpupilGender($student_id, $type)
{

    $con = connection();
    $sql = "SELECT * FROM `student_tbl` WHERE `id` = '$student_id'";
    $res = $con->query($sql) or die($con->error);

    $row = $res->fetch_assoc();

    if ($row > 0) {
        echo $row[$type];
    } else {
        echo 'Null';
    }
}

function getMAPEHsubject($student_id, $section_id, $grading, $subject)
{
    //52, 7, 1st_grade, 'music'
    $con = connection();
    //all subjects of that student
    $sql = "SELECT * FROM student_subject_record_tbl WHERE student_id = '$student_id' AND section_id = '$section_id'";
    $all_res = $con->query($sql) or die($con->error);

    while ($all_row = $all_res->fetch_assoc()) {
        $subject_id = $all_row['subject_id'];
        //find the music id
        $sql = "SELECT * FROM subject_tbl WHERE id = '$subject_id'";
        $res = $con->query($sql) or die($con->error);

        while ($row = $res->fetch_assoc()) {
            $subject_code = $row['subject_code'];
            $music_id = $row['id'];
            $lower = strtolower($subject_code);

            if (str_contains($lower, $subject)) {
                return $all_row[$grading];
            }
        }
    }
}

// $music = getMAPEHsubject($student_id, $section_id, $grading_period, 'music');
// $arts = getMAPEHsubject($student_id, $section_id, $grading_period, 'arts');
// $pe = getMAPEHsubject($student_id, $section_id, $grading_period, 'pe');
// $health = getMAPEHsubject($student_id, $section_id, $grading_period, 'health');
// $mapeh_grade = 0;

// $mapeh_count = 0;
// if($music > 0) $mapeh_count++;
// if($arts > 0) $mapeh_count++;
// if($pe > 0) $mapeh_count++;
// if($health > 0) $mapeh_count++;
// if($mapeh_count >0) {
//     $mapeh_grade = ($music + $arts + $pe + $health) / $mapeh_count;
// }else{
//     $mapeh_grade = 0;
// }

/**
 * It gets the section name from the database and displays it.
 * 
 * @param section_id The id of the section you want to get the name of.
 */
function getSection($section_id)
{
    $con = connection();

    $sql = "SELECT * FROM `section_tbl` WHERE `id` = '$section_id'";;
    $section_res = $con->query($sql) or die($con->error);
    $section_row = $section_res->fetch_assoc();
    if ($section_row > 0) {
        echo $section_row['sectionname'];
    }
}

/**
 * It gets the grade level of a student based on the section id.
 * 
 * @param section_id the id of the section
 * 
 * @return The grade level of the student.
 */
function getSectionLevel($section_id)
{
    $con = connection();

    $sql = "SELECT * FROM `enrollment_tbl` WHERE `section_id` = '$section_id'";
    $res = $con->query($sql) or die($con->error);
    $row = $res->fetch_assoc();

    if ($row > 0) {
        $tmp1 = $row['id'];
        $sql2 = "SELECT * FROM `section_tbl` WHERE `id` = '$tmp1'";
        $section_res = $con->query($sql2) or die($con->error);
        $section_row = $section_res->fetch_assoc();

        if ($section_row > 0) {
            $tmp2 = $section_row['gradelevel_id'];
            $sql3 = "SELECT * FROM `gradelevel_tbl` WHERE `id` = '$tmp2'";
            $level_res = $con->query($sql3) or die($con->error);
            $level_row = $level_res->fetch_assoc();

            if ($level_row > 0) {
                return $level_row['grade'];
            }
        }
    }
}

/* Fetching the section name from the database. */
$sql = "SELECT * FROM `section_tbl` WHERE `id` = '$section_id'";
$view_res = $con->query($sql) or die($con->error);
$view_row = $view_res->fetch_assoc();
$subjects = getPupilSubjects($student_id, $section_id);

/**
 * If the value of the variable is true, add 1 to the counter.
 * 
 * @param m Music
 * @param a art
 * @param pe Physical Education
 * @param h Health
 */
function mapehCounter($m, $a, $pe, $h)

{

    $mapehCounter = 0;
    if ($m) {
        $mapehCounter += 1;
    }
    if ($a) {
        $mapehCounter += 1;
    }
    if ($pe) {
        $mapehCounter += 1;
    }
    if ($h) {
        $mapehCounter += 1;
    }

    return $mapehCounter;
}
$mapeh_count = 0;

?>
<!-- D A S H B O A R D  P U P I L -->

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
    <!-- Pupil CSS-->
    <link rel="stylesheet" href="../../css/pupil/pupil.css">
    <!-- Table CSS -->
    <link rel="stylesheet" href="../../css/table/table.css">
    <!--=====================================================-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../../js/pupil/quarterly_grade/change_gp.js"></script>
    <script src="../../js/theme/load-theme.js"></script>

    <title>Grades Management System</title>
</head>

<body>
    <!--=====================================================-->
    <!-- Main Container -->
    <input id="selected-gp" type="hidden" value="<?php echo $grading_period ?>">
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
                    <h3>View Grades</h3>
                </a> <!-- end of Dashboard -->
                <!-- My Account -->
                <a href="mysettings.php">
                    <span class="material-icons-sharp">manage_accounts</span>
                    <h3>My Account</h3>
                </a> <!-- end of My Account -->
                <!-- Logout -->
                <form action="../functions/logout.php" method="POST">
                    <button type="submit" name="btn-logout">
                        <a>
                            <!-- Logout -->
                            <span class="material-icons-sharp">logout</span>
                            <h3>Logout</h3>
                        </a><!-- end of Logout -->
                    </button>
                </form>
                <!-- end of Logout -->
            </div>
        </aside> <!-- end of ASIDE-->
        <main class="main-grades-content">
            <h1>Dashboard</h1>
            <div class="date">
                <h2>Academic Year</h2>
                <span><?php echo $sy_row['SchoolYear'] ?></span>
            </div>
            <div class="insights">
                <!-- Class Handled Card -->
                <div class="class">
                    <h3><b><?php echo getSectionLevel($section_id) ?></b></h3>
                    <div class="middle">
                        <div class="left">
                            <h1 style="color: var(--color-primary);"><?php echo getSection($section_id) ?></h1>
                        </div>
                    </div>
                    <small class="text-muted"><b>Adviser:</b> Vener Jeresano</small>
                </div> <!-- end of Class Handled Card -->
            </div> <!-- end of Insights Card-->
            <br>
            <?php if ($view_row['is_view_enabled'] == 'Yes') { ?>
                <!-- Class Table -->
                <div class="class-table">
                    <h2>My Subjects & Grades</h2>
                    <table class="pupil-table table-responsive">
                        <thead>
                            <?php if ($subjects > 0) { ?>
                                <tr>
                                    <th>Subjects</th>

                                    <?php if ($view_row['view_quarter1'] == 'Yes') { ?>
                                        <th>Q1</th>
                                    <?php } ?>

                                    <?php if ($view_row['view_quarter2'] == 'Yes') { ?>
                                        <th>Q2</th>
                                    <?php } ?>

                                    <?php if ($view_row['view_quarter3'] == 'Yes') { ?>
                                        <th>Q3</th>
                                    <?php } ?>

                                    <?php if ($view_row['view_quarter4'] == 'Yes') { ?>
                                        <th>Q4</th>
                                    <?php } ?>

                                    <?php if ($view_row['view_final'] == 'Yes') { ?>
                                        <th>Final Grade</th>
                                    <?php } ?>
                        </thead>
                        <tbody>
                            <?php foreach ($subjects as $subject) :

                                    if (getSubjectInfo($subject['subject_id'], "subject_name") == 'Music') {
                                        $music1 = getGradeInfo($subject['subject_id'], '1st_grade', $student_id);
                                        $music2 = getGradeInfo($subject['subject_id'], '2nd_grade', $student_id);
                                        $music3 = getGradeInfo($subject['subject_id'], '3rd_grade', $student_id);
                                        $music4 = getGradeInfo($subject['subject_id'], '4th_grade', $student_id);
                                        $musicfinal = getGradeInfo($subject['subject_id'], 'final_grade', $student_id);

                                        $mapeh_count++;
                                    }
                                    if (getSubjectInfo($subject['subject_id'], "subject_name") == 'Arts') {
                                        $arts1 = getGradeInfo($subject['subject_id'], '1st_grade', $student_id);
                                        $arts2 = getGradeInfo($subject['subject_id'], '2nd_grade', $student_id);
                                        $arts3 = getGradeInfo($subject['subject_id'], '3rd_grade', $student_id);
                                        $arts4 = getGradeInfo($subject['subject_id'], '4th_grade', $student_id);
                                        $artsfinal = getGradeInfo($subject['subject_id'], 'final_grade', $student_id);

                                        $mapeh_count++;
                                    }
                                    if (getSubjectInfo($subject['subject_id'], "subject_name") == 'Physical Education') {
                                        $pe1 = getGradeInfo($subject['subject_id'], '1st_grade', $student_id);
                                        $pe2 = getGradeInfo($subject['subject_id'], '2nd_grade', $student_id);
                                        $pe3 = getGradeInfo($subject['subject_id'], '3rd_grade', $student_id);
                                        $pe4 = getGradeInfo($subject['subject_id'], '4th_grade', $student_id);
                                        $pefinal = getGradeInfo($subject['subject_id'], 'final_grade', $student_id);

                                        $mapeh_count++;
                                    }
                                    if (getSubjectInfo($subject['subject_id'], "subject_name") == 'Health') {
                                        $health1 = getGradeInfo($subject['subject_id'], '1st_grade', $student_id);
                                        $health2 = getGradeInfo($subject['subject_id'], '2nd_grade', $student_id);
                                        $health3 = getGradeInfo($subject['subject_id'], '3rd_grade', $student_id);
                                        $health4 = getGradeInfo($subject['subject_id'], '4th_grade', $student_id);
                                        $healthfinal = getGradeInfo($subject['subject_id'], 'final_grade', $student_id);

                                        $mapeh_count++;
                                    }

                                    $first_grade = getGradeInfo($subject['subject_id'], '1st_grade', $student_id);
                                    $second_grade = getGradeInfo($subject['subject_id'], '2nd_grade', $student_id);
                                    $third_grade = getGradeInfo($subject['subject_id'], '3rd_grade', $student_id);
                                    $fourth_grade = getGradeInfo($subject['subject_id'], '4th_grade', $student_id);
                                    $final_grade = getGradeInfo($subject['subject_id'], 'final_grade', $student_id);
                                    // $stat = getGradeInfo($subject['subject_id'], $remark, $student_id);

                            ?>
                                <tr>
                                    <td><?php echo getSubjectInfo($subject['subject_id'], "subject_name"); ?></td>

                                    <?php if ($view_row['view_quarter1'] == 'Yes') { ?>
                                        <td><?php echo $first_grade; ?></td>
                                    <?php } ?>

                                    <?php if ($view_row['view_quarter2'] == 'Yes') { ?>
                                        <td><?php echo $second_grade; ?></td>
                                    <?php } ?>

                                    <?php if ($view_row['view_quarter3'] == 'Yes') { ?>
                                        <td><?php echo $third_grade; ?></td>
                                    <?php } ?>

                                    <?php if ($view_row['view_quarter4'] == 'Yes') { ?>
                                        <td><?php echo $fourth_grade; ?></td>
                                    <?php } ?>

                                    <?php if ($view_row['view_final'] == 'Yes') { ?>
                                        <td><?php echo $final_grade; ?></td>
                                    <?php } ?>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <?php

                                if ($mapeh_count == 4) :

                                    $mapeh1 = ($music1 + $arts1 + $pe1 + $health1) / 4;
                                    $mapeh2 = ($music2 + $arts2 + $pe2 + $health2)  / 4;
                                    $mapeh3 = ($music3 + $arts3 + $pe3 + $health3) / 4;
                                    $mapeh4 = ($music4 + $arts4 + $pe4 + $health4)  / 4;
                                    $mapehfinal = ($mapeh1 + $mapeh2 + $mapeh3 + $mapeh4)  / 4;
                        ?>

                            <tr>
                                <td><?php echo "MAPEH" ?></td>

                                <td><?php echo round($mapeh1); ?></td>
                                <td><?php echo round($mapeh2); ?></td>
                                <td><?php echo round($mapeh3); ?></td>
                                <td><?php echo round($mapeh4); ?></td>
                                <td><?php echo round($mapehfinal); ?></td>

                            </tr>

                        <?php endif; ?>
                    <?php } else {
                                echo 'Your Section has no subjects yet. Please wait for your advisory teacher to add one';
                            } ?>
                    </table>
                </div> <!-- end of Class Table-->
            <?php } else {
                echo "<h3>View Grade is Disabled.</h3>";
                echo "<p>Wait for your Advisory to enabled it.</p>";
            } ?>

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
                        <p>Hey, <b><?php echo getPupilName($student_id) ?></b></p>
                        <small class="text-muted">Pupil</small>
                    </div>
                    <div class="profile-photo">

                        <img src="../../img/assets/pupil/profile-pic.svg">

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