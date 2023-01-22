<?php

include_once("../../../connection/connection.php");
$con = connection();

$section_id =$_POST['section'];
$summary = $_POST['summary'];
$pupil_lrn = $_POST['pupil_lrn'];
$new_pass = $_POST['pupil_pass'];

$sql = "INSERT INTO `pupil_account_tbl`(`pupil_lrn`, `password`) VALUES ('$pupil_lrn','$new_pass')";
$con->query($sql) or die ($con->error);

$tmp = "Location: ../../view_section/view_class.php?section_id={$section_id}&summary_period={$summary}";
echo header($tmp);


?>