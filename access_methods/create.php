<?php  

    require_once('../config/databaseConfig.php');
    require_once('../objects/train.php');

    $dbLink = new DatabasePDO();
    $db = $dbLink->DBconncect();

    $train = new Train($db);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Train insert</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/foundation.min.css" />
    <script src="../js/jquery.js"></script>
    <script src="../js/foundation.min.js"></script>
    <script src="../js/what-input.js"></script>
</head>
<body>

    <div class="page-title">
        <div class="row">
            <div class="columns medium-12 text-center">
                <h1>Input page</h1>
            </div>
        </div>
    </div>

    <div id="form-container">
        <div class="row">
            <div class="columns medium-12 text-center">
                <form action="create.php" method="POST">
                    <div class="row">
                        <div class="columns medium-6 text-left">
                            <label for="id-train">ID train</label>
                            <input type="number" name="id-train" id="id-train" required />
                        </div>
                        <div class="columns medium-6 text-left">
                            <label for="train-type">Train type</label>
                            <input type="text" name="train-type" id="train-type" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="columns medium-6 text-left">
                            <label for="departure">Departure</label>
                            <input type="text" name="departure" id="departure" required />
                        </div>
                        <div class="columns medium-6 text-left">
                            <label for="arrival">Arrival</label>
                            <input type="text" name="arrival" id="arrival" required />
                        </div>
                    </div>
                    <input type="submit" class="button" value="Insert" name="insert" />
                </form>
            </div>
        </div>
    </div>

<?php
    if(isset($_POST['insert'])) {
        if($_POST['id-train'] != "" && $_POST['train-type'] != "" && $_POST['departure'] != "" && $_POST['arrival'] != "") {
            $train->id_train = $_POST['id-train'];
            $train->type = $_POST['train-type'];
            $train->departure_city = $_POST['departure'];
            $train->arrival_city = $_POST['arrival'];
    
            if($train->create()) { 
        ?>
                <script>alert("Train created");</script>
        <?php
            } else {
        ?>
                <script>alert("An errore was occurred");</script>
        <?php
            }
        } else {?> 
            <script>alert("There are empty values")</script>
        <?php
        }
    }
?>
    <script>
        jQuery(document).foundation();    
    </script>
</body>
</html>