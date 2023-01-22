<?php

include_once("../../../connection/connection.php");
$con = connection();

$id = $_POST['pupil_id'];
$new_pass = $_POST['pupil_pass'];

$sec = $_POST['section'];
$sum = $_POST['summary'];

echo $id . ' ' . $new_pass;

$sql = "UPDATE `pupil_account_tbl` SET `password`='$new_pass' WHERE `pupil_id` = '$id'";
$con->query($sql) or die ($con->error);

header("Location: ../../view_section/view_class.php?section_id={$sec}&summary_period={$sum}");


?>