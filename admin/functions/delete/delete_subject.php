<?php

include_once("../../../connection/connection.php");
$con = connection();

$sub_id = $_POST['subject_id'];

$sql = "DELETE FROM `subject_list_tbl` WHERE `id` = '$sub_id'";
$con->query($sql) or die($con->error);

echo header("Location: ../../main_page/subjects.php");

?>