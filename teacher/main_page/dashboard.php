<?php
ob_start();

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['teacherID'])) {

    $teacher_id = $_SESSION['teacherID'];
    $photo = $_SESSION['teacher_image'];
} else {
    echo "<script>alert('Please relogin Again')</script>";
    echo header("Location: ../../login/login.php");
}

/* MySQL Connection */
include_once("../../connection/connection.php");
$con = connection();


/* School Year Selector*/
$sql = "SELECT * FROM `schoolyear_tbl`";
$sy_res = $con->query($sql) or die($con->error);
$sy_row = $sy_res->fetch_assoc();

if (!isset($_SESSION['selected_sy'])) {
    $_SESSION['selected_sy'] = $sy_row['SchoolYear'];
}

$section_list = null;
$section_view_list = null;

// To get Section
$sql = "SELECT * FROM `section_tbl` WHERE `teacher_id` = '$teacher_id' AND `sy` = '{$_SESSION['selected_sy']}'";
$res = $con->query($sql) or die($con->error);

while ($row = $res->fetch_assoc()) {
    $section_list[] = $row;
}

$selected_sy = $_SESSION['selected_sy'];


// Count Pupil
function countPupil($teacher_id, $selected_sy)
{
    $con = connection();

    $total = 0;

    $sql = "SELECT * FROM `section_tbl` WHERE `teacher_id` = '$teacher_id' AND `sy` = '$selected_sy'";
    $res = $con->query($sql) or die($con->error);
    while ($row = $res->fetch_assoc()) {
        $section = $row['id'];
        $sql2 = "SELECT COUNT(DISTINCT `student_id`) FROM `enrollment_tbl` WHERE `section_id` = '$section'";
        $res2 = $con->query($sql2) or die($con->error);
        $row2 = $res2->fetch_row()[0];
        $total += $row2;
    }
    if ($total > 0 && $total < 10) {
        $tmp = "0{$total}";
        return $tmp;
    } else {
        return $total;
    }
}

// Count Subjects
function countSubjects($teacher_id, $selected_sy)
{
    $con = connection();


    $sql = "SELECT COUNT(DISTINCT `id`) FROM subject_assigned_section_tbl WHERE subject_teacher = '$teacher_id' AND `sy` = '$selected_sy'";

    $res = $con->query($sql) or die($con->error);

    $row = $res->fetch_row()[0];
    if ($row > 0 && $row < 10) {
        $tmp = "0{$row}";
        return $tmp;
    } else {
        return $row;
    }
}

// Count Sections
function countSections($teacher_id, $selected_sy)
{
    $con = connection();


    $sql = "SELECT COUNT(DISTINCT `id`) FROM `section_tbl` WHERE `teacher_id` = '$teacher_id' AND `sy` = '$selected_sy'";

    $res = $con->query($sql) or die($con->error);

    $row = $res->fetch_row()[0];
    if ($row > 0 && $row < 10) {
        $tmp = "0{$row}";
        return $tmp;
    } else {
        return $row;
    }
}

// Get Section Name
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

// Get Grade Level Name
function getGradeLevel($grd_id)
{
    $con = connection();

    $sql = "SELECT * FROM gradelevel_tbl WHERE id = '$grd_id'";
    $grade_lvl_res = $con->query($sql) or die($con->error);
    $grade_lvl_row = $grade_lvl_res->fetch_assoc();
    if ($grade_lvl_row > 0) {
        return $grade_lvl_row['grade'];
    }
}

// Get Grade Level Name
function getYearStatus($sy_id)
{
    $con = connection();

    $sql = "SELECT * FROM `schoolyear_tbl` WHERE `SchoolYear` = '$sy_id'";
    $sy_status_res = $con->query($sql) or die($con->error);
    $sy_status_row = $sy_status_res->fetch_assoc();
    if ($sy_status_row > 0) {
        return $sy_status_row['Active'];
    }
}

// To get Section Info 
include '../functions/sectioninfo.php';
// To get School Year Info 
include '../functions/getsyname.php';

$sql = "SELECT * FROM `section_tbl` WHERE `teacher_id` = '$teacher_id' AND `sy` = '$selected_sy'";
$section_res = $con->query($sql) or die($con->error);
$section_row = $section_res->fetch_assoc();

// To get Teacher Info 
$sql = "SELECT * FROM `teacher` WHERE `id` = '$teacher_id'";
$teacher_res = $con->query($sql) or die($con->error);
$teacher_row = $teacher_res->fetch_assoc();

// For Showing Viewing of Grades 
$sql = "SELECT * FROM `section_tbl` WHERE `teacher_id` = '$teacher_id' AND `sy` = '$selected_sy'";
$section_view_res = $con->query($sql) or die($con->error);

while ($section_view_row = $section_view_res->fetch_assoc()) {
    $section_view_list[] = $section_view_row;
}

if (isset($_POST['btn-change-sy'])) {

    $_SESSION['selected_sy'] = $_POST['change-sy'];
    echo header("Location: ./dashboard.php");
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

    <!-- Bootstrap Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

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
                <a href="dashboard.php" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a> <!-- end of Dashboard -->

                <!-- My Classes -->
                <a href="myclasses.php">
                    <span class="material-icons-sharp">class</span>
                    <h3>My Classes</h3>
                </a> <!-- end of My Classes -->

                <!-- My Subjects -->
                <a href="mysubjects.php">
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
            <h1>Dashboard</h1>

            <!-- Manage School Year  -->
            <div class="date">
                <div class="row">
                    <div class="col sy-text">
                        <span>Academic Year</span>
                        <h2><b><?php echo getSYName($_SESSION['selected_sy'])  ?> </b> </h2>
                    </div>
                    <div class="col sy-button">
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#symodal">
                            <i class="bi bi-pencil-square"></i>
                        </button>

                    </div>
                </div>

            </div>
            <!-- end of Manage School Year  -->

            <!-- Insights Card -->
            <div class="insights">
                <!-- Pupil Handled Card -->
                <div class="pupil">
                    <span class="material-icons-sharp">child_care</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Handled Pupils</h3>
                            <h1><?php echo countPupil($teacher_id, $_SESSION['selected_sy']) ?></h1>
                        </div>
                    </div>

                </div> <!-- end of Pupil Handled Card -->

                <!-- Subject Handled Card -->
                <div class="subject">
                    <span class="material-icons-sharp">menu_book</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Handled Subjects</h3>
                            <h1><?php echo countSubjects($teacher_id, $_SESSION['selected_sy']) ?></h1>
                        </div>
                    </div>
                    <a href="mysubjects.php">
                        <small class="text-muted">Check</small>
                    </a>

                </div> <!-- end of Subject Handled Card -->

                <!-- Class Handled Card -->
                <div class="class">
                    <span class="material-icons-sharp">class</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Handled Classes</h3>
                            <h1><?php echo countSections($teacher_id, $_SESSION['selected_sy']) ?></h1>
                        </div>
                    </div>
                    <a href="myclasses.php">
                        <small class="text-muted">Check</small>
                    </a>

                </div> <!-- end of Class Handled Card -->
            </div> <!-- end of Insights Card-->

            <!-- Class Table -->
            <div class="class-table">
                <h2>Class handled table</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Grade Level</th>
                            <th>Class Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($section_list > 0) { ?>
                            <?php foreach ($section_list as $section) : ?>
                                <tr>
                                    <td><?php echo getGradeLevel($section['gradelevel_id']) ?></td>
                                    <td><?php echo getSectionName($section['id'], $_SESSION['selected_sy']); ?></td>
                                    <?php if (GetYearStatus($section['sy']) == 'Yes') { ?>
                                        <td class="success"> Active </td>
                                    <?php } else { ?>
                                        <td class="danger"> Inactive </td>
                                    <?php } ?>
                                    <td>
                                        <a href="../view_section/view_class.php?section_id=<?php echo $section['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="View Class">
                                            <span class="material-icons-sharp">visibility</span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } else {

                            echo "<tr> <td></td><td>No sections</td> </tr>";
                        }
                        ?>


                    </tbody>
                </table>
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

            <?php if ($section_row > 0) { ?>

                <?php if ($section_row['gradelevel_id'] && getGradeLevel($section_row['gradelevel_id']) != 'KINDER') { ?>
                    <div class="date-submission">
                        <h2>View Grades Status</h2>
                        <?php if ($section_view_list > 0) { ?>
                            <?php foreach ($section_view_list as $section) : ?>
                                <div class="submit-date">
                                    <div class="icon">
                                        <span class="material-icons-sharp">event</span>
                                    </div>
                                    <div class="right">
                                        <div class="info">
                                            <h3><?php echo getGradeLevel($section['gradelevel_id']) ?> </h3>
                                            <small class="text-muted"><?php echo $section['sectionname'] ?></small>
                                        </div>

                                        <?php if ($section['is_view_enabled'] == 'Yes') {
                                            echo ' <h5 class="success">View Grade is Enabled</h5>';
                                        } else {
                                            echo ' <h5 class="danger">View Grade is Disabled</h5>';
                                        }

                                        ?>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        <?php } else {

                            echo "<tr><td>No Class Handled.</td> </tr>";
                        }
                        ?>
                    </div> <!-- end of view or date submission -->
            <?php } else {

                    echo "<tr> <td></td><td>No Class to show.</td> </tr>";
                }
            } ?>
        </div> <!-- end of Right -->

    </div> <!-- end of Main Container -->

    <!-- School Year Modal -->
    <div class="modal fade" id="symodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change School Year</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <label for="">School Year</label>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="change-sy" required>
                            <option value="" selected>Select a School Year</option>
                            <?php do { ?>
                                <option value="<?php echo $sy_row['SchoolYear'] ?>"><?php echo $sy_row['SchoolYear'] . ' (' . $sy_row['EnrollmentStatus'] . ')' ?></option>

                            <?php } while ($sy_row = $sy_res->fetch_assoc()); ?>
                        </select>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-save" name="btn-change-sy">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--=====================================================-->
    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!--=====================================================-->
    <!-- Sidebar Javascript-->
    <script src="../../js/res-sidenav/respons-side.js"></script>
    <!--=====================================================-->
</body>

</html>