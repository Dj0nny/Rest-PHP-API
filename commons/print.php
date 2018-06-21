<?php
    header("Access-Control-Allow-Origin:*");
    header("Content-Type: application/json; charset=UTF-8");

    require_once("../config/databaseConfig.php");
    require_once("../objects/train.php");

    $dbLink = new DatabasePDO();
    $db = $dbLink->DBconncect();

    $train = new Train($db);

    switch ($_POST['searching_id']) {
        case '1':
            if(isset($_POST['id-train']) && $_POST['id-train'] != "") {
                $idPOST = $_POST['id-train'];
                $query = $train->search($idPOST);
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
            break;

        case '2':
                if(isset($_POST['departure']) || isset($_POST['arrival'])) {
                    $departurePOST = $_POST['departure'];
                    $arrivalPOST = $_POST['arrival'];

                    $query = $train->searchByCity($departurePOST, $arrivalPOST);
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
            break;
    }
?>