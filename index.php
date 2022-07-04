<?php
require_once "controllers/Controller.php";
$controller = new Controller();
?>
<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zlate medajle</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</head>
<body>
<header>

</header>
<header>
    <h1>Získané zlaté medaile </h1>
</header>
<section>
    <article id="table-article">
        <div id="button">
            <button type="button" class="btn btn-outline-secondary changeHTML" onclick="window.location = 'index.php'">Získané zlaté medaile</button>
            <button type="button" class="btn btn-outline-secondary changeHTML" onclick="window.location = 'top10.php'">Najlepších 10</button>
        </div>
        <div class="table-responsive" id="table-div">
            <table class="table table-striped table-hover" id="sortableTable">
                <thead>
                <tr>
                    <th>Meno</th>
                    <th class="cursor" onclick="sortTable(1)">Priezvisko</th>
                    <th class="cursor"  onclick="sortTable(2)">Rok</th>
                    <th class="cursor" onclick="sortTable(3)">Typ</th>
                    <th>Miesto</th>
                    <th>Disciplína</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $allGoldWinners = $controller->getAllGoldWinners();
                foreach ($allGoldWinners as $goldWinner)
                    echo $goldWinner->printHtmlTableRow();
                ?>
                </tbody>
            </table>
        </div>
    </article>

</section>
<footer>
    <span>Design by Katarína Stasová</span>
</footer>
</body>

</html>
