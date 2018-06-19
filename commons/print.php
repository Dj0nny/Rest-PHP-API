<?php
    header("Access-Control-Allow-Origin:*");
    header("Content-Type: application/json; charset=UTF-8");

    require_once("../config/databaseConfig.php");
    require_once("../objects/train.php");

    $dbLink = new DatabasePDO();
    $db = $dbLink->DBconncect();

    $train = new Train($db);

    if(isset($_GET['id-train']) && $_GET['id-train'] != "") {
        $idGET = $_GET['id-train'];
        $query = $train->search($idGET);
        $num = $query->rowCount();

        if($num > 0) {
            $result_elements = array();
            $result_elements['trains'] = array();

            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $element = array(
                    "id_train" => $id_train,
                    "train_type" => $type,
                    "departure"=> $departure_city,
                    "arrival" => $arrival_city
                );

                array_push($result_elements['trains'], $element);
            }

            echo json_encode($result_elements);
        } else {
            echo json_encode(array("message" => "No train found with this ID"));
        }
    }
?>