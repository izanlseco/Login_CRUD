<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <h2 class="pull-left">Available cars</h2>
                    <a href="logout.php" class="btn btn-danger pull-right">Logout</a>
                    <a href="create.php" class="btn btn-success pull-right">Add New Car</a>
                </div>
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

                $stmt = $availableCars->readAll();
                $num = $stmt->rowCount();

                if($num > 0){
                    echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>Plates</th>";
                                echo "<th>Brand</th>";
                                echo "<th>Model</th>";
                                echo "<th>Color</th>";
                                echo "<th>Kilometers</th>";
                                echo "<th>Action</th>";
                            echo "</tr>";
                        echo "</thead>";
                    echo "<tbody>";

                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                        extract($row);

                        echo "<tr>";
                            echo "<td>$license_plate</td>";
                            echo "<td>$brand</td>";
                            echo "<td>$model</td>";
                            echo "<td>$color</td>";
                            echo "<td>$kilometers</td>";
                            echo "<td>";
                                echo "<a href='update.php?id={$id}' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                echo "<a href='delete.php?id={$id}' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p class='lead'><em>No records were found.</em></p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>