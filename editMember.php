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
    <title>Uprav uzivatela</title>


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
        <h1>
            <?php
            echo $member->getName()." ".$member->getSurname();
            ?>
        </h1>
    </div>

</header>
<section>
    <article>
        <div id="member-edit">
            <div id="formular">
                <form action="editorMember.php?id=<?php echo $id?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Meno</label>
                            <input type="text" class="form-control" id="name" name="name" required pattern='^(?!\s*$).+' value=<?php echo $member->getName();?>>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="surname">Priezvisko</label>
                            <input type="text" class="form-control" id="surname" name="surname" required pattern='^(?!\s*$).+' value=<?php echo $member->getSurname();?>>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="birthDay">Dátum narodenia</label>
                            <input type="date" class="form-control" id="birthDay" name="birthDay" required value=<?php echo $member->getBirthDayForInput();?>>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="birthPlace">Miesto narodenia</label>
                            <input type="text" class="form-control" id="birthPlace" name="birthPlace" required value=<?php echo $member->getBirthPlace();?>>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="birthCountry">Krajina narodenia</label>
                            <input type="text" class="form-control" id="birthCountry" name="birthCountry" required value=<?php echo $member->getBirthCountry();?>>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="deathDay">Dátum úmrtia</label>
                            <input type="date" class="form-control" id="deathDay" name="deathDay" value=<?php echo $member->getDeathDayForInput();?> >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="deathPlace">Miesto úmrtia</label>
                            <input type="text" class="form-control" id="deathPlace" name="deathPlace" value=<?php echo $member->getDeathPlace();?>>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="deathCountry">Krajina úmrtia</label>
                            <input type="text" class="form-control" id="deathCountry" name="deathCountry" value=<?php echo $member->getDeathCountry();?>>
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