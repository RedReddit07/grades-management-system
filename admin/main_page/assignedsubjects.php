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

                                $subject_assigned_lists = null;

                                $sql = "SELECT * FROM `subject_tbl` ORDER BY `subject_grade_lvl`";
                                $subject_res = $con->query($sql) or die($con->error);

                                while ($subject_row = $subject_res->fetch_array()) {
                                    $subject_assigned_lists[] = $subject_row;
                                }

                                ?>

                                <!-- A S S I G N E D  T E A C H E R -->

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
                                                <a href="assignedsubjects.php" class="active">
                                                    <span class="material-icons-sharp">local_library</span>
                                                    <h3>Assigned Subjects</h3>
                                                </a> <!-- end of Assigned Subjects -->


                                                <!-- My Account -->
                                                <a href="mysettings.php">
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
                                            <h1>Assigned Subjects</h1>

                                            <!-- Class Table -->
                                            <div class="class-table">
                                                <h2>Subject table</h2>
                                                <button class="btn btn-save mb-4" data-bs-toggle="modal" data-bs-target="#assignSubjectModal">
                                                    Assign a Subject
                                                </button>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th hidden>Subject ID</th>
                                                            <th>For Grade</th>
                                                            <th>Subject Code</th>
                                                            <th>Subject Name</th>
                                                        </tr>
                                                    </thead>
                                                    <?php if ($subject_assigned_lists > 0) { ?>
                                                        <tbody>
                                                            <?php foreach ($subject_assigned_lists as $subjects) : ?>
                                                                <tr>
                                                                    <td hidden> <?php echo $subjects['id'] ?></td>
                                                                    <td><?php echo $subjects['subject_grade_lvl'] ?></td>
                                                                    <td><?php echo $subjects['subject_code'] ?></td>
                                                                    <td><?php echo $subjects['subject_name'] ?></td>
                                                                    <td>
                                                                        <button class="btn delete-subject">
                                                                            <span class="material-icons-sharp" data-bs-toggle="modal" data-bs-target="#deleteSubjectModal">delete</span>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    <?php } else {
                                                        echo "No Subjects to display. Please add one";
                                                    } ?>
                                                </table>
                                                <br>
                                                <br>
                                            </div> <!-- end of Class Table-->

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
                                        </div> <!-- end of Right -->

                                    </div> <!-- end of Main Container -->
                                    <!--=====================================================-->
                                    <!-- Assign Subject Modal -->
                                    <div class="modal fade" id="assignSubjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Manage Subjects</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../functions/add/add_assigned_subject.php" method="POST">
                                                        <div class="col-12">
                                                            <!-- Drop down School Year -->
                                                            <label for="" class="form-label">A Subject For</label>
                                                            <select class="form-select" aria-label="Default select example" name="grade_lvl" required>
                                                                <option value="1" selected>Grade 1</option>
                                                                <option value="2">Grade 2</option>
                                                                <option value="3">Grade 3</option>
                                                                <option value="4">Grade 4</option>
                                                                <option value="5">Grade 5</option>
                                                                <option value="6">Grade 6</option>
                                                            </select>
                                                            <br>
                                                        </div>
                                                        <input type="hidden" class="form-control" placeholder="Subject Name" aria-label="Subject Name" id="subject_name" name="subname">
                                                        <div class="col-12">
                                                            <label for="" class="form-label">Subject Name</label>
                                                            <select class="form-select" aria-label="Default select example" name="subcode" id="subject_code" required>
                                                                <?php

                                                                $sql = "SELECT * FROM `subject_list_tbl`";
                                                                $res = $con->query($sql) or die($con->error);
                                                                $sub_row = $res->fetch_assoc();
                                                                ?>

                                                                <option selected>--select a subject--</option>
                                                                <?php do { ?>
                                                                    <option value="<?php echo $sub_row['subject_code'] ?>"> <?php echo $sub_row['subject_name'] ?></option>

                                                                <?php } while ($sub_row = $res->fetch_assoc()) ?>
                                                            </select>
                                                        </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-save" data-bs-toggle="modal" data-bs-target="#addSubjectModal">Add Subjects</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=====================================================-->
                                    <!-- Delete Subject Modal -->
                                    <div class="modal fade" id="deleteSubjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Subject</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../functions/delete/delete_assignedsubject.php" method="POST">
                                                        <div class="row">
                                                            <input type="hidden" name="subject_id" id="subjectID">
                                                            <p>Are you sure you want to delete this subject?</p>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-delete">Delete Subject</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                                    <!--=====================================================-->
                                    <!-- Bootstrap Javascript -->
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
                                    <!--=====================================================-->
                                    <!-- Sidebar Javascript-->
                                    <script src="../../js/res-sidenav/respons-side.js"></script>
                                    <!--=====================================================-->

                                    <script>
                                        $('.delete-subject').on('click', function() {

                                            $ts = $(this).closest('tr');

                                            var data = $ts.children("td").map(function() {
                                                return $(this).text();
                                            }).get();

                                            $('#subjectID').val(data[0]);

                                        });
                                    </script>
                                </body>

                                </html>