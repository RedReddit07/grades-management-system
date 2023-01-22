<?php
  //import.php
  if (!isset($_SESSION)){
    session_start();
  }
  
$quarter_grade = $_SESSION['quarter_grade'];

include 'vendor/autoload.php';

include_once("../../connection/connection.php");

$con = connection();

if($_FILES["import_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'csv', 'xlsx', 'xlsb');
 $file_array = explode(".", $_FILES["import_excel"]["name"]);
 $file_extension = end($file_array);

 if(in_array($file_extension, $allowed_extension))
 {
  $file_name = time() . '.' . $file_extension;
  move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
  $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
//   $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
  $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load($file_name);


  unlink($file_name);


$current_row_male = 12;
$row_male_max = 60;

$current_row_female = 12;
$row_female_max = 60;

$insert_data = array();

    
for($i = $current_row_male; $i < $row_male_max && ($spreadsheet->getActiveSheet()->getCell('B'.$i)->getValue() != ''); $i++){
    
    $name = $spreadsheet->getActiveSheet()->getCell('B'.$i)->getValue();
    $id = $spreadsheet->getActiveSheet()->getCell('A'.$i)->getValue();
    $grade = $spreadsheet->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();

    $sql = "UPDATE student_subject_record_tbl SET
    $quarter_grade = '$grade' WHERE id = '$id'";
        $res = $con->query($sql) or die($con->error);
    
}

for($i = $current_row_female; $i < $row_female_max && ($spreadsheet->getActiveSheet()->getCell('B'.$i)->getValue() != ''); $i++){
    
    $name = $spreadsheet->getActiveSheet()->getCell('F'.$i)->getValue();
    $id = $spreadsheet->getActiveSheet()->getCell('E'.$i)->getValue();
    $grade = $spreadsheet->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();

    $sql = "UPDATE student_subject_record_tbl SET
    $quarter_grade = '$grade' WHERE id = '$id'";
        $res = $con->query($sql) or die($con->error);
        
}

  $message = '<div class="alert alert-success">Data Imported Successfully </div>';
  

 }
 else
 {
  $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo "<script>alert('Data Imported Successfully')</script>";

?>