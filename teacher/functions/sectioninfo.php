<?php 
include_once("../../connection/connection.php");

function getSectionInfo($section_id, $type){
        
        $con = connection();
      
        $sql = "SELECT * FROM `section_tbl` WHERE `id` = '$section_id'"; 
        $res = $con->query($sql) or die($con->error);
      
        $row = $res->fetch_assoc();
      
        if ($row > 0){
            return $row[$type];
        }else{
          return 'No Section found';
        }
      
}

?>