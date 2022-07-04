<?php
require_once "controllers/Controller.php";
$controller = new Controller();

$addPlacement = null;

if(isset($_POST["submit"]))
{   $addMember = (int)($_POST["member"]);
    $addOh = (int)($_POST["oh"]);
    $placement =(int)($_POST["placement"]);
    $discipline = trim($_POST["discipline"]);

   $addPlacement = $controller->addPlacement($addMember, $addOh,$placement,$discipline );
}
?>


<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pridanie umiestnenia</title>

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
            <img src='pictures/back.svg' alt='edit' class='icon' width='40' height='40' onclick="window.location = 'top10.php'">
        </div>
        <div>
            <h1>Pridanie umiestnenia</h1>
        </div>
    </div>

</header>
<section id="success-section">
    <article id="success-article">
        <div id="success">
            <?php

            if ($addPlacement > 0)
                echo "<span>Toto umiestnenie bolo pridané úspešne</span>";
            else if($addPlacement == 0 || $addPlacement == null)
                echo "<span>Toto umiestnenie bolo pridané neúspešne</span>";
            else
                echo "<span>Nastala chyba pri zadávaní</span>";

            ?>

    </article>
</section>


<footer>
    <span>Design by Katarína Stasová</span>
</footer>
</body>

</html>
