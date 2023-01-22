<?php

if (!isset($_SESSION)) {
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


if ($quarter == 'FIRST GRADING') {
    $lbl_quarter = "Q1";
    $quarter_period = "1ST QUARTER";
} else if ($quarter == 'SECOND GRADING') {
    $lbl_quarter = "Q2";
    $quarter_period = "2ND QUARTER";
} else if ($quarter == 'THIRD GRADING') {
    $lbl_quarter = "Q3";
    $quarter_period = "3RD QUARTER";
} else if ($quarter == 'FOURTH GRADING') {
    $lbl_quarter = "Q4";
    $quarter_period = "4TH QUARTER";
}

$subject_code = getSubjectCode($subject_id);

function getTeacherName($teacher_id)
{
    $con = connection();

    $sql = "SELECT * FROM `teacher` WHERE `id` = '$teacher_id'";
    $teacher_res = $con->query($sql) or die($con->error);
    $teacher_row = $teacher_res->fetch_assoc();
    if ($teacher_row > 0) {
        return $teacher_row['name'];
    }
}
function getSubjectCode($subject_id)
{
    $con = connection();

    $sql = "SELECT * FROM `subject_tbl` WHERE `id` = '$subject_id'";
    $res = $con->query($sql) or die($con->error);

    $class_row = $res->fetch_assoc();

    if ($class_row > 0) {
        return $class_row['subject_code'];
    } else {
        return 'None';
    }
}

// School Year
$sy = $_SESSION['sy'];
$sql_sy = "SELECT * FROM `schoolyear_tbl` WHERE `id` = '$sy'";
$sy_res = $con->query($sql_sy) or die($con->error);
$sy_row = $sy_res->fetch_assoc();

if ($sy_row > 0) {
    // Get School Year
    $schoolyear = $sy_row['SchoolYear'];
}

// calls the autoload
require 'vendor/autoload.php';
// load phpspreadsheet class using namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// call IOFACTORY instead of xlsx writer
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

//=================================================================//

// Load the xlsx template
$reader = IOFactory::createReader('Xlsx');
if ($subject_name == 'Music' || $subject_name == 'Arts' || $subject_name == 'Physical Education' || $subject_name == 'Health') {
    $spreadsheet = $reader->load('mapeh.xlsx');
} else {
    $spreadsheet = $reader->load('orig.xlsx');
}

// loop the data
$contentStartRow = 11;
$currentContentRow = 12;
$currentContentRow_female = 63;

$male = array();
$female = array();

// add the content
// data from database

$sql = "SELECT * FROM `student_subject_record_tbl` WHERE section_id = '$section_id' AND subject_id = '$subject_id'";
$res = $con->query($sql) or die($con->error);
$row = $res->fetch_assoc();

if ($subject_name == 'Music' || $subject_name == 'Arts' || $subject_name == 'Physical Education' || $subject_name == 'Health') {
    $spreadsheet->getSheetByName("INPUT DATA")
        ->setCellValue('G4', 'V')
        ->setCellValue('O4', 'SORSOGON CITY')
        ->setCellValue('G5', 'SORSOGON PILOT ELEMENTARY SCHOOL')
        ->setCellValue('X4', 'SORSOGON WEST')
        ->setCellValue('X5', '114581')
        ->setCellValue('AG5', 'School-Year')
        ->setCellValue('S7', $teacher_name)
        ->setCellValue('K7', $grd_lvl . ' - ' . $section_name);

    $spreadsheet->getSheetByName("Summary of Quarterly Grades")
        ->setCellValue('F11', $quarter_period)
        ->setCellValue('J11', $quarter_period)
        ->setCellValue('N11', $quarter_period)
        ->setCellValue('R11', $quarter_period)
        ->setCellValue('V11', $quarter_period . 'LY GRADE');
    $spreadsheet->getSheetByName("MUSIC")
        ->setCellValue('A7', $quarter);
} else {
    $spreadsheet->getSheetByName("INPUT DATA")
        ->setCellValue('G4', 'V')
        ->setCellValue('O4', 'SORSOGON CITY')
        ->setCellValue('G5', 'SORSOGON PILOT ELEMENTARY SCHOOL')
        ->setCellValue('X4', 'SORSOGON WEST')
        ->setCellValue('X5', '114581')
        ->setCellValue('AG5', $schoolyear)
        ->setCellValue('S7', $teacher_name)
        ->setCellValue('AG7', $subject_name)
        ->setCellValue('K7', $grd_lvl . ' - ' . $section_name);
}

// For Male Data

do {
    $stud_id = $row['student_id'];

    $sql = "SELECT * FROM `student_tbl` WHERE id = '$stud_id' AND sex = 'Male' ORDER BY `lastname` ASC";
    $data_res = $con->query($sql) or die($con->error);

    $ctr = 0;
    while ($data_row = $data_res->fetch_assoc()) {
        $student_id = $data_row['id'];
        $student_grade_id = $row['id'];
        $lastname = $data_row['middlename'];
        $student_name = strtoupper($data_row['lastname']) . ', ' . $data_row['firstname'] . ', ' . $lastname[0] . '.';

        $male += array($student_name => $student_grade_id);
    }
} while ($row = $res->fetch_assoc());

ksort($male);
foreach ((array) $male as $m => $x) {
    $spreadsheet->getSheetByName("INPUT DATA")
        ->setCellValue('A' . $currentContentRow, $x)
        ->setCellValue('B' . $currentContentRow, $m);
    $currentContentRow++;
}

// For Female Data

$sql = "SELECT * FROM `student_subject_record_tbl` WHERE section_id = '$section_id' AND subject_id = '$subject_id'";
$res = $con->query($sql) or die($con->error);
$row = $res->fetch_assoc();
$female_student = null;

do {
    $stud_id = $row['student_id'];

    $sql = "SELECT * FROM `student_tbl` WHERE id = '$stud_id' AND sex = 'Female' ORDER BY `lastname` ASC";
    $data_res = $con->query($sql) or die($con->error);


    while ($data_row = $data_res->fetch_assoc()) {
        $student_id = $data_row['id'];
        $student_grade_id = $row['id'];
        $lastname = $data_row['middlename'];
        $student_name = strtoupper($data_row['lastname']) . ', ' . $data_row['firstname'] . ', ' . $lastname[0] . '.';

        $female += array($student_name => $student_grade_id);
    }
} while ($row = $res->fetch_assoc());

ksort($female);
foreach ((array) $female as $f => $x) {
    $spreadsheet->getSheetByName("INPUT DATA")
        ->setCellValue('A' . $currentContentRow_female, $x)
        ->setCellValue('B' . $currentContentRow_female, $f);
    $currentContentRow_female++;
}

// =================================================================//

// set the header first. so the result will be treated as an excel file.
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
if ($subject_name == 'Music' || $subject_name == 'Arts' || $subject_name == 'Physical Education' || $subject_name == 'Health') {

    $newfile = $grd_lvl . ' - ' . $section_name . ' - ' . 'MAPEH' . '(' . $lbl_quarter . ').xlsx';
} else {
    $newfile = $grd_lvl . ' - ' . $section_name . ' - ' . $subject_code . '.xlsx';
}

// $newfile  = $subject_name.".xlsx";
header('Content-Disposition: attachment;filename="' . $newfile . '"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

if ($subject_name == 'Music' || $subject_name == 'Arts' || $subject_name == 'Physical Education' || $subject_name == 'Health') {
    // change worksheet name  (Important)
    $spreadsheet->getSheetByName("MUSIC")
        ->setTitle("MUSIC_" . $lbl_quarter);
    $spreadsheet->getSheetByName("ARTS")
        ->setTitle("ARTS_" . $lbl_quarter);
    $spreadsheet->getSheetByName("PE")
        ->setTitle("PE_" . $lbl_quarter);
    $spreadsheet->getSheetByName("HEALTH")
        ->setTitle("HEALTH_" . $lbl_quarter);
}

//save into php output
$writer->save('php://output');
