<?php
if (!isset($_SESSION)){
    session_start();
}

include_once("../../connection/connection.php");
$con = connection();

$subject_id = $_SESSION['export_subject_id'];
$section_id = $_SESSION['export_section_id'];
$section_name = $_SESSION['export_section_name'];
$subject_name = $_SESSION['export_subject_name'];
$teacher_id = $_SESSION['teacherID'];
$teacher_name = getTeacherName($teacher_id);
$grd_lvl = $_SESSION['export_gradelvl'];
$quarter = $_SESSION['quarter'];


if($quarter == 'FIRST GRADING'){
    $lbl_quarter = "Q1";
}else if($quarter == 'SECOND GRADING'){
    $lbl_quarter = "Q2";
}else if($quarter == 'THIRD GRADING'){
    $lbl_quarter = "Q3";
}else if($quarter == 'FOURTH GRADING'){
    $lbl_quarter = "Q4";
}

$subject_code = getSubjectCode($subject_id);

function getTeacherName($teacher_id){
    $con = connection();

    $sql = "SELECT * FROM `teacher` WHERE `id` = '$teacher_id'";
    $teacher_res = $con->query($sql) or die($con->error);
    $teacher_row = $teacher_res->fetch_assoc();
    if($teacher_row > 0){
        return $teacher_row['name'];
    }
}
function getSubjectCode($subject_id){
    $con = connection();

  $sql = "SELECT * FROM `subject_tbl` WHERE `id` = '$subject_id'"; 
  $res = $con->query($sql) or die($con->error);

  $class_row = $res->fetch_assoc();

  if ($class_row > 0){
      return $class_row['subject_code'];
  }else{
    return 'None';
  }
}
  
// calls the autoload
require 'vendor/autoload.php';
// load phpspreadsheet class using namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// call IOFACTORY instead of xlsx writer
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;


// //=================================================================//

// // Load the Template
// // Load fro, xlsx template
$reader = IOFactory::createReader('Xlsx');
$spreadsheet = $reader->load('GMSTemplate.xlsx');

// loop the data
$contentStartRow = 11;
$currentContentRow = 12;
$currentContentRow_female = 12;

$male = array();
$female = array();

// add the content
// data from database

$sql = "SELECT * FROM `student_subject_record_tbl` WHERE section_id = '$section_id' AND subject_id = '$subject_id'"; 
$res = $con->query($sql) or die($con->error);
$row = $res->fetch_assoc();

$spreadsheet->getActiveSheet()
                    ->setCellValue('A8',$quarter)
                    ->setCellValue('E7',$teacher_name)
                    ->setCellValue('G4',$subject_name)
                    ->setCellValue('C4', $grd_lvl . ' - ' . $section_name);

do{
    $stud_id = $row['student_id'];

    $sql = "SELECT * FROM `student_tbl` WHERE id = '$stud_id' AND sex = 'Male' ORDER BY `lastname` ASC"; 
    $data_res = $con->query($sql) or die($con->error);

    $ctr = 0;
    while($data_row = $data_res->fetch_assoc()){
        $student_id = $data_row['id'];
        $student_grade_id = $row['id'];
        $student_name = strtoupper($data_row['lastname']) . ', ' . $data_row['firstname'] . ' ' . $data_row['middlename'] . '.';
        
        $male += array($student_name => $student_grade_id);
    }
    
}
while($row = $res->fetch_assoc());

ksort($male);
foreach ((array) $male as $m => $x) {
    $spreadsheet->getActiveSheet()
                    ->setCellValue('A'.$currentContentRow, $x)
                    ->setCellValue('B'.$currentContentRow, $m);
    $currentContentRow++;
}


$sql = "SELECT * FROM `student_subject_record_tbl` WHERE section_id = '$section_id' AND subject_id = '$subject_id'"; 
$res = $con->query($sql) or die($con->error);
$row = $res->fetch_assoc();
$female_student = null;

do{
    $stud_id = $row['student_id'];

    $sql = "SELECT * FROM `student_tbl` WHERE id = '$stud_id' AND sex = 'Female' ORDER BY `lastname` ASC"; 
    $data_res = $con->query($sql) or die($con->error);

    
    while($data_row = $data_res->fetch_assoc()){
        $student_id = $data_row['id'];
        $student_grade_id = $row['id'];
        $student_name = strtoupper($data_row['lastname']) . ', ' . $data_row['firstname'] . ', ' . $data_row['middlename'];

        $female += array($student_name => $student_grade_id);

    }
    
}
while($row = $res->fetch_assoc());

// echo '<br>';

ksort($female);
foreach ((array) $female as $f => $x) {
    $spreadsheet->getActiveSheet()
                    ->setCellValue('E'.$currentContentRow_female, $x)
                    ->setCellValue('F'.$currentContentRow_female, $f);
                    $currentContentRow_female++;
}
// =================================================================//

// set the header first. so the result will be treated as an excel file.
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

// // //make it an attachment so we can define filename
$newfile = $grd_lvl . ' - ' . $section_name . ' - ' . $subject_code . '(' . $lbl_quarter . ').xlsx';
header('Content-Disposition: attachment;filename="'. $newfile.'"');

// // //create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

// // // change worksheet name  (Important)
$spreadsheet->getActiveSheet()
->setTitle($subject_code);

// //save into php output
$writer->save('php://output');