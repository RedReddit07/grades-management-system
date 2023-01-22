<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once("../../connection/connection.php");
$con = connection();

if (isset($_SESSION['teacherID'])) {

    $teacher_id = $_SESSION['teacherID'];
    $gradelevel = $_SESSION['export_gradelvl'];
} else {
    echo header("Location: ../../login/Login.php");
}

$period = $_POST['grading_period'];
$pupil_id = $_POST['pupil_id'];
$pupil_lrn = $_POST['pupil_lrn'];

// School Year
$sy = $_SESSION['sy'];
$sql_sy = "SELECT * FROM `schoolyear_tbl` WHERE `id` = '$sy'";
$sy_res = $con->query($sql_sy) or die($con->error);
$sy_row = $sy_res->fetch_assoc();

if ($sy_row > 0) {
    // Get School Year
    $schoolyear = $sy_row['SchoolYear'];

    // Get Principal
    $principal = $sy_row['SchoolHead'];
}

if ($gradelevel == 'KINDER') {
    $grade_num = 0;
    $roman_grade = 'KINDER';
} else if ($gradelevel == 'GRADE 1') {
    $grade_num = 1;
    $roman_grade = 'GRADES I-III';
} else if ($gradelevel == 'GRADE 2') {
    $grade_num = 2;
    $roman_grade = 'GRADES I-III';
} else if ($gradelevel == 'GRADE 3') {
    $grade_num = 3;
    $roman_grade = 'GRADES I-III';
} else if ($gradelevel == 'GRADE 4') {
    $grade_num = 4;
    $roman_grade = 'GRADES IV-VI';
} else if ($gradelevel == 'GRADE 5') {
    $grade_num = 5;
    $roman_grade = 'GRADES IV-VI';
} else if ($gradelevel == 'GRADE 6') {
    $grade_num = 6;
    $roman_grade = 'GRADES IV-VI';
}

$section_name = null;
$section_id = null;

// Get Pupil's Advisory Teacher

$sql_teacher = "SELECT * FROM `teacher` WHERE `id` = '$teacher_id'";
$teacher_res = $con->query($sql_teacher) or die($con->error);
$teacher_row = $teacher_res->fetch_assoc();

if ($teacher_row > 0) {
    $teacher =  $teacher_row['name'];
}

// Get Pupil's Section
function getSection($pupil_id)
{

    $con = connection();

    $sql = "SELECT * FROM `enrollment_tbl` WHERE `student_id` = '$pupil_id'";
    $res = $con->query($sql) or die($con->error);
    $row = $res->fetch_assoc();

    if ($row > 0) {
        $section = $row['section_id'];

        $sql2 = "SELECT * FROM `section_tbl` WHERE `id` = '$section'";
        $res2 = $con->query($sql2) or die($con->error);
        $row2 = $res2->fetch_assoc();

        $section_data = null;

        if ($row2 > 0) {
            $section_data = $row2;
            return $section_data;
        }
    }

    return null;
}

$section_data = getSection($pupil_id);

if ($section_data) {
    $section_name = $section_data['sectionname'];
    $section_id = $section_data['id'];
}

// get Pupil's Info
function getPupilInfo($pupil_id, $type)
{

    $con = connection();
    $sql = "SELECT * FROM `student_tbl` WHERE `id` = '$pupil_id'";
    $info_res = $con->query($sql) or die($con->error);
    $info_row = $info_res->fetch_assoc();

    if ($info_row > 0) {
        return $info_row[$type];
    }
}


// Pupil's Basic Info
// Full Name
$fullname = strtoupper(getPupilInfo($pupil_id, 'lastname') . ', ' . getPupilInfo($pupil_id, 'firstname') . ' ' . getPupilInfo($pupil_id, 'middlename') . '.');
// Age
$age = getPupilInfo($pupil_id, 'age');
// Gender
$gender = getPupilInfo($pupil_id, 'sex');


// calls the autoload
require 'vendor/autoload.php';
// load phpspreadsheet class using namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// call IOFACTORY instead of xlsx writer
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

//=================================================================//

// Load the Template

$tmp = trim($pupil_lrn);

$reader = IOFactory::createReader('Xlsx');
$spreadsheet = $reader->load('pupil_card.xlsx');

$spreadsheet->getSheetByName("Front")
    ->setCellValue('T9', $tmp[0])
    ->setCellValue('U9', $tmp[1])
    ->setCellValue('V9', $tmp[2])
    ->setCellValue('W9', $tmp[3])
    ->setCellValue('X9', $tmp[4])
    ->setCellValue('Y9', $tmp[5])
    ->setCellValue('Z9', $tmp[6])
    ->setCellValue('AA9', $tmp[7])
    ->setCellValue('AB9', $tmp[8])
    ->setCellValue('AC9', $tmp[9])
    ->setCellValue('AD9', $tmp[10])
    ->setCellValue('AE9', $tmp[11])
    ->setCellValue('S7', $roman_grade)
    ->setCellValue('S10', $fullname)
    ->setCellValue('S11', $age)
    ->setCellValue('S12', $grade_num)
    ->setCellValue('V11', $gender)
    ->setCellValue('X12', $section_name)
    ->setCellValue('Y13', $schoolyear)
    ->setCellValue('R21', $principal)
    ->setCellValue('X20', $teacher);

// =================================================================//

// BACK Card

// FILIPINO
$filipino = getSubject($pupil_id, $section_id, strtolower('Filipino'));
if ($filipino) {

    if ($period == '1st_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D5', $filipino['1st_grade']);
    } else if ($period == '2nd_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D5', $filipino['1st_grade'])
            ->setCellValue('E5', $filipino['2nd_grade']);
    } else if ($period == '3rd_grade') {
        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D5', $filipino['1st_grade'])
            ->setCellValue('E5', $filipino['2nd_grade'])
            ->setCellValue('F5', $filipino['3rd_grade']);
    } else if ($period == '4th_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D5', $filipino['1st_grade'])
            ->setCellValue('E5', $filipino['2nd_grade'])
            ->setCellValue('F5', $filipino['3rd_grade'])
            ->setCellValue('G5', $filipino['4th_grade']);
    } else if ($period == 'final_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D5', $filipino['1st_grade'])
            ->setCellValue('E5', $filipino['2nd_grade'])
            ->setCellValue('F5', $filipino['3rd_grade'])
            ->setCellValue('G5', $filipino['4th_grade'])
            ->setCellValue('H5', $filipino['final_grade'])
            ->setCellValue('I5', $filipino['final_grade_remark']);
    }
}

// ENGLISH
$english = getSubject($pupil_id, $section_id, strtolower('English'));
if ($english) {

    if ($period == '1st_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D6', $english['1st_grade']);
    } else if ($period == '2nd_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D6', $english['1st_grade'])
            ->setCellValue('E6', $english['2nd_grade']);
    } else if ($period == '3rd_grade') {
        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D6', $english['1st_grade'])
            ->setCellValue('E6', $english['2nd_grade'])
            ->setCellValue('F6', $english['3rd_grade']);
    } else if ($period == '4th_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D6', $english['1st_grade'])
            ->setCellValue('E6', $english['2nd_grade'])
            ->setCellValue('F6', $english['3rd_grade'])
            ->setCellValue('G6', $english['4th_grade']);
    } else if ($period == 'final_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D6', $english['1st_grade'])
            ->setCellValue('E6', $english['2nd_grade'])
            ->setCellValue('F6', $english['3rd_grade'])
            ->setCellValue('G6', $english['4th_grade'])
            ->setCellValue('H6', $english['final_grade'])
            ->setCellValue('I6', $english['final_grade_remark']);
    }
}

// MATHEMATICS
$math = getSubject($pupil_id, $section_id, strtolower('Mathematics'));
if ($math) {

    if ($period == '1st_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D7', $math['1st_grade']);
    } else if ($period == '2nd_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D7', $math['1st_grade'])
            ->setCellValue('E7', $math['2nd_grade']);
    } else if ($period == '3rd_grade') {
        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D7', $math['1st_grade'])
            ->setCellValue('E7', $math['2nd_grade'])
            ->setCellValue('F7', $math['3rd_grade']);
    } else if ($period == '4th_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D7', $math['1st_grade'])
            ->setCellValue('E7', $math['2nd_grade'])
            ->setCellValue('F7', $math['3rd_grade'])
            ->setCellValue('G7', $math['4th_grade']);
    } else if ($period == 'final_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D7', $math['1st_grade'])
            ->setCellValue('E7', $math['2nd_grade'])
            ->setCellValue('F7', $math['3rd_grade'])
            ->setCellValue('G7', $math['4th_grade'])
            ->setCellValue('H7', $math['final_grade'])
            ->setCellValue('I7', $math['final_grade_remark']);
    }
}

// SCIENCE
$science = getSubject($pupil_id, $section_id, strtolower('Science'));
if ($science) {

    if ($period == '1st_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D8', $science['1st_grade']);
    } else if ($period == '2nd_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D8', $science['1st_grade'])
            ->setCellValue('E8', $science['2nd_grade']);
    } else if ($period == '3rd_grade') {
        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D8', $science['1st_grade'])
            ->setCellValue('E8', $science['2nd_grade'])
            ->setCellValue('F8', $science['3rd_grade']);
    } else if ($period == '4th_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D8', $science['1st_grade'])
            ->setCellValue('E8', $science['2nd_grade'])
            ->setCellValue('F8', $science['3rd_grade'])
            ->setCellValue('G8', $science['4th_grade']);
    } else if ($period == 'final_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D8', $science['1st_grade'])
            ->setCellValue('E8', $science['2nd_grade'])
            ->setCellValue('F8', $science['3rd_grade'])
            ->setCellValue('G8', $science['4th_grade'])
            ->setCellValue('H8', $science['final_grade'])
            ->setCellValue('I8', $science['final_grade_remark']);
    }
}

// SSES
$sses = getSubject($pupil_id, $section_id, strtolower('Special Science Elementary School'));
if ($sses) {

    if ($period == '1st_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D8', $sses['1st_grade']);
    } else if ($period == '2nd_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D8', $sses['1st_grade'])
            ->setCellValue('E8', $sses['2nd_grade']);
    } else if ($period == '3rd_grade') {
        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D8', $sses['1st_grade'])
            ->setCellValue('E8', $sses['2nd_grade'])
            ->setCellValue('F8', $sses['3rd_grade']);
    } else if ($period == '4th_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D8', $sses['1st_grade'])
            ->setCellValue('E8', $sses['2nd_grade'])
            ->setCellValue('F8', $sses['3rd_grade'])
            ->setCellValue('G8', $sses['4th_grade']);
    } else if ($period == 'final_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D8', $sses['1st_grade'])
            ->setCellValue('E8', $sses['2nd_grade'])
            ->setCellValue('F8', $sses['3rd_grade'])
            ->setCellValue('G8', $sses['4th_grade'])
            ->setCellValue('H8', $sses['final_grade'])
            ->setCellValue('I8', $sses['final_grade_remark']);
    }
}

// ARALING PANLIPUNAN
$ap = getSubject($pupil_id, $section_id, strtolower('Araling Panlipunan'));
if ($ap) {

    if ($period == '1st_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D9', $ap['1st_grade']);
    } else if ($period == '2nd_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D9', $ap['1st_grade'])
            ->setCellValue('E9', $ap['2nd_grade']);
    } else if ($period == '3rd_grade') {
        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D9', $ap['1st_grade'])
            ->setCellValue('E9', $ap['2nd_grade'])
            ->setCellValue('F9', $ap['3rd_grade']);
    } else if ($period == '4th_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D9', $ap['1st_grade'])
            ->setCellValue('E9', $ap['2nd_grade'])
            ->setCellValue('F9', $ap['3rd_grade'])
            ->setCellValue('G9', $ap['4th_grade']);
    } else if ($period == 'final_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D9', $ap['1st_grade'])
            ->setCellValue('E9', $ap['2nd_grade'])
            ->setCellValue('F9', $ap['3rd_grade'])
            ->setCellValue('G9', $ap['4th_grade'])
            ->setCellValue('H9', $ap['final_grade'])
            ->setCellValue('I9', $ap['final_grade_remark']);
    }
}

// EDUKASYON SA PAGPAPAKATAO
$esp = getSubject($pupil_id, $section_id, strtolower('Edukasyon sa Pagpapakatao'));
if ($esp) {

    if ($period == '1st_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D10', $esp['1st_grade']);
    } else if ($period == '2nd_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D10', $esp['1st_grade'])
            ->setCellValue('E10', $esp['2nd_grade']);
    } else if ($period == '3rd_grade') {
        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D10', $esp['1st_grade'])
            ->setCellValue('E10', $esp['2nd_grade'])
            ->setCellValue('F10', $esp['3rd_grade']);
    } else if ($period == '4th_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D10', $esp['1st_grade'])
            ->setCellValue('E10', $esp['2nd_grade'])
            ->setCellValue('F10', $esp['3rd_grade'])
            ->setCellValue('G10', $esp['4th_grade']);
    } else if ($period == 'final_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D10', $esp['1st_grade'])
            ->setCellValue('E10', $esp['2nd_grade'])
            ->setCellValue('F10', $esp['3rd_grade'])
            ->setCellValue('G10', $esp['4th_grade'])
            ->setCellValue('H10', $esp['final_grade'])
            ->setCellValue('I10', $esp['final_grade_remark']);
    }
}

// EPP/ TLE
$epp_tle = getSubject($pupil_id, $section_id, strtolower('Edukasyon sa Pagpapakatao/Technology & Livelihood Education'));
if ($epp_tle) {

    if ($period == '1st_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D11', $epp_tle['1st_grade']);
    } else if ($period == '2nd_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D11', $epp_tle['1st_grade'])
            ->setCellValue('E11', $epp_tle['2nd_grade']);
    } else if ($period == '3rd_grade') {
        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D11', $epp_tle['1st_grade'])
            ->setCellValue('E11', $epp_tle['2nd_grade'])
            ->setCellValue('F11', $epp_tle['3rd_grade']);
    } else if ($period == '4th_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D11', $epp_tle['1st_grade'])
            ->setCellValue('E11', $epp_tle['2nd_grade'])
            ->setCellValue('F11', $epp_tle['3rd_grade'])
            ->setCellValue('G11', $epp_tle['4th_grade']);
    } else if ($period == 'final_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D11', $epp_tle['1st_grade'])
            ->setCellValue('E11', $epp_tle['2nd_grade'])
            ->setCellValue('F11', $epp_tle['3rd_grade'])
            ->setCellValue('G11', $epp_tle['4th_grade'])
            ->setCellValue('H11', $epp_tle['final_grade'])
            ->setCellValue('I11', $epp_tle['final_grade_remark']);
    }
}

// MUSIC
$music = getSubject($pupil_id, $section_id, strtolower('Music'));
if ($music) {

    if ($period == '1st_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D13', $music['1st_grade']);
    } else if ($period == '2nd_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D13', $music['1st_grade'])
            ->setCellValue('E13', $music['2nd_grade']);
    } else if ($period == '3rd_grade') {
        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D13', $music['1st_grade'])
            ->setCellValue('E13', $music['2nd_grade'])
            ->setCellValue('F13', $music['3rd_grade']);
    } else if ($period == '4th_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D13', $music['1st_grade'])
            ->setCellValue('E13', $music['2nd_grade'])
            ->setCellValue('F13', $music['3rd_grade'])
            ->setCellValue('G13', $music['4th_grade']);
    } else if ($period == 'final_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D13', $music['1st_grade'])
            ->setCellValue('E13', $music['2nd_grade'])
            ->setCellValue('F13', $music['3rd_grade'])
            ->setCellValue('G13', $music['4th_grade'])
            ->setCellValue('H13', $music['final_grade'])
            ->setCellValue('I13', $music['final_grade_remark']);
    }
}

// ARTS
$arts = getSubject($pupil_id, $section_id, strtolower('Arts'));
if ($arts) {

    if ($period == '1st_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D14', $arts['1st_grade']);
    } else if ($period == '2nd_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D14', $arts['1st_grade'])
            ->setCellValue('E14', $arts['2nd_grade']);
    } else if ($period == '3rd_grade') {
        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D14', $arts['1st_grade'])
            ->setCellValue('E14', $arts['2nd_grade'])
            ->setCellValue('F14', $arts['3rd_grade']);
    } else if ($period == '4th_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D14', $arts['1st_grade'])
            ->setCellValue('E14', $arts['2nd_grade'])
            ->setCellValue('F14', $arts['3rd_grade'])
            ->setCellValue('G14', $arts['4th_grade']);
    } else if ($period == 'final_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D14', $arts['1st_grade'])
            ->setCellValue('E14', $arts['2nd_grade'])
            ->setCellValue('F14', $arts['3rd_grade'])
            ->setCellValue('G14', $arts['4th_grade'])
            ->setCellValue('H14', $arts['final_grade'])
            ->setCellValue('I14', $arts['final_grade_remark']);
    }
}

// PHYSICAL EDUCATION
$pe = getSubject($pupil_id, $section_id, strtolower('Physical Education'));
if ($pe) {

    if ($period == '1st_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D15', $pe['1st_grade']);
    } else if ($period == '2nd_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D15', $pe['1st_grade'])
            ->setCellValue('E15', $pe['2nd_grade']);
    } else if ($period == '3rd_grade') {
        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D15', $pe['1st_grade'])
            ->setCellValue('E15', $pe['2nd_grade'])
            ->setCellValue('F15', $pe['3rd_grade']);
    } else if ($period == '4th_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D15', $pe['1st_grade'])
            ->setCellValue('E15', $pe['2nd_grade'])
            ->setCellValue('F15', $pe['3rd_grade'])
            ->setCellValue('G15', $pe['4th_grade']);
    } else if ($period == 'final_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D15', $pe['1st_grade'])
            ->setCellValue('E15', $pe['2nd_grade'])
            ->setCellValue('F15', $pe['3rd_grade'])
            ->setCellValue('G15', $pe['4th_grade'])
            ->setCellValue('H15', $pe['final_grade'])
            ->setCellValue('I15', $pe['final_grade_remark']);
    }
}

// HEALTH
$health = getSubject($pupil_id, $section_id, strtolower('Health'));
if ($health) {

    if ($period == '1st_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D16', $health['1st_grade']);
    } else if ($period == '2nd_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D16', $health['1st_grade'])
            ->setCellValue('E16', $health['2nd_grade']);
    } else if ($period == '3rd_grade') {
        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D16', $health['1st_grade'])
            ->setCellValue('E16', $health['2nd_grade'])
            ->setCellValue('F16', $health['3rd_grade']);
    } else if ($period == '4th_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D16', $health['1st_grade'])
            ->setCellValue('E16', $health['2nd_grade'])
            ->setCellValue('F16', $health['3rd_grade'])
            ->setCellValue('G16', $health['4th_grade']);
    } else if ($period == 'final_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D16', $health['1st_grade'])
            ->setCellValue('E16', $health['2nd_grade'])
            ->setCellValue('F16', $health['3rd_grade'])
            ->setCellValue('G16', $health['4th_grade'])
            ->setCellValue('H16', $health['final_grade'])
            ->setCellValue('I16', $health['final_grade_remark']);
    }
}

// MAPEH
// $mapeh_counter = 0;
// $mapehQ1_counter = 0;
// $mapehQ2_counter = 0;
// $mapehQ3_counter = 0;
// $mapehQ4_counter = 0;

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

if ($music && $arts && $pe && $health) {

    // $mapehQ1Counter = 0;
    // if($music['1st_grade']){
    //     $mapehQ1Counter+=1;
    // }
    // if($arts['1st_grade']){
    //     $mapehQ1Counter+=1;
    // }
    // if($pe['1st_grade']){
    //     $mapehQ1Counter+=1;
    // }
    // if($health['1st_grade']){
    //     $mapehQ1Counter+=1;
    // }



    $mapehQ1 = ($music['1st_grade'] + $arts['1st_grade'] + $pe['1st_grade'] + $health['1st_grade']) /
        mapehCounter($music['1st_grade'], $arts['1st_grade'], $pe['1st_grade'], $health['1st_grade']);



    $mapehQ2 = ($music['2nd_grade'] + $arts['2nd_grade'] + $pe['2nd_grade'] + $health['2nd_grade']) /
        mapehCounter($music['2nd_grade'], $arts['2nd_grade'], $pe['2nd_grade'], $health['2nd_grade']);

    $mapehQ3 = ($music['3rd_grade'] + $arts['3rd_grade'] + $pe['3rd_grade'] + $health['3rd_grade']) /
        mapehCounter($music['3rd_grade'], $arts['3rd_grade'], $pe['3rd_grade'], $health['3rd_grade']);

    $mapehQ4 = ($music['4th_grade'] + $arts['4th_grade'] + $pe['4th_grade'] + $health['4th_grade']) /
        mapehCounter($music['4th_grade'], $arts['4th_grade'], $pe['4th_grade'], $health['4th_grade']);

    $mapehfinal = ($mapehQ1 + $mapehQ2 + $mapehQ3 + $mapehQ4) /
        mapehCounter($mapehQ1, $mapehQ2, $mapehQ3, $mapehQ4);


    if ($mapehfinal > 74) {
        $remark = "Passed";
    } else {
        $remark = "Failed";
    }

    if ($period == '1st_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D12', $mapehQ1);
    } else if ($period == '2nd_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D12', $mapehQ1)
            ->setCellValue('E12', $mapehQ2);
    } else if ($period == '3rd_grade') {
        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D12', $mapehQ1)
            ->setCellValue('E12', $mapehQ2)
            ->setCellValue('F12', $mapehQ3);
    } else if ($period == '4th_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D12', $mapehQ1)
            ->setCellValue('E12', $mapehQ2)
            ->setCellValue('F12', $mapehQ3)
            ->setCellValue('G12', $mapehQ4);
    } else if ($period == 'final_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D12', $mapehQ1)
            ->setCellValue('E12', $mapehQ2)
            ->setCellValue('F12', $mapehQ3)
            ->setCellValue('G12', $mapehQ4)
            ->setCellValue('H12', $mapehfinal)
            ->setCellValue('I12', $remark);
    }
}

// SPJ
$spj = getSubject($pupil_id, $section_id, strtolower('Special Program for Journalism'));
if ($spj) {

    if ($period == '1st_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D17', $spj['1st_grade']);
    } else if ($period == '2nd_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D17', $spj['1st_grade'])
            ->setCellValue('E17', $spj['2nd_grade']);
    } else if ($period == '3rd_grade') {
        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D17', $spj['1st_grade'])
            ->setCellValue('E17', $spj['2nd_grade'])
            ->setCellValue('F17', $spj['3rd_grade']);
    } else if ($period == '4th_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D17', $spj['1st_grade'])
            ->setCellValue('E17', $spj['2nd_grade'])
            ->setCellValue('F17', $spj['3rd_grade'])
            ->setCellValue('G17', $spj['4th_grade']);
    } else if ($period == 'final_grade') {

        $spreadsheet->getSheetByName("Back")
            ->setCellValue('D17', $spj['1st_grade'])
            ->setCellValue('E17', $spj['2nd_grade'])
            ->setCellValue('F17', $spj['3rd_grade'])
            ->setCellValue('G17', $spj['4th_grade'])
            ->setCellValue('H17', $spj['final_grade'])
            ->setCellValue('I17', $spj['final_grade_remark']);
    }
}

function getSubject($pupil_id, $section_id, $subject)
{

    $con = connection();

    $sql = "SELECT * FROM `student_subject_record_tbl` WHERE `student_id` = '$pupil_id' AND `section_id` = '$section_id'";
    $res = $con->query($sql) or die($con->error);

    while ($row = $res->fetch_assoc()) {

        $row_sub_id = $row['subject_id'];

        $sql2 = "SELECT * FROM `subject_tbl` WHERE `id` = '$row_sub_id'";
        $res2 = $con->query($sql2) or die($con->error);
        $row2 = $res2->fetch_assoc();

        if ($row2 > 0) {
            if (strtolower($row2['subject_name']) == $subject) {
                return $row;
            }
        }
    }

    return null;
}


// set the header first. so the result will be treated as an excel file.
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
// $newfile = $grd_lvl . ' - ' . $section_name . ' - ' . $subject_code . '(' . $lbl_quarter . ').xlsx';
$newfile  = "SF9-ES.xlsx";
header('Content-Disposition: attachment;filename="' . $newfile . '"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

//change worksheet name  (Important)
// $spreadsheet->getActiveSheet()
// ->setTitle('INPUT DATA');

//save into php output
$writer->save('php://output');
