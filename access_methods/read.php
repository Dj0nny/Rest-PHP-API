<?php
    header("Access-Control-Allow-Origin:*");
    header("Content-Type:application/json; charset=UTF-8");

    require_once('../config/databaseConfig.php');
    require_once('../objects/train.php');

    $link = new DatabasePDO();
    $db = $link->DBconncect();

    $train = new Train($db);

    $query = $train->read();
    $num = $query->rowCount();

    if($num > 0) {
        $trainsArray = array();
        $trainsArray["trains"] = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $train_item = array(
                "id_train"=>$id_train,
                "train_type"=>$type,
                "departure"=>$departure_city,
                "arrival"=>$arrival_city
            );

            array_push($trainsArray["trains"], $train_item);
        }

        echo json_encode($trainsArray);
    } else {
        echo json_encode(
            array("message"=>"No trains found")
        );
    }

?>