<?php

function getSYName($sy_id)
{
    $con = connection();

    /* School Year Selector*/
    $sql = "SELECT * FROM `schoolyear_tbl` WHERE `SchoolYear` = '$sy_id'";
    $sy_res = $con->query($sql) or die($con->error);
    $sy_row = $sy_res->fetch_assoc();

    return $sy_row['SchoolYear'];
}


?>
