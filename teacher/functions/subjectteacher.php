<?php

    function selectsubjectTeacher($subject_teacher){
        
        $con = connection();

        $sql = "SELECT * FROM `teacher` WHERE `id` = '$subject_teacher'";
        $subject_teacher_res = $con->query($sql) or die ($con->error);
        $subject_teacher_row = $subject_teacher_res->fetch_assoc();
        
        
        if($subject_teacher_row > 0){
            print $subject_teacher_row['name'];
        }
    }


?>