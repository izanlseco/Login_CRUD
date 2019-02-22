<?php
class Users {
    private $conn;
    private $tableName = "users";

    public $id;
    public $name;
    public $password;

    public function __construct($db){
        $this->conn = $db;
    }

    function checkUser(){
        $query = "SELECT name, password,
                  COUNT(*) FROM
                  " . $this->tableName ."
                  WHERE name=:name AND password=:password";
        $stmt = $this->conn->prepare($query);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->password=htmlspecialchars(strip_tags($this->password));

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":password", $this->password);

        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }

    function create() {
        $query = "INSERT INTO
                    " . $this->tableName ."
                    SET
                    name=:name, password=:password";
        $stmt = $this->conn->prepare($query);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->password=htmlspecialchars(strip_tags($this->password));

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":password", $this->password);

        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }
}
