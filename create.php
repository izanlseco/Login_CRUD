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

$plate = $brand = $model = $color = $kilometers = "";
$plate_err = $brand_err = $model_err = $color_err = $km_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_plate = trim($_POST["plate"]);
    if(empty($input_plate)){
        $plate_err = "Please enter a valid license plate.";
    } else{
        $plate = $input_plate;
    }

    $input_brand = trim($_POST["brand"]);
    if(empty($input_brand)){
        $brand_err = "Please enter the brand.";
    } else{
        $brand = $input_brand;
    }

    $input_model = trim($_POST["model"]);
    if(empty($input_model)){
        $model_err = "Please enter the model.";
    } else{
        $model = $input_model;
    }

    $input_color = trim($_POST["color"]);
    if(empty($input_color)){
        $color_err = "Please enter a color.";
    } else{
        $color = $input_color;
    }

    $input_km = trim($_POST["kilometers"]);
    if(empty($input_km)){
        $km_err = "Please enter the kilometers amount.";
    } elseif(!ctype_digit($input_km)){
        $km_err = "Please enter a positive integer value.";
    } else{
        $kilometers = $input_km;
    }

    if(empty($plate_err) && empty($brand_err) && empty($model_err) && empty($color_err) && empty($km_err)) {
        $availableCars->license_plate = $_POST['plate'];
        $availableCars->brand = $_POST['brand'];
        $availableCars->model = $_POST['model'];
        $availableCars->color = $_POST['color'];
        $availableCars->kilometers = $_POST['kilometers'];

        if ($availableCars->create()) {
            header("location: index.php");
        } else {
            echo "<div class='alert alert-danger'>Unable to put the car.</div>";
        }
    } else {
        header("location: error.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2>Create Record</h2>
                </div>
                <p>Please fill this form and submit to add a new car record to the database.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($plate_err)) ? 'has-error' : ''; ?>">
                        <label>License plate</label>
                        <input type="text" name="plate" class="form-control" value="<?php echo $plate; ?>">
                        <span class="help-block"><?php echo $plate_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($brand_err)) ? 'has-error' : ''; ?>">
                        <label>Brand</label>
                        <input type="text" name="brand" class="form-control" value="<?php echo $brand; ?>">
                        <span class="help-block"><?php echo $brand_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($model_err)) ? 'has-error' : ''; ?>">
                        <label>Model</label>
                        <input type="text" name="model" class="form-control" value="<?php echo $model; ?>">
                        <span class="help-block"><?php echo $model_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($color_err)) ? 'has-error' : ''; ?>">
                        <label>Color</label>
                        <input type="text" name="color" class="form-control" value="<?php echo $color; ?>">
                        <span class="help-block"><?php echo $color_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($km_err)) ? 'has-error' : ''; ?>">
                        <label>Kilometers</label>
                        <input type="text" name="kilometers" class="form-control" value="<?php echo $kilometers; ?>">
                        <span class="help-block"><?php echo $km_err;?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>