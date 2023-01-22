<?php

include_once('../../../connection/connection.php');
$con = connection();

$id = $_POST['student_id'];

$sql = "SELECT * FROM `pupil_account_tbl` WHERE `pupil_id` = '$id'";
$res = $con->query($sql) or die($con->error);
$row = $res->fetch_assoc();
$password = null;
if($row > 0) {
    $password = $row['password'];
}
echo $password;

?>