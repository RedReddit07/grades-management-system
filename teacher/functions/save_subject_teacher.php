<?php

function saveSubjectTeacher($section_id,$subject_ctr){
  
  $con = connection();

  for($i = 1; $i <= $subject_ctr; $i++){
      
      $sub_teacher = $_POST['assigned_teacher'. $i];
      $id = $_POST['subject_id'.$i];

      if($sub_teacher != 'null'){

        $sql = "UPDATE `subject_assigned_section_tbl` SET `subject_teacher`='$sub_teacher' WHERE `id` = '$id' AND `section_id` = $section_id";
        $con->query($sql) or die ($con->error);
        
      }

  }

}


?>