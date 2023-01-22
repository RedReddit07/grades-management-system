<?php

include_once("../../../connection/connection.php");
$con = connection();

$teacher_id = $_POST['teacher_id'];
$new_pass = $_POST['new_pass'];

$sql = "UPDATE `users` SET `password`='$new_pass' WHERE `id` = '$teacher_id'";
$con->query($sql) or die ($con->error);

echo header("Location: ../../main_page/mysettings.php");


?>