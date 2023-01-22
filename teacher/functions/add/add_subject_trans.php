<?php 

    include_once("../../../connection/connection.php");
    $con = connection();
    
    $tmp =$_POST['student_id_1'];
    $section_id = $_POST['section_id_1'];
    $subjects = $_POST['subjects_1'];
    $sum = $_POST['summary_1'];

    $student_id = trim($tmp);
    foreach ($subjects as $rowsubj){

        $subject_id = $rowsubj;
    
        $sql = "INSERT INTO `student_subject_record_tbl`(`student_id`, `section_id`, `subject_id`) VALUES ('$student_id', '$section_id', '$subject_id')";
        $con->query($sql) or die ($con->error);


    }
    
    $tmp = "Location: ../../view_section/view_class.php?section_id={$section_id}&summary_period={$sum}";
            echo header($tmp);
?>

