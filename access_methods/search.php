<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/foundation.min.css" />
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

    <div class="controls">
        <div class="row">
            <div class="columns">
                <ul class="tabs" data-tabs id="control-tabs">
                    <li class="tabs-title is-active" aria-selected="true"><a href="#panel0">Search by ID</a></li>
                    <li class="tabs-title"><a href="#panel1">Search by city</a></li>
                </ul>

                <div class="tabs-content" data-tabs-content="control-tabs">
                    <div class="tabs-panel is-active" id="panel0">
                        <div class="form-container">
                            <form action="../commons/print.php" method="POST">
                                <div class="row">
                                    <div class="columns medium-6">
                                        <label for="id-train">Insert the train ID</label>
                                        <input type="number" name="id-train" id="id-train" required />
                                        <input type="hidden" value="1" name="searching_id"/>
                                    </div>
                                    <div class="columns medium-4">
                                        <input type="submit" class="button" value="Search" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel1">
                        <div class="form-contaniner">
                            <form action="../commons/print.php" method="POST">
                                <div class="row">
                                    <div class="columns medium-6">
                                        <label for="departure">Departure city</label>
                                        <input type="text" id="departure" name="departure" />
                                    </div>
                                    <div class="columns medium-6">
                                        <label for="arrival">Arrival city</label>
                                        <input type="text" id="arrival" name="arrival" />
                                        <input type="hidden" value="2" name="searching_id" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="columns medium-12 text-center">
                                        <input type="submit" class="button" value="Search" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel2">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/foundation.min.js"></script>
    <script src="../js/what-input.js"></script>
    <script>
        jQuery(document).foundation();
    </script>
</body>
</html>