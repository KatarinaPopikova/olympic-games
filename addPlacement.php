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
    <title>Pridaj umiestnenie</title>


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
        <h1>Pridať umiestnenie</h1>
    </div>
</header>
<section>
    <article>

        <div id="placement-add">
            <div id="formular">
                <form action="additionPlacement.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="member">Meno</label>
                            <select id="member" class="form-control" name="member">
                                <?php
                                $members = $controller->getAllMembers();
                                foreach ($members as $member)
                                    echo $member->nameForOption();
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="discipline">Disciplína</label>
                            <input type="text" class="form-control" id="discipline" name="discipline" required pattern='^(?!\s*$).+'>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="oh">Olympiáda</label>
                            <select id="oh" class="form-control" name="oh">
                                <?php
                                $oh = $controller->getAllOH();
                                foreach ($oh as $game)
                                    echo $game->ohForOption();
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="placement">Umiestnenie</label>
                            <input type="number" min="1" max="9999" class="form-control" id="placement" name="placement" required pattern='^(?!\s*$).+'>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-outline-secondary changeHTML" >Uložiť</button>
                </form>
            </div>
        </div>

    </article>

</section>

<footer>
    <span>Design by Katarína Stasová</span>
</footer>
</body>

</html>