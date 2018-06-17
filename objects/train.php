<?php

class Train {
    private $connection;
    private $db_table = "trains";

    public $id_train;
    public $type;
    public $departure_city;
    public $arrival_city;

    public function __construct($db) {
        $this->connection = $db;
    }

    function read() {
        $sql = "SELECT * FROM ".$this->db_table." ORDER BY id_train ASC";
        $sqlOK = $this->connection->prepare($sql);
        $sqlOK->execute();
        
        return $sqlOK;
    }
    
}

?>