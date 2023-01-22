<?php


if (!isset($_SESSION)) {
    session_start();
}

include_once("../../../connection/connection.php");
$con = connection();

// $hasMAPEH = $_POST['has_mapeh']; //MAPEH value
$section_id = $_POST['section_id'];
$gradeLvl = $_POST['grade_level'];
$sum = $_POST['summary'];

$subjects = $_POST['subjects'];
// $mapeh_subjects = $_POST['mapeh_subjects'];

foreach ($subjects as $rowsubj) {

    $subject_id = $rowsubj;

    $sql = "SELECT * FROM subject_assigned_section_tbl WHERE section_id = '$section_id' AND subject_id = '$rowsubj'";
    $check_res = $con->query($sql) or die($con->error);
    $check_row = $check_res->fetch_assoc();

    if ($check_row > 0) {

        $tmp = "Location: ../../view_section/view_class.php?section_id={$section_id}&summary_period={$sum}";
        echo "<script>alert('Failed to assign this subject.')</script>";
        echo header($tmp);
    } else {

        // if ($rowsubj == 'MAPEH') {

        //     foreach ($mapeh_subjects as $mapeh_sub) {
        //         $sql = "INSERT INTO `subject_assigned_section_tbl` (`section_id`,`subject_id`,`subject_teacher` ) VALUES ('$section_id', '$mapeh_sub', null)";
        //         $con->query($sql) or die($con->error);

        //         $sql = "SELECT * FROM `enrollment_tbl` WHERE `section_id` = '$section_id'";
        //         $pupils_res = $con->query($sql) or die($con->error);

        //         while ($pupils_row = $pupils_res->fetch_assoc()) {
        //             $pupil = $pupils_row['student_id'];
        //             $sql = "INSERT INTO `student_subject_record_tbl` (`student_id`,`section_id`,`subject_id`) VALUES ('$pupil','$section_id', '$mapeh_sub')";
        //             $pupil_res = $con->query($sql) or die($con->error);
        //         }
        //     }


        //     $tmp = "Location: ../../view_section/view_class.php?section_id={$section_id}&summary_period={$sum}";
        //     echo header($tmp);
        // } else {

        $sql2 = "SELECT * FROM `subject_tbl` WHERE `id` = '$rowsubj'";

        $subj_res = $con->query($sql2) or die($con->error);
        $subj_row = $subj_res->fetch_assoc();


        $sql = "INSERT INTO `subject_assigned_section_tbl` (`section_id`,`subject_id`,`subject_teacher`, `sy`) VALUES ('$section_id', '$rowsubj', null, '{$_SESSION['selected_sy']}')";
        $con->query($sql) or die($con->error);

        $sql = "SELECT * FROM `enrollment_tbl` WHERE `section_id` = '$section_id'";
        $pupils_res = $con->query($sql) or die($con->error);

        while ($pupils_row = $pupils_res->fetch_assoc()) {
            $pupil = $pupils_row['student_id'];
            $sql = "INSERT INTO `student_subject_record_tbl` (`student_id`,`section_id`,`subject_id`) VALUES ('$pupil','$section_id', '$rowsubj')";
            $pupil_res = $con->query($sql) or die($con->error);
            //}

            $tmp = "Location: ../../view_section/view_class.php?section_id={$section_id}&summary_period={$sum}";
            echo header($tmp);
        }
    }
}
