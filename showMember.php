<?php
$id = null;
if (isset($_GET["id"]))
    $id = $_GET["id"];

require_once "controllers/Controller.php";
$controller = new Controller();
$member = $controller->getMember($id);
?>
<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sportovec</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</head>
<body>
<header>
    <div id="head">
        <div id="back">
            <img src='pictures/back.svg' alt='edit' class='icon' width='40' height='40' onclick="window.location = 'index.php'">
        </div>
        <h1>
            <?php
            echo $member->getName()." ".$member->getSurname();
            ?>
        </h1>
    </div>

</header>
<section>



    <div id="info-member">
        <div>
            <?php
            echo $member->printInfoDetails();
            ?>
        </div>
    </div>

    <article id="table-article">
        <div id="table-div" class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>miesto</th>
                    <th>disciplína</th>
                    <th>typ</th>
                    <th>rok</th>
                    <th>mesto</th>
                    <th>krajina</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $placements = $member->getPlacements();
                foreach ($placements as $placement)
                    echo $placement->printHtmlTableRow();
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