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
                            <input class="form-control" placeholder="Username" name="name" type="text" autofocus>
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
include_once 'config/database.php';
include_once 'objects/Users.php';

$database = new Database();
$db = $database->getConnection();

$users = new Users($db);

if(isset($_POST['login'])) {

    $user_err = $_POST['name'];
    $pass_err = $_POST['password'];

    if($user_err && $pass_err != '') {
        $users->name = $_POST['name'];
        $users->password = $_POST['password'];

        if ($users->checkUser()) {
            echo "<script>window.open('index.php','_SELF')</script>";
            $_SESSION['name'] = $users->name;
        } else {
            echo "<script>alert('Incorrect name or password.')</script>";
        }
    }
}
?>