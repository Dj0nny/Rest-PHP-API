<?php
    require_once("../config/databaseConfig.php");
    require_once("../objects/train.php");

    $dbLink = new DatabasePDO();
    $db = $dbLink->DBconncect();

    $train = new Train($db);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Delete</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/foundation.min.css" />
        <script src="../js/jquery.js"></script>
        <script src="../js/foundation.min.js"></script>
        <script src="../js/what-input.js"></script>
        <style>
            input.button {
                margin-top: 22px;
            }
        </style>
    </head>
    <body>
        <div class="page-title">
            <div class="row">
                <div class="columns medium-12 text-center">
                    <h1>Delete page</h1>
                </div>
            </div>
        </div>

        <div id="form-container">
            <div class="row">
                <div class="columns medium-12">
                    <form action="delete.php" method="POST">
                        <div class="row">
                            <div class="column medium-6">
                                <label for="id-train">ID train</label>
                                <input type="number" id="id-train" name="id-train" required />
                            </div>
                            <div class="column medium-4">
                                <input type="submit" class="button" value="Delete" name="delete"/> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
            if(isset($_POST['delete'])) {
                if($_POST['id-train'] != "") {
                    $train->id_train = $_POST['id-train'];
                    $trainDeleteID = $_POST['id-train'];
                    
                    $searchedTrain = $train->search($trainDeleteID);
                    $num = $searchedTrain->rowCount();

                    if($num > 0) {
                        if($train->delete()) { ?>
                            <script>alert("Train cancelled");</script>
                        <?php
                        } else { ?>
                            <script>alert("An error occured");</script>
                        <?php
                        }
                    } else ?>
                        <script>alert("No element found");</script>
                    <?php
                } else { ?>
                    <script>alert("The value is empty");</script>
            <?php    
                }
            ?>
        <?php
            }
        ?>


    </body>
</html>