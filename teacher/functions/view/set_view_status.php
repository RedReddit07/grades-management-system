<?php

include_once("../../../connection/connection.php");
$con = connection();

$section_id = $_POST['class_id'];
$summary = $_POST['sum'];
$view_status = $_POST['is_view_enabled'];

if ($view_status == 'Yes'){
    $sql = "UPDATE `section_tbl` SET `is_view_enabled`='No' WHERE `id` = '$section_id'";
}else if ($view_status == 'No'){
    $sql = "UPDATE `section_tbl` SET `is_view_enabled`='Yes' WHERE `id` = '$section_id'";
}
$con->query($sql) or die($con->error);


echo header("Location: ../../view_section/view_class.php?section_id={$section_id}&summary_period={$summary}");
?>