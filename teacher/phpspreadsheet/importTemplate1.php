<?php

if (!isset($_SESSION)) {
  session_start();
}

$subject_name = $_SESSION['export_subject_name'];
$quarter_grade = $_SESSION['quarter_grade'];

include 'vendor/autoload.php';
include_once("../../connection/connection.php");

$con = connection();

if ($_FILES["import_excel"]["name"] != '') {
  $allowed_extension = array('xls', 'csv', 'xlsx', 'xlsb');
  $file_array = explode(".", $_FILES["import_excel"]["name"]);
  $file_extension = end($file_array);

  if (in_array($file_extension, $allowed_extension)) {
    $file_name = time() . '.' . $file_extension;
    move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
    $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
    //   $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load($file_name);

    unlink($file_name);

    $current_row_male = 13;
    $row_male_max = 62;

    $current_row_female = 64;
    $row_female_max = 113;

    $insert_data = array();

    $grade_cell = '';

    $lbl = "";
    if ($subject_name == 'Music' || $subject_name == 'Arts' || $subject_name == 'Physical Education' || $subject_name == 'Health') {


      if ($quarter_grade == '1st_grade') {

        if ($subject_name == 'Music') {
          $grade_cell = 'F';
        } else if ($subject_name == 'Arts') {
          $grade_cell = 'J';
        } else if ($subject_name == 'Physical Education') {
          $grade_cell = 'N';
        } else if ($subject_name == 'Health') {
          $grade_cell = 'R';
        }
      } else if ($quarter_grade == '2nd_grade') {

        if ($subject_name == 'Music') {
          $grade_cell = 'F';
        } else if ($subject_name == 'Arts') {
          $grade_cell = 'J';
        } else if ($subject_name == 'Physical Education') {
          $grade_cell = 'N';
        } else if ($subject_name == 'Health') {
          $grade_cell = 'R';
        }
      } else if ($quarter_grade == '3rd_grade') {

        if ($subject_name == 'Music') {
          $grade_cell = 'F';
        } else if ($subject_name == 'Arts') {
          $grade_cell = 'J';
        } else if ($subject_name == 'Physical Education') {
          $grade_cell = 'N';
        } else if ($subject_name == 'Health') {
          $grade_cell = 'R';
        }
      } else if ($quarter_grade == '4th_grade') {

        if ($subject_name == 'Music') {
          $grade_cell = 'F';
        } else if ($subject_name == 'Arts') {
          $grade_cell = 'J';
        } else if ($subject_name == 'Physical Education') {
          $grade_cell = 'N';
        } else if ($subject_name == 'Health') {
          $grade_cell = 'R';
        }
      }

      $lbl = "Summary of Quarterly Grades";
    } else {

      if ($quarter_grade == '1st_grade') {
        $grade_cell = 'F';
      } else if ($quarter_grade == '2nd_grade') {
        $grade_cell = 'J';
      } else if ($quarter_grade == '3rd_grade') {
        $grade_cell = 'N';
      } else if ($quarter_grade == '4th_grade') {
        $grade_cell = 'R';
      }

      $lbl = "Summary of Grades";
    }



    for ($i = $current_row_male; $i < $row_male_max && ($spreadsheet->getSheetByName($lbl)->getCell('B' . $i)->getValue() != ''); $i++) {

      $name = $spreadsheet->getSheetByName($lbl)->getCell('B' . $i)->getValue();
      $id = $spreadsheet->getSheetByName($lbl)->getCell('A' . $i)->getCalculatedValue();
      $grade = $spreadsheet->getSheetByName($lbl)->getCell($grade_cell . $i)->getCalculatedValue();
      $msg = $grade;
      $sql = "UPDATE `student_subject_record_tbl` SET
    $quarter_grade = '$grade' WHERE id = '$id'";
      $res = $con->query($sql) or die($con->error);
    }

    for ($i = $current_row_female; $i < $row_female_max && ($spreadsheet->getSheetByName($lbl)->getCell('B' . $i)->getValue() != ''); $i++) {

      $name = $spreadsheet->getSheetByName($lbl)->getCell('B' . $i)->getValue();
      $id = $spreadsheet->getSheetByName($lbl)->getCell('A' . $i)->getCalculatedValue();
      $grade = $spreadsheet->getSheetByName($lbl)->getCell($grade_cell . $i)->getCalculatedValue();

      $sql = "UPDATE `student_subject_record_tbl` SET
    $quarter_grade = '$grade' WHERE id = '$id'";
      $res = $con->query($sql) or die($con->error);
    }

    $message = '<div class="alert alert-success">Data Imported Successfully </div>';
  } else {
    $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
  }
} else {
  $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo "<script>alert('Data Imported Successfully')</script>";
