<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/foundation.min.css" />
    <script src="../js/jquery.js"></script>
    <script src="../js/foundation.min.js"></script>
    <script src="../js/what-input.js"></script>
    <style>
        .columns.medium-4 .button {
            margin-top: 22px;
        }      
    </style>
</head>
<body>
    <div class="page-title">
        <div class="row">
            <div class="columns medium-12 text-center">
                <h1>Search</h1>
            </div>
        </div>
    </div>

    <div id="form-container">
        <form action="../commons/print.php" method="GET">
            <div class="row">
                <div class="columns medium-6">
                    <label for="id-train">Insert the train ID</label>
                    <input type="number" name="id-train" id="id-train" required />
                </div>
                <div class="columns medium-4">
                    <input type="submit" class="button" value="Search" />
                </div>
            </div>
        </form>
    </div>
</body>
</html>