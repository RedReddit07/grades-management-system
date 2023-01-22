<?php 
include_once("../../connection/connection.php");

function getSubjectInfo($subject_id, $type){
        
        $con = connection();
      
        $sql = "SELECT * FROM `subject_tbl` WHERE `id` = '$subject_id'"; 
        $res = $con->query($sql) or die($con->error);
      
        $row = $res->fetch_assoc();
      
        if ($row > 0){
            return $row[$type];
        }else{
          return 'No Subject found';
        }
      
}

function selectSubject($subject_id){

  $con = connection();

  $sql = "SELECT * FROM `subject_tbl` WHERE `id` = '$subject_id'";
  $subject_res = $con->query($sql) or die($con->error);
  $subject_row = $subject_res->fetch_assoc();

  if($subject_row > 0){
      print $subject_row['subject_code'];
  }

}

?>