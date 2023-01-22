<?php

include_once("../../../connection/connection.php");
$con = connection();

$pupil_id = $_POST['pupil_id'];
$new_pass = $_POST['new_pass'];

$sql = "UPDATE `pupil_account_tbl` SET `password`='$new_pass' WHERE `pupil_id` = '$pupil_id'";
$con->query($sql) or die($con->error);

echo header("Location: ../../main_page/mysettings.php");

?>