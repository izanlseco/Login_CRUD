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
require_once "config/config.php";
if(isset($_POST['register'])) {
    $user_name = $_POST['name'];
    $user_pass = $_POST['password'];

    if($user_name == '') {
        echo"<script>alert('Please enter the name')</script>";
        exit();
    }

    if($user_pass == '') {
        echo"<script>alert('Please enter the password')</script>";
        exit();
    }

    $check_name_query = "SELECT * FROM users WHERE name = '$user_name'";
    $run_query = mysqli_query($dbcon,$check_name_query);

    if(mysqli_num_rows($run_query)>0) {
        echo "<script>alert(config$user_name)</script>";
        exit();
    }

    $insert_user = "INSERT INTO users (name, password) VALUE ('$user_name', '$user_pass')";
    if(mysqli_query($dbcon,$insert_user)) {
        echo "<script>window.open('login.php','_self')</script>";
    }
}
?>