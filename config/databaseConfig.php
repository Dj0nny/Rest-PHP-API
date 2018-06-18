<?php

class DatabasePDO {
    private $host = "localhost";
    private $database = "resttrains";
    private $userdb = "root";
    private $pswdb = "";
    public $connection;

    public function DBconncect() {
        $this->connection = null;

        try {
            $this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->database, $this->userdb, $this->pswdb);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->exec("set names utf8");
        } catch(PDOException $e) {
            die("An error occured $this->database ".$e->getMessage());
        }

        return $this->connection;
    }
}

?>