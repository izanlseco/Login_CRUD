<?php
    session_start();
?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="css\bootstrap.css">
    <title>Login</title>
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
                <h3 class="panel-title">Sign In</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="login.php">
                    <fieldset>
                        <div class="form-group"  >
                            <input class="form-control" placeholder="Name" name="name" type="name" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php
require_once "config/config.php";
if(isset($_POST['login'])) {
    $user_name = $_POST['name'];
    $user_pass = $_POST['password'];

    $check_user = "SELECT * FROM users WHERE name = '$user_name' AND password = '$user_pass'";
    $run = mysqli_query($dbcon, $check_user);

    if(mysqli_num_rows($run)) {
        echo "<script>window.open('index.php','_SELF')</script>";
        $_SESSION['name'] = $user_name;
    } else {
        echo "<script>alert('Name or password is incorrect!')</script>";
    }
}
?>