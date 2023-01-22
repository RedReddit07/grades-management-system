<?php

if (!isset($_SESSION)){
    session_start();
}

include_once("../connection/connection.php");
$con = connection(); 

if(isset($_POST['login_btn'])){
    
    $user = mysqli_escape_string($con, $_POST['userID']);
    $pass = mysqli_escape_string($con, $_POST['userPass']);

    $sql = "SELECT * 
    FROM `users` 
    WHERE `username` = '$user' AND `password` = '$pass' AND `role` = 'Admin' AND `status` = 'Active'";
    
    $res = $con->query($sql) or die ($con->error);
    $row = $res->fetch_assoc();

    if ($row > 0){

        $id = $row['id'];

        $sql2 = "SELECT * FROM `teacher` WHERE `id` = '$id'";
        $admin_res = $con->query($sql2) or die ($con->error);
        $admin_row = $admin_res->fetch_assoc();
    
        $_SESSION['adminID'] = $admin_row['id'];
    
        echo header("Location: ../admin/main_page/dashboard.php");
    }else{
        echo "<script>alert('No User Account found, Please try again') </script>";

    }
    
}

?>

<!doctype html>
<html lang="en">
        <head>
        <!-- Website Logo -->
        <link rel="shortcut icon" type="x-icon" href="../img/logo/speslogo.png">
        <!-- end of Website Logo -->
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!--  My CSS  -->
        <link rel="stylesheet" href="../css/login/login_admin.css">

        <title>SPES Grades Management System</title>
        </head>
    <body>
    
    <div class="container">
        <div class="login-form">
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <div class="card">
                        <div class="logo text-center">
                            <img src="../img/logo/speslogo.png" width="100px">
                            <h3>Sorsogon Pilot Elementary School</h3>
                            <p>Grades Management System</p>
                        </div>
                        <br>
                        <h3>Login as <span>Admin</span></h3>
                        <p>Manage everything!</p>
                            <form action="" method="POST">

                                <!--admin id-->
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="userID" id="userlabel" placeholder="Admin ID" required>
                                </div>
                                <!--admin password-->
                                <div class="mb-3">
                                    <input type="password" class="form-control" name="userPass" id="passlabel" placeholder="Password" required>
                                </div>
                                
                                <button type="submit" class="btn" name="login_btn">Login</button>
                                <br>
                                <br>
                                <p class="text-center">Trouble signing in? Contact the <i>Developer Team</i> </p>
                            </form>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>