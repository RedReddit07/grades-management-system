<?php

include("../../../connection/connection.php");
$con = connection();

$subcode = $_POST['subject_code'];
$subname = $_POST['subject_description'];

$sql = "INSERT INTO `subject_list_tbl`(`subject_code`, `subject_name`) VALUES ('$subcode','$subname')";
$con->query($sql) or die($con->error);

echo header("Location: ../../main_page/subjects.php");
?>