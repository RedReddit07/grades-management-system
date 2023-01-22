<?php 

    include_once("../../../connection/connection.php");
    $con = connection();

    $section= $_POST['section_id_2'];
    $subject = $_POST['subjects_id'];
    $sum = $_POST['sum_2'];
    
    foreach ($subject as $rowsubjects){

        $subjects = $rowsubjects;

        $sql2 = "SELECT * FROM `subject_assigned_section_tbl` WHERE id = '$subjects'";
        $res = $con->query($sql2) or die ($con->error);
        $row = $res->fetch_assoc();
        
        $tmp = '';
        if($row > 0 ){

            $tmp = $row['subject_id'];

            $sql3 = "DELETE FROM `student_subject_record_tbl` WHERE `section_id` = '$section' AND `subject_id` = '$tmp'";
            $con->query($sql3) or die ($con->error);


        }
        
        $sql = "DELETE FROM `subject_assigned_section_tbl` WHERE `section_id` = '$section' AND `subject_id` = '$tmp'";
        $con->query($sql) or die ($con->error);
    
    }  

    $tmp = "Location: ../../view_section/view_class.php?section_id={$section}&summary_period={$sum}";
    echo header($tmp);

?>

