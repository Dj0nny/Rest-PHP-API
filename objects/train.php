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
    
    function create() {
        $sqlInsert = "INSERT INTO ".$this->db_table."(id_train, type, departure_city, arrival_city) VALUES (?,?,?,?)";
        $sqlInsertOK = $this->connection->prepare($sqlInsert);

        if($sqlInsertOK->execute([$this->id_train, $this->type, $this->departure_city, $this->arrival_city])) {
            return true;
        }
        return false;
    }

    function search($key) {
        $sqlSearch = "SELECT * FROM ".$this->db_table." WHERE id_train = ?";
        $sqlSearchOK = $this->connection->prepare($sqlSearch);

        $sqlSearchOK->execute([$key]);

        return $sqlSearchOK;
    }

    function searchByCity($cityDep, $cityArri) {
        $sqlSearchCity = "SELECT * FROM ".$this->db_table." WHERE departure_city = ? OR arrival_city = ?";
        $sqlSearchCityOK = $this->connection->prepare($sqlSearchCity);

        $sqlSearchCityOK->execute([$cityDep, $cityArri]);

        return $sqlSearchCityOK;
    }

    function delete() {
        $queryDelete = "DELETE FROM ".$this->db_table." WHERE id_train = ?";
        $queryDeleteOK = $this->connection->prepare($queryDelete);

        if($queryDeleteOK->execute([$this->id_train])) {
            return true;
        }

        return false;
    }
}

?>