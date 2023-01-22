<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['teacherID'])) {

    $teacher_id = $_SESSION['teacherID'];
} else {
    echo header("Location: ../../login/login.php");
}

include '../functions/refresh_grades.php';

// IMPORTANT!
onLoad(); // loads and refresh all grades record 
//

$section_id = $_GET['section_id'];
$subject_id = $_GET['subject_id'];
$subject_name = selectSubjectname($subject_id);


if (!isset($_GET['grading_period'])) {

    echo header("Location: grading_period.php?section_id={$section_id}&subject_id={$subject_id}&grading_period=1st_grade");
}

$grading_period = $_GET['grading_period'];
if ($grading_period == "1st_grade" || $grading_period == "2nd_grade" || $grading_period == "3rd_grade" || $grading_period == "4th_grade" || $grading_period == "final_grade") {
} else {

    echo header("Location: grading_period.php?section_id={$section_id}&subject_id={$subject_id}&grading_period=1st_grade");
}

$txtGP = "";
$txtRemarks = "";

if ($grading_period == "1st_grade") {
    $txtGP = "First Quarterly Grade";
    $toexc = "First Grading";
    $txtRemarks = "First Grading Remark";
    $remarks = "1st_grade_remark";
} else if ($grading_period == "2nd_grade") {
    $txtGP = "Second Quarterly Grade";
    $toexc = "Second Grading";
    $txtRemarks = "Second Grading Remark";
    $remarks = "2nd_grade_remark";
} else if ($grading_period == "3rd_grade") {
    $txtGP = "Third Quarterly Grade";
    $toexc = "Third Grading";
    $txtRemarks = "Third Grading Remark";
    $remarks = "3rd_grade_remark";
} else if ($grading_period == "4th_grade") {
    $txtGP = "Fourth Quarterly Grade";
    $toexc = "Fourth Grading";
    $txtRemarks = "Fourth Grading Remark";
    $remarks = "4th_grade_remark";
} else if ($grading_period == "final_grade") {
    $txtGP = "Final Grade";
    $toexc = "Final Grading";
    $txtRemarks = "Final Remark";
    $remarks = "final_grade_remark";
}

$_SESSION['export_subject_id'] = $subject_id;
$_SESSION['export_section_id'] = $section_id;

$_SESSION['export_subject_name'] = selectSubjectname($subject_id);
$_SESSION['export_section_name'] = selectClassname($section_id);

$_SESSION['export_gradelvl'] = selectSectionGradeLevel($section_id);
$_SESSION['quarter'] = strtoupper($toexc);

$_SESSION['quarter_grade'] = $grading_period;

include_once("../../connection/connection.php");
$con = connection();
$students_list = null;

$sql = "SELECT * FROM student_subject_record_tbl WHERE section_id = '$section_id' AND `subject_id` = '$subject_id'";
$res = $con->query($sql) or die($con->error);

while ($row = $res->fetch_assoc()) {


    $students_list[] = $row;
    $subject = $row;
}

function getStudentData($pupil_id, $type)
{
    $con = connection();

    $sql = "SELECT * FROM student_tbl WHERE id = '$pupil_id'";
    $res = $con->query($sql) or die($con->error);
    $row = $res->fetch_assoc();

    if ($row > 0) {
        return $row[$type];
    }
}

/* get Subject Name */
include '../functions/subjectinfo.php';

/* get Section Name */
include '../functions/sectioninfo.php';

/* For Teacher Info */
$sql = "SELECT * FROM `teacher` WHERE `id` = '$teacher_id'";
$teacher_res = $con->query($sql) or die($con->error);
$teacher_row = $teacher_res->fetch_assoc();

/* Logout Button */
if (isset($_POST['btn-logout'])) {
    session_destroy();
    echo header("Location ../../login/login.php");
}

if (isset($_POST['btn-select-gp'])) {

    $selected = $_POST['select_grading_period'];

    if ($selected == "1st_grade") {
        echo header("Location: grading_period.php?section_id={$section_id}&subject_id={$subject_id}&grading_period=1st_grade");
    } else if ($selected == "2nd_grade") {
        echo header("Location: grading_period.php?section_id={$section_id}&subject_id={$subject_id}&grading_period=2nd_grade");
    } else if ($selected == '3rd_grade') {
        echo header("Location: grading_period.php?section_id={$section_id}&subject_id={$subject_id}&grading_period=3rd_grade");
    } else if ($selected == '4th_grade') {
        echo header("Location: grading_period.php?section_id={$section_id}&subject_id={$subject_id}&grading_period=4th_grade");
    } else if ($selected == 'final_grade') {
        echo header("Location: grading_period.php?section_id={$section_id}&subject_id={$subject_id}&grading_period=final_grade");
    } else {
        echo header("Location: grading_period.php?section_id={$section_id}&subject_id={$subject_id}&grading_period=1st_grade");
    }
}

function selectSubjectname($subject_id)
{

    $con = connection();

    $sql = "SELECT * FROM `subject_tbl` WHERE `id` = '$subject_id'";
    $res = $con->query($sql) or die($con->error);

    $class_row = $res->fetch_assoc();

    if ($class_row > 0) {
        return $class_row['subject_name'];
    } else {
        return 'No Subject found';
    }
}

function getGradeLevelID($section_id)
{
    $con = connection();

    $sql = "SELECT * FROM section_tbl WHERE id = '$section_id'";
    $res = $con->query($sql) or die($con->error);
    $row = $res->fetch_assoc();
    if ($row > 0) {
        return $row['gradelevel_id'];
    }
}


function getGradeLevel($grd_id)
{
    $con = connection();

    $sql = "SELECT * FROM gradelevel_tbl WHERE id = '$grd_id'";
    $res = $con->query($sql) or die($con->error);
    $row = $res->fetch_assoc();
    if ($row > 0) {
        return $row['grade'];
    }
}



function getSectionName($section_id)
{
    $con = connection();

    $sql = "SELECT * FROM section_tbl WHERE id = '$section_id'";
    $res = $con->query($sql) or die($con->error);
    $row = $res->fetch_assoc();
    if ($row > 0) {
        return $row['sectionname'];
    }
}


function selectSectionGradeLevel($section_id)
{
    $con = connection();

    $sql = "SELECT * FROM `section_tbl` WHERE `id` = '$section_id'";
    $res = $con->query($sql) or die($con->error);

    $class_row = $res->fetch_assoc();

    if ($class_row > 0) {
        // return $class_row['gradedlvl_id'];
        $grd = $class_row['gradelevel_id'];
        $sql = "SELECT * FROM `gradelevel_tbl` WHERE `id` = '$grd'";
        $grd_res = $con->query($sql) or die($con->error);

        $grd_row = $grd_res->fetch_assoc();
        if ($grd_row > 0) {
            return $grd_row['grade'];
        }
    }
}

function selectClassname($section_id)
{

    $con = connection();

    $sql = "SELECT * FROM `section_tbl` WHERE `id` = '$section_id'";
    $res = $con->query($sql) or die($con->error);

    $class_row = $res->fetch_assoc();

    if ($class_row > 0) {
        return $class_row['sectionname'];
    } else {
        return 'No Class';
    }
}


function selectPupilInfo($student_id, $type)
{

    $con = connection();

    $sql = "SELECT * FROM `student_tbl` WHERE `id` = '$student_id'";
    $res = $con->query($sql) or die($con->error);

    $class_row = $res->fetch_assoc();

    if ($class_row > 0) {
        return $class_row[$type];
    }
}

function countPassedPupil($section_id, $subject_id, $type)
{
    $con = connection();

    $tmp1 = "{$type}_remark";
    $sql = "SELECT COUNT(`student_id`) FROM student_subject_record_tbl WHERE section_id = '$section_id' AND `subject_id` = '$subject_id' AND $tmp1 = 'Passed'";

    $res = $con->query($sql) or die($con->error);
    $row = $res->fetch_row()[0];

    if ($row > 0 && $row < 10) {
        $tmp = "0{$row}";
        return $tmp;
    } else {
        return $row;
    }
}

function countFailedPupil($section_id, $subject_id, $type)
{
    $con = connection();

    $tmp1 = "{$type}_remark";
    $sql = "SELECT COUNT(`student_id`) FROM student_subject_record_tbl WHERE section_id = '$section_id' AND `subject_id` = '$subject_id' AND $tmp1 = 'Failed'";

    $res = $con->query($sql) or die($con->error);
    $row = $res->fetch_row()[0];

    if ($row > 0 && $row < 10) {
        $tmp = "0{$row}";
        return $tmp;
    } else {
        return $row;
    }
}


/* For Teacher Info */
$sql = "SELECT * FROM `teacher` WHERE `id` = '$teacher_id'";
$teacher_res = $con->query($sql) or die($con->error);
$teacher_row = $teacher_res->fetch_assoc();

?>

<!-- F I R S T  G R A D I N G  -->

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


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../../js/teacher/quarterly_grade/change_gp.js"></script>

    <script src="../../js/theme/load-theme.js"></script>
    <!--=====================================================-->

    <title>Grades Management System</title>
</head>

<body>
    <!--=====================================================-->
    <!-- Main Container -->
    <input id="selected-gp" type="hidden" value="<?php echo $grading_period ?>">
    <input type="hidden" id="get-section" value="<?php echo $section_id ?>">
    <input type="hidden" id="get-subject" value="<?php echo $subject_id ?>">


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
                    <li class="breadcrumb-item"><a href="../main_page/mysubjects.php">My Subjects</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="../view_section/view_classes.php?subject_id=<?php echo $subject_id ?>"><?php echo getSubjectInfo($subject_id, 'subject_code') ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo getSectionInfo($section_id, 'sectionname') ?></li>
                </ol>
            </nav> <!-- end of Breadcrumbs -->

            <!-- Insights Card -->
            <div class="insights">

                <!-- Class Handled Card -->
                <div class="class">
                    <h3><b><?php echo getGradeLevel(getGradeLevelID($section_id)); ?></b></h3>
                    <div class="middle">
                        <div class="left">
                            <h1 style="color: var(--color-primary);"><?php echo getSectionName($section_id) ?></h1>
                        </div>
                    </div>
                    <a href="../view_section/view_classes.php?subject_id=<?php echo $subject_id ?>">
                        <small class="text-muted">GO BACK</small>
                    </a>

                </div> <!-- end of Class Handled Card -->

                <!-- Subject Handled Card -->
                <div class="pupil-passed">
                    <span class="material-icons-sharp">trending_up</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Passed Pupil</h3>
                            <h1> <?php echo countPassedPupil($section_id, $subject_id, $grading_period) ?> </h1>
                        </div>
                    </div>
                </div> <!-- end of Subject Handled Card -->

                <!-- Subject Handled Card -->
                <div class="pupil-failed">
                    <span class="material-icons-sharp">trending_down</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Failed Pupil</h3>
                            <h1> <?php echo countFailedPupil($section_id, $subject_id, $grading_period) ?> </h1>
                        </div>
                    </div>
                </div> <!-- end of Subject Handled Card -->
            </div> <!-- end of Insights Card-->

            <!-- Class Table -->
            <div class="class-table">
                <h2>My Pupils</h2>
                <table class="table-responsive">
                    <thead>
                        <tr>
                            <th>LRN</th>
                            <th>Pupil's Name</th>
                            <th><?php echo $txtGP ?> </th>
                            <th><?php echo $txtRemarks ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($students_list > 0) {
                            foreach ($students_list as $student) : ?>
                                <tr>
                                    <td><?php echo getStudentData($student['student_id'], 'lrn'); ?></td>
                                    <?php
                                    $full_name = getStudentData($student['student_id'], 'firstname') . ' ' . getStudentData($student['student_id'], 'lastname');
                                    ?>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $student[$grading_period] ?></td>
                                    <?php
                                    if ($student[$remarks] == "Passed") {
                                        $stat = "success";
                                    } else if ($student[$remarks] == "Failed") {
                                        $stat = "danger";
                                    } else {
                                        $stat = "warning";
                                    }
                                    ?>
                                    <td class="<?php echo $stat ?>">
                                        <?php echo $student[$remarks] ?></td>
                                </tr>
                            <?php endforeach; ?>

                        <?php } else {
                            echo "<tr>
                                    <td>No students on this class yet.</td> 
                                </tr>";
                        } ?>
                    </tbody>
                </table>
                <br>
                <div class="excel-group">

                    <a class="" href="../phpspreadsheet/exporttemplate.php">
                        <button class="btn excel-btn">
                            <span class="material-icons-sharp"">
                        file_download
                        </span>
                        Export Data
                    </button>
                    </a>
                    
                    <button class=" btn submit-grade-btn" data-bs-toggle="modal" data-bs-target="#importGradeModal">
                                <span class="material-icons-sharp">
                                    file_upload
                                </span>
                                Import Grade
                        </button>

                </div>
                <br>
            </div> <!-- end of Class Table-->

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

            <div class="summary-grades">
                <h2>Select Grading Period</h2>
                <div class="summary">
                    <div class="icon" style="background: var(--color-purple)">
                        <span class="material-icons-sharp">leaderboard</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <form action="" method="POST">
                                <select class="form-select" aria-label="Default select example" id="select-gp" name="select_grading_period">
                                    <option value="1st_grade">First Grading</option>
                                    <option value="2nd_grade">Second Grading</option>
                                    <option value="3rd_grade">Third Grading</option>
                                    <option value="4th_grade">Fourth Grading</option>
                                    <option value="final_grade">Final Grade</option>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-save" id="btn-select-gp" name="btn-select-gp">
                                    View Grading
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div> <!-- end of Right -->

    </div> <!-- end of Main Container -->

    <!--=====================================================-->

    <!-- Manage Subject Modal -->
    <div class="modal fade" tabindex="-1" id="importGradeModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import ECR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="import_excel_form" enctype="multipart/form-data">
                        <div class="container">
                            <div class="panel panel-default">
                                <div class="panel-heading">Import Grading Template CSV File.</div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <span id="message"></span>
                                        <input type="file" name="import_excel" />
                                        <br />

                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-delete" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" name="import" id="import" class="btn btn-save" value="Import" />
                </div>
                </form>
            </div>
        </div>
    </div> <!-- end of Modal -->

    <!--=====================================================-->

    <!--=====================================================-->
    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!--=====================================================-->
    <!-- Sidebar Javascript-->
    <script src="../../js/res-sidenav/respons-side.js"></script>
    <!--=====================================================-->
    <script>
        $(document).ready(function() {

            var selectedgp = $('#selected-gp').val();
            if (selectedgp == "final_grade") {
                $(".excel-group").hide();
            } else {

                $(".excel-group").show();
            }

            $('#import_excel_form').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "../phpspreadsheet/importtemplate.php",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#import').attr('disabled', 'disabled');
                        $('#import').val('Importing...');
                    },
                    success: function(data) {
                        $('#message').html(data);
                        $('#import_excel_form')[0].reset();
                        $('#import').attr('disabled', false);
                        $('#import').val('Import');
                        $loc = "grading_period.php?section_id=" + $('#get-section').val() + "&subject_id=" + $('#get-subject').val() + "&grading_period=" + $('#selected-gp').val();

                        location.href = $loc;
                    }
                })
            });
        });
    </script>
    <!--=====================================================-->
</body>

</html>