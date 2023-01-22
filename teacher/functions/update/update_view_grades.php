<?php

include_once("../../../connection/connection.php");
$con = connection();

$section = $_POST['section_id_2'];
$sum = $_POST['summary_2'];

if (isset($_POST['viewmodeOn'])){
    $tmp = "Yes";
}else{
    $tmp = "No";
}


// First Grading Checkbox
if(isset($_POST['first_view_grading'])){
    $first_view = 'Yes';
}else{
    $first_view = 'No';
}

// Second Grading Checkbox
if(isset($_POST['second_view_grading'])){
    $second_view = 'Yes';
}else{
    $second_view = 'No';
}


// Third Grading Checkbox
if(isset($_POST['third_view_grading'])){
    $third_view = 'Yes';
}else{
    $third_view = 'No';
}


// Fourth Grading Checkbox
if(isset($_POST['fourth_view_grading'])){
    $fourth_view = 'Yes';
}else{
    $fourth_view = 'No';
}

// Final Grading Checkbox
if(isset($_POST['final_view_grading'])){
    $final_view = 'Yes';
}else{
    $final_view = 'No';
}


$sql = "UPDATE `section_tbl` SET `is_view_enabled`='$tmp',`view_quarter1`='$first_view',`view_quarter2`='$second_view',`view_quarter3`='$third_view',`view_quarter4`='$fourth_view',`view_final`='$final_view' WHERE `id` = '$section'";
$con->query($sql) or die($con->error);

$tmp1 = "Location: ../../view_section/view_class.php?section_id={$section}&summary_period={$sum}";
echo header($tmp1);

?>