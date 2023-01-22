<?php
ob_start();

if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION['teacherID'])) {

  $teacher_id = $_SESSION['teacherID'];
} else {
  echo "<script>alert('Please relogin Again')</script>";
  echo header("Location: ../../login/login.php");
}

$section_id = $_GET['section_id'];

if (!isset($_GET['summary_period'])) {

  echo header("Location: view_class.php?section_id={$section_id}&summary_period=1st_grade");
}

$summary_period = $_GET['summary_period'];

if (isset($_POST['btn-select-gp'])) {

  $selected = $_POST['select_grading_period'];

  if ($selected == "1st_grade") {
    echo header("Location: view_class.php?section_id={$section_id}&summary_period=1st_grade");
  } else if ($selected == "2nd_grade") {
    echo header("Location: view_class.php?section_id={$section_id}&summary_period=2nd_grade");
  } else if ($selected == '3rd_grade') {
    echo header("Location: view_class.php?section_id={$section_id}&summary_period=3rd_grade");
  } else if ($selected == '4th_grade') {
    echo header("Location: view_class.php?section_id={$section_id}&summary_period=4th_grade");
  } else if ($selected == 'final_grade') {
    echo header("Location: view_class.php?section_id={$section_id}&summary_period=final_grade");
  } else {
    echo header("Location: view_class.php?section_id={$section_id}&summary_period=1st_grade");
  }
}

/* MySQL Connection */
include_once("../../connection/connection.php");
$con = connection();

$grade_lvl = 0;

$sql_section = "SELECT * FROM `section_tbl` WHERE `id` = '$section_id'";

$res = $con->query($sql_section) or die($con->error);
$section_row = $res->fetch_assoc();

if ($section_row > 0) {

  if ($section_row['gradelevel_id'] == 1) {
    $grade_lvl = 0;
  } else if ($section_row['gradelevel_id'] == 2) {
    $grade_lvl = 1;
  } else if ($section_row['gradelevel_id'] == 3) {
    $grade_lvl = 2;
  } else if ($section_row['gradelevel_id'] == 4) {
    $grade_lvl = 3;
  } else if ($section_row['gradelevel_id'] == 5) {
    $grade_lvl = 4;
  } else if ($section_row['gradelevel_id'] == 6) {
    $grade_lvl = 5;
  } else if ($section_row['gradelevel_id'] == 7) {
    $grade_lvl = 6;
  }

  $_SESSION['export_gradelvl'] = getGradeLevel($section_row['gradelevel_id']);
} else {
  echo 'Oops! No Section Found.';
}

$students_list = null;

$sql_enrollment = "SELECT * FROM enrollment_tbl WHERE section_id = '$section_id'";
$enrollment_res = $con->query($sql_enrollment) or die($con->error);

while ($enrollment_row = $enrollment_res->fetch_assoc()) {

  $students_list[] = $enrollment_row;
}

function getStudentData($pupil_id, $type)
{
  $con = connection();

  $sql = "SELECT * FROM `student_tbl` WHERE id = '$pupil_id'";
  $res = $con->query($sql) or die($con->error);
  $row = $res->fetch_assoc();
  if ($row > 0) {
    return $row[$type];
  }
}

// Get Grade Level ID
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

function countSubject($section_id)
{
  $con = connection();

  $sql = "SELECT COUNT(`subject_id`) FROM subject_assigned_section_tbl WHERE section_id = '$section_id'";
  $res = $con->query($sql) or die($con->error);
  $row = $res->fetch_row()[0];
  if ($row > 0 && $row < 10) {
    $tmp = "0{$row}";
    return $tmp;
  } else {
    return $row;
  }
}


function countPupil($section_id)
{
  $con = connection();

  $sql = "SELECT COUNT(`student_id`) FROM enrollment_tbl WHERE section_id = '$section_id'";
  $res = $con->query($sql) or die($con->error);
  $row = $res->fetch_row()[0];
  if ($row > 0 && $row < 10) {
    $tmp = "0{$row}";
    return $tmp;
  } else {
    return $row;
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

// C O D E  S E C T I O N  F O R  S U M M A R R Y  O F  G R A D E S

$pupils_in_section = null;

$sql = "SELECT DISTINCT student_id FROM `student_subject_record_tbl` WHERE `section_id` = '$section_id'";

$pis_res = $con->query($sql) or die($con->error);
while ($pis_row = $pis_res->fetch_assoc()) {
  $pupils_in_section[] = $pis_row;
}

$pupil_subjects = null;
$subject_subject_id = null;
$indexCounter = 0;

$sql = "SELECT DISTINCT subject_id FROM `student_subject_record_tbl` WHERE `section_id` = '$section_id'";

$pis_res = $con->query($sql) or die($con->error);
while ($pis_row = $pis_res->fetch_assoc()) {
  $pupil_subjects[] = $pis_row;
}


function selectSubjectName($subject_id)
{

  $con = connection();

  $sql = "SELECT * FROM `subject_tbl` WHERE `id` = '$subject_id'";

  $res = $con->query($sql) or die($con->error);
  $subject = $res->fetch_assoc();

  if ($subject > 0) {
    print $subject['subject_name'];
  }
}


function pupilGrade($student_id, $subject_id, $quarterly_grade)
{
  $con = connection();

  $sql = "SELECT * FROM `student_subject_record_tbl` WHERE `student_id` = '$student_id' AND subject_id = '$subject_id'";

  $res = $con->query($sql) or die($con->error);
  $row = $res->fetch_assoc();

  return $row[$quarterly_grade];
}

function getPupilName($student_id)
{
  $con = connection();

  $sql = "SELECT * FROM `student_tbl` WHERE `id` = '$student_id' ORDER BY `lastname` ASC";

  $res = $con->query($sql) or die($con->error);
  $row = $res->fetch_assoc();

  $fullname = $row['lastname'] . ', ' . $row['firstname'] . ' ' . $row['middlename'];
  return $fullname ? $fullname : 'empty';
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

// For Subject Info
include '../functions/subjectinfo.php';
// For Selecting Subject Teacher
include '../functions/subjectteacher.php';

// For Saving Subject Teacher 
include '../functions/save_subject_teacher.php';

// For Teacher Info 
$sql = "SELECT * FROM `teacher` WHERE `id` = '$teacher_id'";
$teacher_res = $con->query($sql) or die($con->error);
$teacher_row = $teacher_res->fetch_assoc();

// For pupil's Account


// Logout Button 
if (isset($_POST['btn-logout'])) {
  session_destroy();
  echo header("Location ../../login/login.php");
}

$tmp1 = getGradeLevel(getGradeLevelID($section_id));
?>

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
  <script type="text/javascript" src="../../js/teacher/summary/change_gp.js"></script>
  <script src="../../js/theme/load-theme.js"></script>

  <!--=====================================================-->

  <title>Grades Management System</title>
</head>

<body>
  <!--=====================================================-->
  <!-- Main Container -->
  <input type="hidden" value="<?php echo $section_id ?>" id="current-section-id">
  <input type="hidden" value="<?php echo $summary_period ?>" id="summary-id">
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
        <a href="../main_page/myclasses.php" class="active">
          <span class="material-icons-sharp">class</span>
          <h3>My Classes</h3>
        </a> <!-- end of My Classes -->

        <!-- My Subjects -->
        <a href="../main_page/mysubjects.php">
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
      <h1>My Classes</h1>
      <!-- Breadcrumbs -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../main_page/myclasses.php">My Classes</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo getSectionName($section_id) ?></li>
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
          <a href="../main_page/myclasses.php">
            <small class="text-muted">GO BACK</small>
          </a>

        </div> <!-- end of Class Handled Card -->

        <!-- Class Pupil Handled Card -->
        <div class="pupil">
          <span class="material-icons-sharp">child_care</span>
          <div class="middle">
            <div class="left">
              <h3>Class Pupils</h3>
              <h1><?php echo countPupil($section_id) ?></h1>
            </div>
          </div>
          <small class="text-muted">
            <form action="../functions/view/set_view_status.php" method="POST">
              <input type="hidden" value="<?php echo $section_row['is_view_enabled'] ?>" name="is_view_enabled">
              <input type="hidden" value="<?php echo $section_id ?>" name="class_id">
              <input type="hidden" value="<?php echo $summary_period ?>" name="sum">
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#viewGrades">
                <?php
                if ($tmp1 != 'KINDER') {
                  if ($section_row['is_view_enabled'] == 'No') {
                    echo '<h3 style="border:1px #FF7782 dashed; color: #FF7782; padding:3px; border-radius: 20px">View Grades is OFF</h3>';
                  } else {
                    echo '<h3 style="border:1px #41F1B6 dashed; color: #41F1B6; padding:3px; border-radius: 20px">View Grades is ON</h3>';
                  }
                }
                ?>
              </button>
            </form>

          </small>
        </div> <!-- end of Class Pupil Handled Card -->

        <!-- Subject Handled Card -->
        <div class="subject">
          <span class="material-icons-sharp">menu_book</span>
          <div class="middle">
            <div class="left">
              <h3>Class Subjects</h3>
              <h1><?php echo countSubject($section_id) ?></h1>
            </div>
          </div>

          <small class="text-muted">
            <?php if ($tmp1 != 'KINDER') { ?>
              <button class="btn btn-save" data-bs-toggle="modal" data-bs-target="#manageSubjectModal">
                Manage Subjects
              </button>
            <?php } ?>
          </small>
        </div> <!-- end of Subject Handled Card -->
      </div> <!-- end of Insights Card-->

      <!-- Class Table -->
      <div class="class-table">

        <h2>My Pupils</h2>
        <table class="table-responsive">
          <thead>
            <tr>
              <th hidden>student_id</th>
              <th>LRN</th>
              <th>Pupil's Name</th>
              <th>Gender</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($students_list > 0) {
              foreach ($students_list as $student) : ?>
                <tr>
                  <td hidden> <?php echo getStudentData($student['student_id'], 'id'); ?></td>
                  <td><?php echo getStudentData($student['student_id'], 'lrn'); ?></td>
                  <?php
                  $full_name = getStudentData($student['student_id'], 'firstname') . ' ' . getStudentData($student['student_id'], 'lastname');
                  ?>
                  <td><?php echo $full_name; ?></td>
                  <td class=""><?php echo getStudentData($student['student_id'], 'sex'); ?></td>
                  <?php if ($tmp1 != 'KINDER') { ?>
                    <td>
                      <a>
                        <span class="material-icons-sharp btn-pupil-subjects" data-bs-toggle="modal" data-bs-target="#addSubjectModalTransferee" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Subjects">add</span>
                      </a>
                    </td>
                    <td>
                      <a>
                        <button class="btn pupil_account__get" style="background: transparent;">
                          <span class="material-icons-sharp" data-bs-toggle="modal" data-bs-target="#pupilAccountModal" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Account">key</span>
                        </button>
                      </a>
                    </td>

                    <td>
                      <a>
                        <span class="material-icons-sharp btn-generate-card" data-bs-toggle="modal" data-bs-target="#generateCard" data-bs-toggle="tooltip" data-bs-placement="top" title="Generate Report Card">badge</span>
                      </a>
                    </td>
                </tr>
              <?php } ?>
            <?php endforeach; ?>
          <?php } else {
              echo "<tr> <td></td><td>No students on this class yet.</td> </tr>";
            } ?>
          </tbody>
        </table>
        <?php if ($students_list > 0 && $tmp1 != 'KINDER') { ?>
          <form id="pupil_account__generate" method="POST">
            <input type="hidden" id="section-id" name="section-id" value="<?php echo $section_id ?>">
            <input type="hidden" id="grading-period" name="grading-period" value="<?php echo $summary_period ?>">
            <button type="submit" name="generate-password-btn" class="btn btn-save mt-3" style="color: white;">Generate Pupil's Password</button>
          </form>
        <?php } ?>
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
      <?php if ($tmp1 != 'KINDER') { ?>
        <div class="summary-grades">
          <h2>Summary of Grades</h2>
          <div class="summary">
            <div class="icon">
              <span class="material-icons-sharp">assessment</span>
            </div>
            <div class="right">
              <div class="info">
                <select class="form-select" aria-label="Default select example" id="select-gp">
                  <option value="1st_grade">First Grading</option>
                  <option value="2nd_grade">Second Grading</option>
                  <option value="3rd_grade">Third Grading</option>
                  <option value="4th_grade">Fourth Grading</option>
                  <option value="final_grade">Final Grade</option>
                </select>
                <br>
                <button class="btn btn-save" id="btn-select-gp" data-bs-toggle="modal" data-bs-target="#summaryGradeModal">
                  View Summary of Grades
                </button>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div> <!-- end of Right -->
  </div> <!-- end of Main Container -->
  <!-- ==================================================================================== -->
  <!-- Manage Subject Modal -->
  <div class="modal fade" id="manageSubjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Manage Subjects</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- to get the subjects -->
          <?php
          $sql = "SELECT * FROM `subject_assigned_section_tbl` WHERE `section_id` = '$section_id'";
          $section_subject_res = $con->query($sql);
          $section_subject_row = $section_subject_res->fetch_assoc();
          ?>
          <h3>Subjects</h3>
          <?php if ($section_subject_row > 0) { ?>
            <?php do { ?>
              <label class="form-check-label" for="flexCheckChecked">
                <?php echo selectSubjectName($section_subject_row['subject_id']) ?>
              </label><br>
            <?php } while ($section_subject_row = $section_subject_res->fetch_assoc()) ?>
          <?php } else {
            if ($grade_lvl != 0) {
              echo "Your section has no subjects yet.";
            } else {
              echo "Sorry, you can't add subjects to a Kinder Class.";
            }
          } ?>
        </div>
        <di0v class="modal-footer">
          <?php if ($grade_lvl != 0) { ?>
            <button class="btn btn-save" data-bs-toggle="modal" data-bs-target="#addSubjectModal">Add Subjects</button>
            <button class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#deleteSubjectModal">Remove Subjects</button>
            <button class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#editSubjectTeacherModal">Edit Subject Teachers</button>
          <?php } ?>
      </div>
    </div>
  </div>
  </div>

  <!--=====================================================-->

  <!-- Add Subject Modal -->
  <div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Subjects</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../functions/add/add_section_subjects.php" method="POST">
            <input type="hidden" value="<?php echo $section_id ?>" name="section_id">
            <input type="hidden" value="<?php echo $grade_lvl ?>" name="grade_level">
            <input type="hidden" value="<?php echo $summary_period ?>" name="summary">
            <div class="row">

              <div class="col-12">
                <label for="" class="form-label">Subjects</label>
                <div class="form-check">

                  <!-- to get the subjects -->

                  <?php

                  $sql = "SELECT * FROM `subject_tbl` WHERE `subject_grade_lvl` = '$grade_lvl'";
                  $res = $con->query($sql);
                  $subject_row = $res->fetch_assoc();

                  $has_mapeh = 0;
                  ?>

                  <?php if ($subject_row > 0) { ?>

                    <?php do { ?>
                      <input class="form-check-input" type="checkbox" value="<?php echo $subject_row['id']; ?>" name="subjects[]">
                      <label class="form-check-label" for="flexCheckChecked">
                        <?php echo $subject_row['subject_name'] ?>
                      </label><br>
                    <?php } while ($subject_row = $res->fetch_assoc()); ?>

                  <?php } else {
                    echo 'No Subjects found.';
                  } ?>


                </div>
                <hr>
                <p><i>Note:</i> KINDER Grade Level has no subjects to show. Only Grade 1 - Grade 6 has subjects to show</p>

              </div>

            </div>
        </div>

        <div class="modal-footer">
          <?php if ($grade_lvl != 0) { ?>
            <button type="submit" class="btn btn-save">Add a Subjects</button>
          <?php } ?>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!--=====================================================-->

  <!-- Delete Subject Modal -->
  <div class="modal fade" id="deleteSubjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Remove Subjects</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../functions/delete/delete_subject.php" method="POST">

            <!-- to get the subjects -->
            <?php
            $sql = "SELECT * FROM `subject_assigned_section_tbl` WHERE `section_id` = '$section_id'";
            $section_subject_res = $con->query($sql);
            $section_subject_row = $section_subject_res->fetch_assoc();
            ?>
            <input type="hidden" value="<?php echo $section_id ?>" name="section_id_2">
            <input type="hidden" value="<?php echo $summary_period ?>" name="sum_2">
            <?php if ($section_subject_row > 0) { ?>

              <?php do { ?>

                <input class="form-check-input" type="checkbox" value="<?php echo $section_subject_row['id']; ?>" name="subjects_id[]">
                <label class="form-check-label" for="flexCheckChecked">
                  <?php echo selectSubjectName($section_subject_row['subject_id']) ?>
                </label><br>
              <?php } while ($section_subject_row = $section_subject_res->fetch_assoc()) ?>

            <?php } else {
              echo 'No Subjects found.';
            }
            ?>

        </div>
        <div class="modal-footer">
          <button type="submit" name="delete_subjects" class="btn btn-save">Remove Selected Subjects</button>
          <!-- <button type="button" name="delete_pupil_subjects" class="btn btn-save">Delete Pupil's Subject Data</button> -->
        </div>
        </form>
      </div>
    </div>
  </div>

  <!--=====================================================-->

  <!-- Edit Subject Teacher Modal -->
  <div class="modal fade" id="editSubjectTeacherModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Subject Teachers</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <div class="row">

              <!-- SQL for read all subjects -->
              <?php
              $sql = "SELECT * FROM `subject_tbl` WHERE `subject_code` AND `subject_grade_lvl` NOT IN (SELECT `subject_code` FROM `subject_assigned_section_tbl` WHERE `section_id` = '$section_id')";

              $res = $con->query($sql) or die($con->error);
              $subject_row = $res->fetch_assoc();

              ?>

              <div class="col-12">
                <?php

                $subject_ctr = 0;
                $sql = "SELECT * FROM `subject_assigned_section_tbl` WHERE `section_id` = '$section_id'";
                $subjects_res = $con->query($sql) or die($con->error);
                $subjects_row = $subjects_res->fetch_assoc();

                ?>

                <?php if ($subjects_row != 0) { ?>
                  <?php do {
                    $subject_ctr++;
                  ?>
                    <div class="input-group mb-3">
                      <label class="input-group-text" for="inputGroupSelect01"><?php echo selectSubject($subjects_row['subject_id']) ?></label>
                      <input type="hidden" name="subject_id<?php echo $subject_ctr ?>" value="<?php echo $subjects_row['id'] ?>">
                      <select class="form-select" name="assigned_teacher<?php echo $subject_ctr ?>">
                        <?php if ($subjects_row['subject_teacher'] == null) { ?>
                          <option selected value="null">Choose a Subject Teacher</option>
                        <?php } else { ?>
                          <option value="<?php echo $subjects_row['subject_teacher'] ?>"><?php echo selectsubjectTeacher($subjects_row['subject_teacher']) ?></option>
                        <?php } ?>
                        <?php

                        $sql = "SELECT * FROM `teacher` WHERE `gradetohandle` IS NOT NULL";
                        $res = $con->query($sql) or die($con->error);
                        $row = $res->fetch_assoc();

                        do {
                        ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?> </option>
                        <?php } while ($row = $res->fetch_assoc()) ?>

                        $subject_ctr++;
                      </select>
                    </div>
                <?php } while ($subjects_row = $subjects_res->fetch_assoc());

                  if (isset($_POST['save_teacher'])) {

                    saveSubjectTeacher($section_id, $subject_ctr);
                    $tmp = "Location: ../view_section/view_class.php?section_id={$section_id}&summary_period=" . $summary_period;
                    echo header($tmp);
                  }
                } else {
                  echo 'This Class No Subjects registed yet.';
                }
                ?>

              </div>

            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="save_teacher" class="btn btn-save">Save Subject Teacher</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!--=====================================================-->

  <!-- Add Subject for New Pupil Modal -->
  <div class="modal fade" id="addSubjectModalTransferee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Subjects to this Pupil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="../functions/add/add_subject_trans.php" method="POST">

            <input type="hidden" name="student_id_1" id="student_id_1">
            <input type="hidden" value="<?php echo $section_id ?>" name="section_id_1">
            <input type="hidden" value="<?php echo $grade_lvl - 1 ?>" name="grade_level_1">
            <input type="hidden" value="<?php echo $summary_period ?>" name="summary_1">
            <div class="row">

              <div class="col-12">
                <label for="" class="form-label">Subjects assigned to this pupil</label>
                <div class="form-check">

                  <!-- to get the subjects -->

                  <?php
                  $sql = "SELECT * FROM `subject_assigned_section_tbl` WHERE `section_id` = '$section_id'";
                  $section_subject_res = $con->query($sql);
                  $section_subject_row = $section_subject_res->fetch_assoc();
                  ?>
                  <input type="hidden" value="<?php echo $classID ?>" name="section_id_2">
                  <?php if ($section_subject_row > 0) { ?>

                    <?php do { ?>

                      <input class="form-check-input" type="checkbox" value="<?php echo $section_subject_row['subject_id']; ?>" name="subjects_1[]">
                      <label class="form-check-label" for="flexCheckChecked">
                        <?php echo selectSubjectName($section_subject_row['subject_id']) ?>
                      </label><br>
                    <?php } while ($section_subject_row = $section_subject_res->fetch_assoc()) ?>

                  <?php } else {
                    echo 'No Subjects found.';
                  }
                  ?>
                </div>
              </div>



            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-save">Add Subjects</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!--=====================================================-->

  <!-- Summary of Grades Modal -->
  <div class="modal fade" id="summaryGradeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Summary of Grades</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="padding: 15px;">
          <?php

          $sum = $_GET['summary_period'];
          if ($sum == "1st_grade") {
            $lbl_period = "FIRST GRADING";
          } else if ($sum == "2nd_grade") {
            $lbl_period = "SECOND GRADING";
          } else if ($sum == '3rd_grade') {
            $lbl_period = "THIRD GRADING";
          } else if ($sum == '4th_grade') {
            $lbl_period = "FOURTH GRADING";
          } else if ($sum == 'final_grade') {
            $lbl_period = "FINAL GRADE";
          } else {
            $lbl_period = "";
          }

          echo "<h1>{$lbl_period}</h1>"

          ?>
          <!-- T A B L E-->
          <h3><b>Grade Level & SECTION:</b>&nbsp;<?php echo GetGradeLevel($grade_lvl + 1) . ' ' . getSectionName($section_id) ?></h3>
          <table id="spes_table" class="table table-bordered caption-top" style="width:100%; text-align:center; ">
            <caption>Summary of Grades of section <?php echo getSectionName($section_id) ?></caption>
            <?php if ($pupil_subjects > 0) { ?>
              <thead style="background-color: #E75858; color: white;">
                <tr>
                  <th>Pupil's Name</th>

                  <?php foreach ($pupil_subjects as $data) { ?>
                    <th>
                      <?php echo selectSubjectName($data['subject_id']) ?>
                      <?php $subject_id[] = $data['subject_id'] ?>
                    </th>

                  <?php
                    $indexCounter++;
                  }
                  ?>
                  <th>
                    MAPEH
                  </th>

                </tr>

              </thead>

              <tbody style="color: var(--color-dark);">

                <?php $ctr = 0 ?>
                <?php foreach ($pupils_in_section as $pis) : ?>
                  <tr>
                    <?php $pupil_grade = null; ?>

                    <td><?php echo getPupilName($pis['student_id']) ?></td>

                    <?php
                    for ($i = 0; $i < $indexCounter; $i++) {
                      echo '<td>';
                      echo pupilGrade($pis['student_id'], $subject_id[$i], $summary_period);
                      echo '</td>';
                    }
                    ?>

                    <?php

                    $music = getMAPEHsubject($pis['student_id'], $section_id, $summary_period, 'music');
                    $arts = getMAPEHsubject($pis['student_id'], $section_id, $summary_period, 'arts');
                    $pe = getMAPEHsubject($pis['student_id'], $section_id, $summary_period, 'pe');
                    $health = getMAPEHsubject($pis['student_id'], $section_id, $summary_period, 'health');
                    $mapeh_grade = 0;

                    $mapeh_count = 0;
                    if ($music > 0) $mapeh_count++;
                    if ($arts > 0) $mapeh_count++;
                    if ($pe > 0) $mapeh_count++;
                    if ($health > 0) $mapeh_count++;

                    if ($mapeh_count > 0) {
                      $mapeh_grade = ($music + $arts + $pe + $health) / $mapeh_count;
                    } else {
                      $mapeh_grade = 0;
                    }
                    ?>

                    <?php if ($mapeh_count > 0) { ?>
                      <?php $rounded_mapeh_grade = round($mapeh_grade) ?>
                      <td> <?php echo $rounded_mapeh_grade ?></td>
                    <?php } else {
                      echo '<td>0</td>';
                    } ?>

                  </tr>

                <?php endforeach; ?>

              <?php } else {
              echo "Add subjects to this section first.";
            }
              ?>

              </tbody>

          </table>
          <!-- end of T A B L E-->
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          <?php if ($pupil_subjects > 0) { ?>

            <a href="../print_section/print_summary.php?id=<?php echo $section_id ?>&summary=<?php echo $summary_period ?>" target="_blank">
              <button type="button" class="btn btn-save">
                <span class="material-icons-sharp">print</span>
                Print
              </button>
            </a>

          <?php } ?>

        </div>
      </div>
    </div>
  </div>
  <!--=====================================================-->
  <!-- Pupil Account Modal -->
  <div class="modal fade" id="pupilAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Manage Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../functions/password/change_pupil_password.php" class="pupil_account__set" method="POST">
            <input type="hidden" id="student_id_2" name="pupil_id">
            <input type="hidden" name="section" value="<?php echo $section_id ?>">
            <input type="hidden" name="summary" value="<?php echo $summary_period ?>">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Default Username(LRN):</label>
              <input type="text" class="form-control" id="pupil_lrn" readonly />
            </div>
            <?php
            ?>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Pupil Password</label>
              <input type="text" class="form-control" name="pupil_pass" placeholder="Enter Pupil Password" id="change-password__text" required />
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-save">Change Pupil Password</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!--=====================================================-->
  <!-- View Grades Modal -->
  <div class="modal fade" id="viewGrades" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View Grade Settings</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../functions/update/update_view_grades.php" method="POST">

            <input type="hidden" value="<?php echo $section_id ?>" name="section_id_2">
            <input type="hidden" value="<?php echo $summary_period ?>" name="summary_2">

            View Mode is <br>

            <div class="view-buttons" style="display: flex;">

              <div class="form-check form-switch">
                <?php if ($section_row['is_view_enabled'] == 'Yes') { ?>
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="viewmodeOn" checked>
                <?php } else { ?>
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="viewmodeOn">
                <?php } ?>
                <label class="form-check-label" for="flexSwitchCheckDefault">Enable Viewing of Grade</label>
              </div>

            </div>

            <hr>
            Pick Grading Period
            <br>
            <div class="form-check">
              <?php if ($section_row['view_quarter1'] == 'Yes') { ?>
                <input class="form-check-input" type="checkbox" name="first_view_grading" value="Yes" checked>
              <?php } else { ?>
                <input class="form-check-input" type="checkbox" name="first_view_grading" value="No">
              <?php } ?>
              <label class="form-check-label" for="flexCheckDefault">
                First Grading
              </label>
            </div>
            <div class="form-check">
              <?php if ($section_row['view_quarter2'] == 'Yes') { ?>
                <input class="form-check-input" type="checkbox" name="second_view_grading" value="Yes" checked>
              <?php } else { ?>
                <input class="form-check-input" type="checkbox" name="second_view_grading" value="No">
              <?php } ?>

              <label class="form-check-label" for="flexCheckDefault">
                Second Grading
              </label>
            </div>
            <div class="form-check">
              <?php if ($section_row['view_quarter3'] == 'Yes') { ?>
                <input class="form-check-input" type="checkbox" name="third_view_grading" value="Yes" checked>
              <?php } else { ?>
                <input class="form-check-input" type="checkbox" name="third_view_grading" value="No">
              <?php } ?>

              <label class="form-check-label" for="flexCheckDefault">
                Third Grading
              </label>
            </div>
            <div class="form-check">
              <?php if ($section_row['view_quarter4'] == 'Yes') { ?>
                <input class="form-check-input" type="checkbox" name="fourth_view_grading" value="Yes" checked>
              <?php } else { ?>
                <input class="form-check-input" type="checkbox" name="fourth_view_grading" value="No">
              <?php } ?>
              <label class="form-check-label" for="flexCheckDefault">
                Fourth Grading
              </label>
            </div>
            <div class="form-check">
              <?php if ($section_row['view_final'] == 'Yes') { ?>
                <input class="form-check-input" type="checkbox" name="final_view_grading" value="Yes" checked>
              <?php } else { ?>
                <input class="form-check-input" type="checkbox" name="final_view_grading" value="No">
              <?php } ?>
              <label class="form-check-label" for="flexCheckDefault">
                Final Grade
              </label>
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-save">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- View Profile Modal -->
  <div class="modal fade" id="generateCard" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="generateCard">Generate Pupil Report Card</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="../phpspreadsheet/exportcard.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="grading_period" value="<?php echo $summary_period ?>">
            <input type="hidden" id="student_id_3" name="pupil_id">
            <input type="hidden" id="pupil_lrn_1" name="pupil_lrn">

            <?php
            $quarter = $_GET['summary_period'];
            $period = '';
            if ($quarter == "1st_grade") {
              $period = "First Quarter";
            } else if ($quarter == "2nd_grade") {
              $period = "First to Second Quarter";
            } else if ($quarter == '3rd_grade') {
              $period = "First to Third Quarter";
            } else if ($quarter == '4th_grade') {
              $period = "First to Fourth Quarter";
            } else if ($quarter == 'final_grade') {
              $period = "Whole Final Grade";
            } else {
              $period = "";
            }

            echo '<h5>Exporting Report Card: <b>' . $period . '</b></h5>';
            ?>
            <p>Are you sure you want to generate the card of this pupil?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-delete" data-bs-dismiss="modal">Close</button>
            <?php if ($tmp1 != 'KINDER') { ?>
              <button type="submit" class="btn btn-save">Generate Report Card</button>
            <?php } ?>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--===============================-->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <div class="toasticon me-2">
          <img src="../../img/logo/speslogo.png" class="" alt="...">
        </div>
        <strong class="me-auto">SPES Grades Management System</strong>
        <small>just now</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        <p id="toast-generateAccount"></p>
        <p><i>Generated Default Password:</i><b> student@123</b></p>
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

  <script>
    $('.btn-pupil-subjects').on('click', function() {

      $ts = $(this).closest('tr');

      var data = $ts.children("td").map(function() {
        return $(this).text();
      }).get();

      $('#student_id_1').val(data[0]);

    });
    //===============================================//
    $('.pupil_account__get').on('click', function(e) {
      e.preventDefault()
      $ts = $(this).closest('tr');

      var data = $ts.children("td").map(function() {
        return $(this).text();
      }).get();

      $('#student_id_2').val(data[0]);
      $('#pupil_lrn').val(data[1]);

      var id = data[0];

      $.ajax({
        url: '../functions/password/get_pupil_password.php',
        method: "POST",
        data: {
          student_id: id
        },
        beforeSend: function() {

        },
        success: function(res) {
          if (res) {
            $('#change-password__text').val(res)
          } else {
            $('#change-password__text').val('')
          }
        }
      })
    });
    //===============================================//
    $('#pupil_account__generate').on('submit', function(e) {
      e.preventDefault()

      var gp = $('#grading-period').val()
      var sec_id = $('#section-id').val()

      $.ajax({
        url: '../functions/password/generaterandom.php',
        method: "POST",
        data: {
          grading_period: gp,
          section_id: sec_id
        },
        beforeSend: function() {

        },
        success: function(res) {
          $("#liveToast").toast("show");
          $('#toast-generateAccount').html('Successfully created <strong>' + res + '</strong> new accounts.')
          // alert('Success')
        }
      })
    });
    //===============================================//
    $('.btn-generate-card').on('click', function() {

      $ts = $(this).closest('tr');

      var data = $ts.children("td").map(function() {
        return $(this).text();
      }).get();

      $('#student_id_3').val(data[0]);
      $('#pupil_lrn_1').val(data[1]);

    });
    //===============================================//
  </script>
  <!--=====================================================-->
</body>

</html>