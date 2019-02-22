<?php
session_start();
if(!$_SESSION['name']) {
    header("Location: register.php");
}

include_once 'config/database.php';
include_once 'objects/AvailableCars.php';

$database = new Database();
$db = $database->getConnection();

$availableCars = new AvailableCars($db);

if(isset($_POST["id"]) && !empty($_POST["id"])){

    $availableCars->id = $_POST['id'];

    if ($availableCars->delete()) {
        header("location: index.php");
    } else {
        echo "<div class='alert alert-danger'>Unable to delete the car.</div>";
    }
} else if(empty(trim($_GET["id"]))){
        header("location: error.php");
        exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Delete Record</h1>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="alert alert-danger fade in">
                        <p>Are you sure you want to delete this record? This action cannot be undone.</p><br>
                        <p>
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <input type="submit" value="Yes" class="btn btn-danger">
                            <a href="index.php" class="btn btn-default">No</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>