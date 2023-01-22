<?php

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

// if (isset($_POST['generate-password-btn'])) {
    include_once('../../../connection/connection.php');

    // $grading = $_POST['grading-period'];
    // $section_id = $_POST['section-id'];

    
    $grading = $_POST['grading_period'];
    $section_id = $_POST['section_id'];

    // echo $grading . ' ' . $section_id;
        $counter = 0;
    
        $con = connection();
    
        $students_list = null;
    
        $sql = "SELECT * FROM enrollment_tbl WHERE section_id = '$section_id'";
        $res = $con->query($sql) or die($con->error);
    
        while ($row = $res->fetch_assoc()) {
    
        $student = $row['student_id'];
        $lrn = getStudentData($student, 'lrn');
        
        $sql1 = "SELECT * FROM `pupil_account_tbl` WHERE `pupil_id` = '$student'";
        $res1 = $con->query($sql1) or die($con->error);
        $row1 = $res1->fetch_assoc();
        if ($row1 == 0){
           
            $sql2 = "INSERT INTO `pupil_account_tbl`(`pupil_id`, `pupil_lrn`, `password`) VALUES ('$student','$lrn','student@123')";
            $con->query($sql2) or die($con->error);
    
            $counter++;
    
        }
    
        }
      
        echo $counter;
        // header ("Location: ../../view_section/view_class.php?section_id={$section_id}&summary_period={$grading}");
       
  // }






?>