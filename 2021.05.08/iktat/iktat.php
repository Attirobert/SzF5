<?php
/* Session indítása */
session_start();

require "classes/db.php"; // Osztály importálása

// Üzenet változója
$uzen = "";

/* Megnézem, hogy az index.php-ban bejelentkezett-e */
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
} else {
    header("location: index.php");
}

/* Kapcsolódás az adatbázishoz */
$db = new Dbconnect();
$db->Connection("iktato");

/* Beolvassuk a usereket a dropdown komponenshez*/
$nevLista = $db->selectUpload();

// Ha iktat gombbal lett elküldve
if (isset($_POST["iktat"])) {
    // Kimentjük az adatokat
    $datum = $_POST["datum"];
    $uid = $_POST["cimzett"];
    $targy = $_POST["targy"];
    $leiras = $_POST["leiras"];

    // Adatok beszúrása az adatbázisba
    $db->iktat($datum, $uid, $targy, $leiras);

    $uzen = "Az iktatás sikeres";
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Iktató rendszer</title>
    <meta name="Author" content="Kovács Attila">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
</head>

<body>
    <div class="container-fluid text-center">
        <div class="jumbotron">
            <h1>Iktatás</h1>
        </div>
        <!-- Menü -->
        <ul class="nav justify-content-center">
            <?php
            /* A menüpontot csak akkor jelenítjük meg, ha a bejelentkezettnek admin jogosultsága van */
            if (!!$_SESSION["adm"]) {
                echo "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"regiszt.php\">Regisztrálás</a>
                </li>";
            }
            ?>
            <li class="nav-item">
                <a class="nav-link disabled" href="iktat.php">Iktatás</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="lista.php">Kimutatások</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Kilépés</a>
            </li>
        </ul>
        <!-- EOF Menü -->

        <form method="POST">
            <div class="form-group">
                <label for="datum">Dátum</label>
                <input type="date" class="form-control" id="datum" name="datum" required>
            </div>
            <div class="form-group">
                <label for="cimzett">Címzett</label>
                <!-- Feltöltés a user táblából -->
                <select class="form-control" name="cimzett" id="cimzett">
                    <?php
                    foreach ($nevLista as $key) {
                        echo "<option value = $key[ID_user]>$key[Nev]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="targy">Tárgy</label>
                <input type="text" class="form-control" id="targy" name="targy" required>
            </div>
            <div class="form-group">
                <label for="leiras">Leírás</label>
                <input type="text" class="form-control" id="leiras" name="leiras" required>
            </div>
            <button type="submit" class="btn btn-primary" name="iktat">OK</button>
        </form>
        <div>
            <h3><?php echo $uzen; ?></h3>
        </div>
    </div>

</body>

</html>