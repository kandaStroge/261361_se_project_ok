<?php
require_once (__DIR__."/../config.php");
$connect =  new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
class Database{
    private $conn;

    public function __construct(){
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        return $this->conn;
    }

    private function query($sql){
        $this->conn->prepare($sql);
    }

    public function result($table_name){
        $sql = "SELECT * FROM ".$table_name;
        $res = $this->query($sql);
        return $res;
    }

    public function update_table($table_name){

    }
}

?>