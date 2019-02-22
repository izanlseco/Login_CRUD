<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="css\bootstrap.css">
    <title>Registration</title>
    <style>
        .wrapper{
            width: 500px;
            margin: 150px auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="d-flex justify-content-center">
        <div class="login-panel panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Registration</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="register.php">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Username" name="name" type="text" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="register" name="register" >
                    </fieldset>
                </form>
                <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php

include_once 'config/database.php';
include_once 'objects/Users.php';

$database = new Database();
$db = $database->getConnection();

$users = new Users($db);

if(isset($_POST['register'])) {
    $user_err = $_POST['name'];
    $pass_err = $_POST['password'];

    if($user_err == '') {
        echo"<script>alert('Please enter the name')</script>";
        exit();
    }

    if($pass_err == '') {
        echo"<script>alert('Please enter the password')</script>";
        exit();
    }

    if($user_err && $pass_err != '') {

        $users-> name = $_POST['name'];
        $users-> password = $_POST['password'];

        if ($users->create()) {
            header("location: login.php");
        } else {
            header("location: error.php");
        }
    }
}
?>