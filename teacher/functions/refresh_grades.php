<?php

    include_once("../../connection/connection.php");

    function onLoad(){
        setFinalGrade();
        setFinalRemarks();
        setFirstGradingRemark();
        setSecondGradingRemark();
        setThirdGradingRemark();
        setFourthGradingRemark();
    }

    function setFinalGrade(){
        $con = connection();

        
        $sql = "SELECT * FROM `student_subject_record_tbl`";
        $res = $con->query($sql) or die ($con->error);

        $data = null;
    
        while($grades = $res->fetch_assoc()){
            $data[] = $grades;
        }
    
        foreach($data as $row){
            $id = $row['id'];
            $fg = $row['1st_grade'];
            $sg = $row['2nd_grade'];
            $tg = $row['3rd_grade'];
            $ftg = $row['4th_grade'];


            $count = 0;

            if($fg > 0) $count++;
            if($sg > 0) $count++;
            if($tg > 0) $count++;
            if($ftg > 0) $count++;
            
            if($count >0) {
                $final_grade = ($fg + $sg + $tg + $ftg) / $count;
                $sql = "UPDATE `student_subject_record_tbl` SET final_grade = '$final_grade' WHERE id = '$id'";
                $res = $con->query($sql) or die ($con->error);
            }else{
                $sql = "UPDATE `student_subject_record_tbl` SET final_grade = '0' WHERE id = '$id'";
                $res = $con->query($sql) or die ($con->error);
            }
            
        }
    
        

    }


    function setFinalRemarks(){
        $con = connection();

        $sql = "SELECT * FROM `student_subject_record_tbl`";
        $res = $con->query($sql) or die ($con->error);

        $data = null;

        while($grades = $res->fetch_assoc()){
            $data[] = $grades;
        }

        foreach($data as $row){
            $final_grade = $row['final_grade'];
            $id = $row['id'];

            $remarks = "No remark";

            $remarks = $final_grade >= 75 ? "Passed" : "Failed";

            $sql = "UPDATE `student_subject_record_tbl` SET final_grade_remark = '$remarks' WHERE id = '$id'";
            $res = $con->query($sql) or die ($con->error);
        }

    }

    function setFirstGradingRemark(){
        $con = connection();

        $sql = "SELECT * FROM `student_subject_record_tbl`";
        $res = $con->query($sql) or die ($con->error);
        $data = null;

        while($grades = $res->fetch_assoc()){
            $data[] = $grades;
        }

        foreach($data as $row){

            $grade = $row['1st_grade'];
            $id = $row['id'];
            $remarks = "";

            $intgrade = (int)$grade;

            $remarks = $intgrade >= 75 ? "Passed" : "Failed";
            if($intgrade == 0) $remarks = "No remarks";
            
        
            $sql = "UPDATE `student_subject_record_tbl` SET 1st_grade_remark = '$remarks' WHERE id = '$id'";
            $res = $con->query($sql) or die ($con->error);
        }
    }

    function setSecondGradingRemark(){
        $con = connection();

        $sql = "SELECT * FROM `student_subject_record_tbl`";
        $res = $con->query($sql) or die ($con->error);
        $data = null;

        while($grades = $res->fetch_assoc()){
            $data[] = $grades;
        }

        foreach($data as $row){

            $grade = $row['2nd_grade'];
            $id = $row['id'];
            $remarks = "";

            $intgrade = (int)$grade;

            $remarks = $intgrade >= 75 ? "Passed" : "Failed";
            if($intgrade == 0) $remarks = "No remarks";
            
         
            $sql = "UPDATE `student_subject_record_tbl` SET 2nd_grade_remark = '$remarks' WHERE id = '$id'";
            $res = $con->query($sql) or die ($con->error);
        }
    }

    function setThirdGradingRemark(){
        $con = connection();

        $sql = "SELECT * FROM `student_subject_record_tbl`";
        $res = $con->query($sql) or die ($con->error);
        $data = null;

        while($grades = $res->fetch_assoc()){
            $data[] = $grades;
        }

        foreach($data as $row){

            $grade = $row['3rd_grade'];
            $id = $row['id'];
            $remarks = "";

            $intgrade = (int)$grade;

            $remarks = $intgrade >= 75 ? "Passed" : "Failed";
            if($intgrade == 0) $remarks = "No remarks";
            
         
            $sql = "UPDATE `student_subject_record_tbl` SET 3rd_grade_remark = '$remarks' WHERE id = '$id'";
            $res = $con->query($sql) or die ($con->error);
        }
    }

    function setFourthGradingRemark(){
        $con = connection();

        $sql = "SELECT * FROM `student_subject_record_tbl`";
        $res = $con->query($sql) or die ($con->error);
        $data = null;

        while($grades = $res->fetch_assoc()){
            $data[] = $grades;
        }

        foreach($data as $row){

            $grade = $row['4th_grade'];
            $id = $row['id'];
            $remarks = "";

            $intgrade = (int)$grade;

            $remarks = $intgrade >= 75 ? "Passed" : "Failed";
            if($intgrade == 0) $remarks = "No remarks";
            
         
            $sql = "UPDATE `student_subject_record_tbl` SET 4th_grade_remark = '$remarks' WHERE id = '$id'";
            $res = $con->query($sql) or die ($con->error);
        }
    }
    

?>