<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['pupilID'])) {

    $student_id = $_SESSION['pupilID'];
} else {
    echo "<script>alert('Please relogin Again')</script>";
    echo header("Location: ../../login/login.php");
}

/* MySQL Connection */
include_once("../../connection/connection.php");
$con = connection();

include '../functions/refresh-grades.php';
onLoad($student_id);

$user_lrn = getLRN($student_id);

function getPupilName($student_id)
{
    $con = connection();


    $sql = "SELECT * FROM `student_tbl` WHERE id = '$student_id'";
    $res = $con->query($sql) or die($con->error);

    $row = $res->fetch_assoc();

    $fullname = "";

    if ($row > 0) {
        $fullname = $row['firstname'] . ' ' . $row['lastname'];
    }


    return $fullname;
}

function getLRN($student_id)
{
    $con = connection();

    $lrn = null;

    $sql = "SELECT * FROM `student_tbl` WHERE id = '$student_id'";
    $res = $con->query($sql) or die($con->error);

    $row = $res->fetch_assoc();

    $lrn = $row['lrn'];

    return $lrn;
}

// To get the pupil's gender
function getpupilGender($student_id)
{

    $con = connection();
    $sql = "SELECT * FROM `student_tbl` WHERE `id` = '$student_id'";
    $res = $con->query($sql) or die($con->error);

    $row = $res->fetch_assoc();
    if ($row > 0) {
        echo $row;
    }
}


/* To get the pupil account */
$sql = "SELECT * FROM `pupil_account_tbl` WHERE `pupil_id` = '$student_id'";
$account_res = $con->query($sql) or die($con->error);
$account_row = $account_res->fetch_assoc();

?>

<!-- D A S H B O A R D  T E A C H E R -->

<!--=====================================================-->
<!doctype html>
<html lang="en">

<head>
    <!-- Website Logo -->
    <link rel="shortcut icon" type="x-icon" href="../../img/logo/speslogo.png">
    <!-- end of Website Logo -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=====================================================-->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!--=====================================================-->

    <!-- Google Material Icon Link -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <!--=====================================================-->

    <!-- My Navbar -->
    <link rel="stylesheet" href="../../css/res-sidenav/respons-side.css">

    <!-- Pupil CSS-->
    <link rel="stylesheet" href="../../css/pupil/pupil.css">

    <!-- Table CSS -->
    <link rel="stylesheet" href="../../css/table/table.css">

    <script src="../../js/theme/load-theme.js"></script>

    <!--=====================================================-->

    <title>Grades Management System</title>
</head>

<body>
    <!--=====================================================-->
    <!-- Main Container -->
    <div class="main-container">
        <aside>
            <!-- Top Navbar -->
            <div class="top">
                <!-- Logo -->
                <div class="logo">
                    <img src="../../img/logo/speslogo.png" alt="">
                    <h2>GMS <span class="variant">SPES</span></h2>
                </div> <!-- end of Logo -->

                <!-- Close Button -->
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div> <!-- end of Close Button -->

            </div> <!-- end of Top Navbar -->

            <!-- Side Navbar -->
            <div class="sidebar">
                <!-- Dashboard -->
                <a href="dashboard.php">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>View Grades</h3>
                </a> <!-- end of Dashboard -->

                <!-- My Account -->
                <a href="mysettings.php" class="active">
                    <span class="material-icons-sharp">manage_accounts</span>
                    <h3>My Account</h3>
                </a> <!-- end of My Account -->

                <!-- Logout -->
                <form action="../functions/logout.php" method="POST">
                    <button type="submit" name="btn-logout">
                        <a>
                            <!-- Logout -->
                            <span class="material-icons-sharp">logout</span>
                            <h3>Logout</h3>
                        </a><!-- end of Logout -->
                    </button>
                </form>
                <!-- end of Logout -->
            </div>

        </aside> <!-- end of ASIDE-->
        <main>
            <h1>My Settings</h1>

            <div class="profile-card">
                <div class="teacher-logo">

                    <img src="../../img/assets/pupil/profile-pic.svg">

                </div>
                <div class="teacher-info">
                    <div class="teacher-name">
                        <h2><?php echo getPupilName($student_id); ?></h2>
                        <p><i>LRN: </i> <?php echo $user_lrn ?></p>
                    </div>
                </div>
            </div>

        </main> <!-- end of Main -->

        <!-- Right -->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <!-- Light and Dark Icon -->
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b> <?php echo getPupilName($student_id); ?></b></p>
                        <small class="text-muted">Pupil</small>
                    </div>
                    <div class="profile-photo">
                        <img src="../../img/assets/pupil/profile-pic.svg">
                    </div>
                </div>
            </div> <!-- end of Top -->

            <div class="date-submission">
                <h2>Manage Account</h2>
                <div class="submit-date online">
                    <div class="icon">
                        <span class="material-icons-sharp">password</span>
                    </div>
                    <div class="add-submission-date">
                        <div data-bs-toggle="modal" data-bs-target="#changePassModal">
                            <h3>Change Password</h3>
                        </div>
                    </div>
                </div>


            </div>

        </div> <!-- end of Right -->

    </div> <!-- end of Main Container -->
    <!--=====================================================-->

    <!-- Modal -->
    <div class="modal fade" id="changePassModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Manage Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../functions/password/change_pass.php" method="POST">
                        <input type="hidden" name="pupil_id" value="<?php echo $student_id ?>">
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" name="new_pass" placeholder="Input New Password" value="<?php echo $account_row['password'] ?>" required maxlength="16">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-save">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--=====================================================-->
    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!--=====================================================-->
    <!-- Sidebar Javascript-->
    <script src="../../js/res-sidenav/respons-side.js"></script>
    <!--=====================================================-->
</body>

</html>