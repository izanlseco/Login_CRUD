<?php
class AvailableCars{
    private $conn;
    private $tableName = "available_cars";

    public $id;
    public $license_plate;
    public $brand;
    public $model;
    public $color;
    public $kilometers;

    public function __construct($db){
        $this->conn = $db;
    }

    function readAll(){
        $query = "SELECT
                    *
                FROM
                    " . $this->tableName . "
                    ";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }

    function readOne(){

        $query = "SELECT
                license_plate, brand, model, color, kilometers
            FROM
                " . $this->tableName . "
            WHERE
                id = ?
            LIMIT
                0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->license_plate = $row['license_plate'];
        $this->brand = $row['brand'];
        $this->model = $row['model'];
        $this->color = $row['color'];
        $this->kilometers = $row['kilometers'];
    }

    function create() {
        $query = "INSERT INTO
                    " . $this->tableName ."
                    SET
                    license_plate=:plate, brand=:brand, model=:model, color=:color, kilometers=:kilometers";

        $stmt = $this->conn->prepare($query);

        $this->license_plate=htmlspecialchars(strip_tags($this->license_plate));
        $this->brand=htmlspecialchars(strip_tags($this->brand));
        $this->model=htmlspecialchars(strip_tags($this->model));
        $this->color=htmlspecialchars(strip_tags($this->color));
        $this->kilometers=htmlspecialchars(strip_tags($this->kilometers));

        $stmt->bindParam(":plate", $this->license_plate);
        $stmt->bindParam(":brand", $this->brand);
        $stmt->bindParam(":model", $this->model);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":kilometers", $this->kilometers);

        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    function update() {
        $query = "UPDATE
         " . $this->tableName . " 
         SET 
         license_plate=:plate,
          brand=:brand,
           model=:model,
            color=:color,
             kilometers=:kilometers 
             WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->license_plate=htmlspecialchars(strip_tags($this->license_plate));
        $this->brand=htmlspecialchars(strip_tags($this->brand));
        $this->model=htmlspecialchars(strip_tags($this->model));
        $this->color=htmlspecialchars(strip_tags($this->color));
        $this->kilometers=htmlspecialchars(strip_tags($this->kilometers));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":plate", $this->license_plate);
        $stmt->bindParam(":brand", $this->brand);
        $stmt->bindParam(":model", $this->model);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":kilometers", $this->kilometers);

        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    function delete() {
        $query = "DELETE FROM
                    " . $this->tableName ."
                    WHERE
                    id=?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if($result = $stmt->execute()){
            return true;
        } else {
            return false;
        }
    }
}