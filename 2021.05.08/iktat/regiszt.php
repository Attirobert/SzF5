<?php
session_start();
require "classes/db.php";

// Megnézem, hogy az index.php-n bejelentkezett-e?
// Ha nem, akkor visszaküldöm
if (isset($_SESSION["user"])) {
    $user = ucfirst($_SESSION["user"]);
} else {
    header("location: index.php");
}

$hiba = "";

if (isset($_POST["reg"])) {

    /* A form által küldött adatok lementése */
    $nev = $_POST["nev"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwd2"];

    /* Mivel a form a bejelöletlen checkbox-ról nem küld információt, ezért így kell lekérdezni */
    $adm = isset($_POST["adm"]) ? 1 : 0;

    /* Adatbázis megnyitása */
    $db = new Dbconnect();
    $db->Connection("iktato");

    /* Ha már regisztrálva van a felhasználó, akkor nem regisztráljuk */
    if ($db->nameValid($nev)) {
        $hiba = "Már regisztrálva van!";
    }

    /* A jelszavak azonosak-e? */
    if ($pwd != $pwd2) {
        $hiba .= "<br>A jelszavak nem egyeznek!";
    }

    /* A jelszavak hossza nem megfelelő */
    if (!$db->pwdLength($pwd, 6)) {
        $hiba .= "<br>A jelszó rövid!";
    }

    /* Regisztrálás */
    if (!$hiba) {
        if ($db->Reg($nev, $pwd, $adm)) {
            $hiba = "Eredményes regisztráció";
        }
    } else {
        $hiba .= "<br>Eredménytelen regisztráció";
    }
    // Adatbázis lezárása
    $db->__destruct();
}
?>


<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Iktató</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="css/iktat.css">
    <script src="js/iktat.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Iktató rendszer</h1>
            <p>Regisztrálás</p>
        </div>

        <!-- Menü -->
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link disabled" href="regiszt.php">Regisztrálás</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="iktat.php">Iktatás</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="lista.php">Kimutatások</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Kilépés</a>
            </li>
        </ul>
        <!-- EOF Menü -->

        <!-- Form -->
        <form action="" method="POST">
            <div class="form-group">
                <label for="nev">Név: </label>
                <input type="text" class="form-control" placeholder="Név" id="nev" name="nev" required minlength="3">
            </div>
            <div class="form-group">
                <label for="pwd">Jelszó: </label>
                <input type="password" class="form-control" placeholder="Jelszó" id="pwd" name="pwd" minlength="6" required>
            </div>
            <div class="form-group">
                <label for="pwd2">Jelszó ismét: </label>
                <input type="password" class="form-control" placeholder="Jelszó ismét" name="pwd2" id="pwd2" minlength="6" required>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="adm" id="adm">Adminisztrátor
                </label>
            </div>
            <button type="submit" id="reg" name="reg" class="btn btn-primary">Submit</button>
            <!-- Üzenetek kiíratása -->
            <div>
                <h3>
                    <?php
                    if (!!$hiba) {
                        echo $hiba;
                    }
                    ?>
                </h3>
            </div>
        </form>
        <!-- EOF Form -->
    </div>
</body>

</html>