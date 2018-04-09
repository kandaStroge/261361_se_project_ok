<?php
include_once realpath("config.php");
class Database{
    private $conn;

    public function __construct(){
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
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