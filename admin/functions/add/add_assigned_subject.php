<?php 

    include_once("../../../connection/connection.php");
    $con = connection();

    $grlvl = $_POST['grade_lvl'];
    $code = $_POST['subcode'];

    $sql = "SELECT * FROM `subject_list_tbl` WHERE `subject_code` = '$code'";
    $res = $con->query($sql) or die($con->error);
    $row = $res->fetch_assoc();

    $sub_name = $row['subject_name'];

    $sub_code = $code.'-'.$grlvl;

    $sql = "INSERT INTO `subject_tbl`(`subject_grade_lvl`,`subject_code`,`subject_name`) VALUES ('$grlvl','$sub_code','$sub_name')";
    $con->query($sql) or die ($con->error);
    
    echo header('Location: ../../main_page/assignedsubjects.php');

?>