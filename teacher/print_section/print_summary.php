<?php

include_once("../../connection/connection.php");
$con = connection();

$section_id = $_GET['id'];
$summary = $_GET['summary'];

$pupils_in_section = null;

$sql = "SELECT DISTINCT student_id FROM `student_subject_record_tbl` WHERE `section_id` = '$section_id'";

$pis_res = $con->query($sql) or die($con->error);
while ($pis_row = $pis_res->fetch_assoc()) {
    $pupils_in_section[] = $pis_row;
}

$pupil_subjects = null;
$subject_id = null;
$indexCounter = 0;

$sql = "SELECT DISTINCT subject_id FROM `student_subject_record_tbl` WHERE `section_id` = '$section_id'";

$pis_res = $con->query($sql) or die($con->error);
while ($pis_row = $pis_res->fetch_assoc()) {
    $pupil_subjects[] = $pis_row;
}


function selectSubjectName($subject_id)
{

    $con = connection();

    $sql = "SELECT * FROM `subject_tbl` WHERE `id` = '$subject_id'";

    $res = $con->query($sql) or die($con->error);
    $subject = $res->fetch_assoc();

    if ($subject > 0) {
        print $subject['subject_name'];
    }
}


function pupilGrade($student_id, $subject_id, $quarterly_grade)
{
    $con = connection();

    $sql = "SELECT * FROM `student_subject_record_tbl` WHERE `student_id` = '$student_id' AND subject_id = '$subject_id'";

    $res = $con->query($sql) or die($con->error);
    $row = $res->fetch_assoc();
    // while($row = $res->fetch_assoc()){
    //     $pupil_grade[] = $row;
    // }

    return $row[$quarterly_grade];
}

function getPupilName($student_id)
{
    $con = connection();

    $sql = "SELECT * FROM `student_tbl` WHERE `id` = '$student_id'";

    $res = $con->query($sql) or die($con->error);
    $row = $res->fetch_assoc();
    // while($row = $res->fetch_assoc()){
    //     $pupil_grade[] = $row;
    // }

    $fullname = $row['lastname'] . ', ' . $row['firstname'] . ' ' . $row['middlename'];
    return $fullname;
}

$sql = "SELECT * FROM `section_tbl` WHERE `id` = '$section_id'";
$section_res = $con->query($sql) or die($con->error);
$section_row = $section_res->fetch_assoc();

if ($summary == '1st_grade') {
    $grading_period = "FIRST GRADING PERIOD";
} else if ($summary == '2nd_grade') {
    $grading_period = "SECOND GRADING PERIOD";
} else if ($summary == '3rd_grade') {
    $grading_period = "THIRD GRADING PERIOD";
} else if ($summary == '4th_grade') {
    $grading_period = "FOURTH GRADING PERIOD";
} else {
    $grading_period = "";
}

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <!-- Website Logo -->
    <link rel="shortcut icon" type="x-icon" href="../../img/logo/speslogo.png">
    <!-- end of Website Logo -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Table CSS Link-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">

    <!-- Bootstrap Icon Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- My CSS -->

    <!-- My Navbar -->
    <link rel="stylesheet" href="../../css/res-sidenav/respons-side.css">

    <!-- Teacher CSS-->
    <link rel="stylesheet" href="../../css/teacher/teacher.css">

    <!-- Table CSS -->
    <link rel="stylesheet" href="../../css/table/table.css">


    <title>SPES Grades Management System</title> <!-- Tab Title -->

</head>

<body onload="print()" style="margin:20px">

    <!--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=-->
    <!-- T A B L E-->
    <?php echo "<h1>{$grading_period}</h1>" ?>
    <h4>for Section: <?php echo $section_row['sectionname'] ?></h4>
    <table id="spes_table" class="table table-bordered caption-top" style="width:100%; text-align:center;">
        <?php if ($pupil_subjects > 0) { ?>
            <thead style="background-color: #E75858; color: white;">
                <tr>
                    <th>Pupil's Name</th>

                    <?php foreach ($pupil_subjects as $data) { ?>
                        <th>
                            <?php echo selectSubjectName($data['subject_id']) ?>
                            <?php $subject_id[] = $data['subject_id'] ?>
                        </th>
                    <?php

                        $indexCounter++;
                    }
                    ?>

                </tr>
            </thead>

            <tbody>

                <?php $ctr = 0 ?>
                <?php foreach ($pupils_in_section as $pis) { ?>
                    <tr>
                        <?php $pupil_grade = null; ?>
                        <?php // $pupil_grade[] = pupilGrade($pis['student_id'], $subject_id[$indexCounter - 1]);
                        ?>

                        <td><?php echo getPupilName($pis['student_id']) ?></td>

                        <?php

                        for ($i = 0; $i < $indexCounter; $i++) {
                            echo '<td>';
                            echo pupilGrade($pis['student_id'], $subject_id[$i], '1st_grade');
                            echo '</td>';
                        }

                        ?>


                    </tr>
                <?php

                }
                ?>

            </tbody>
        <?php
        } else {
            echo "Add subjects to this section first.";
        }
        ?>
    </table>
    <!--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=--=-->

    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- Table Script -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <!-- My Script-->

    <!-- Side Navigational Bar JS -->
    <script src="../js/sidenavbar/sidenavbar.js"></script>
    <!-- Table JS -->
    <script src="../js/table/table.js"></script>

</body>

</html>