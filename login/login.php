<?php

if (!isset($_SESSION)){
  session_start();
}

include_once("../connection/connection.php");
$con = connection(); 

$has_error_teacher = 0;
$has_error_pupil = 0;

// Login Teacher
if (isset($_POST['login_teacher'])){

  $user = mysqli_escape_string($con, $_POST['userID']);
  $pass = mysqli_escape_string($con, $_POST['userPass']); 

  $sql = "SELECT * 
  FROM users
  WHERE `username` = '$user' AND `password` = '$pass' AND `role` = 'Teacher' AND `status` = 'Active'";
  
  $res = $con->query($sql) or die ($con->error);
  $teacher_user_row = $res->fetch_assoc();

  if ($teacher_user_row > 0){
      
      $_SESSION['teacherID'] = $teacher_user_row['id'];
      $_SESSION['teacher_image'] = $teacher_user_row['image'];
      echo header("Location: ../teacher/main_page/dashboard.php");
      
  }else{
    
      // echo "<script>alert('No User Account found, Please try again') </script>";
      $has_error_teacher = 1;
  }

}

// Login Pupil
if (isset($_POST['login_pupil'])){

  $user = mysqli_escape_string($con, $_POST['pupilLRN']);
  $pass = mysqli_escape_string($con, $_POST['pupilPass']);

  $sql = "SELECT * FROM `pupil_account_tbl` WHERE `pupil_lrn` = '$user' AND `password` = '$pass' AND `status` = 'Active'";
  $res = $con->query($sql) or die ($con->error);
  $row = $res->fetch_assoc();

  if ($row > 0){

      $sql = "SELECT * FROM student_tbl WHERE lrn = '$user'";
      
      $pupil_res = $con->query($sql) or die ($con->error);
      $pupil_row = $pupil_res->fetch_assoc();
              
      $_SESSION['pupilID'] = $pupil_row['id'];

      echo header("Location: ../pupil/main_page/dashboard.php");
              
  }else{

    // echo "<script>alert('No User Account found, Please try again') </script>";
    $has_error_pupil = 1;
  }
  

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Website Logo -->
    <link rel="shortcut icon" type="x-icon" href="../img/logo/speslogo.png">
    <!-- end of Website Logo -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../css/login/login.css" />
    <title>Grades Management System</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form" method="POST">

            <h2 class="title">Login as a Teacher</h2>
          <?php if($has_error_teacher): ?>
            <div class="error-msg">
              <p>Incorrect username or password</p>
            </div>
            <?php endif ?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="userID" autocomplete="off" maxlength="20" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="userPass" autocomplete="off" maxlength="20" required />
            </div>
            <input type="submit" value="Login" class="btn solid" name="login_teacher" />
            <p class="social-text">forgot password? Contact Admin</p>
            
          </form>

          <form action="#" class="sign-up-form" method="POST">

            <h2 class="title">Login as a Pupil</h2>
            <?php if($has_error_pupil): ?>
            <div class="error-msg">
              <p>Incorrect username or password</p>
            </div>
            <?php endif ?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="LRN" name="pupilLRN" autocomplete="off" maxlength="20" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="pupilPass" autocomplete="off" maxlength="20" required />
            </div>
            <input type="submit" class="btn" value="Login" name="login_pupil" />
            <p class="social-text">Forgot password? Contact your Advisory Teacher</p>

          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <img src="../img/logo/speslogo.png" class="logo" width="90px" height="90px">
            <h4 style="font-weight: 400;"> <b>Grades Management System</b></h4>
            <p>
              Sorsogon Pilot Elementary School
            </p>
            <button class="btn transparent" id="sign-up-btn">
              I'm a Pupil
            </button>
          </div>
          <img src="../img/login/teacher.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <img src="../img/logo/speslogo.png" class="logo" width="90px" height="90px">
            <h4 style="font-weight: 400;"> <b>Grades Management System</b></h4>
            <p>
              Sorsogon Pilot Elementary School
            </p>
            <button class="btn transparent" id="sign-in-btn">
              I'm a Teacher
            </button>
          </div>
          <img src="../img/login/Pupil.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="../js/login/login.js"></script>
  </body>
</html>
