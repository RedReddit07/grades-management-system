<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['adminID'])) {

    $admin_id = $_SESSION['adminID'];
} else {
    echo "<script>alert('Please relogin Again')</script>";
    echo header("Location: ../../login/login.php");
}
/* MySQL Connection */
include_once("../../connection/connection.php");
$con = connection();

/* To get the admin password */
$sql = "SELECT * FROM `users` WHERE `id` = '$admin_id'";
$admin_account_res = $con->query($sql) or die($con->error);
$admin_account_row = $admin_account_res->fetch_assoc();

?>

<!-- M Y  S E T T I N G S -->

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

    <!-- Admin CSS-->
    <link rel="stylesheet" href="../../css/admin/admin.css">

    <!-- Table CSS -->
    <link rel="stylesheet" href="../../css/table/table.css">

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
                    <h3>Dashboard</h3>
                </a> <!-- end of Dashboard -->

                <!-- My Subjects -->
                <a href="subjects.php">
                    <span class="material-icons-sharp">auto_stories</span>
                    <h3>Subjects</h3>
                </a> <!-- end of My Subjects -->

                <!-- Assigned Subjects -->
                <a href="assignedsubjects.php">
                    <span class="material-icons-sharp">local_library</span>
                    <h3>Assigned Subjects</h3>
                </a> <!-- end of Assigned Subjects -->


                <!-- My Account -->
                <a href="mysettings.php" class="active">
                    <span class="material-icons-sharp">manage_accounts</span>
                    <h3>My Account</h3>
                </a> <!-- end of My Account -->

                <form action="../functions/logout.php" method="POST">
                    <button type="submit" name="btn-logout">
                        <a>
                            <!-- Logout -->
                            <span class="material-icons-sharp">logout</span>
                            <h3>Logout</h3>
                        </a><!-- end of Logout -->
                    </button>
                </form>
            </div>

        </aside> <!-- end of ASIDE-->
        <main>
            <h1>My Settings</h1>

            <div class="profile-card">
                <div class="teacher-logo">
                    <img src="../../img/admin/admin.png" alt="">
                </div>
                <div class="teacher-info">
                    <div class="teacher-name">
                        <h2>Admin</h2>
                        <p><i>Admin</i></p>
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
                <!-- <div class="theme-toggler">
                <span class="material-icons-sharp active">light_mode</span>
                <span class="material-icons-sharp">dark_mode</span>
            </div> -->
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Admin</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="../../img/admin/admin.png" alt="">
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
                    <form action="../functions/password/admin_change_pass.php" method="POST">
                        <input type="hidden" name="admin_id" value="<?php echo $admin_id ?>">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Password</label>
                            <input type="text" class="form-control" name="new_pass" placeholder="Input New Password" value="<?php echo $admin_account_row['password'] ?>" required maxlength="16">
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