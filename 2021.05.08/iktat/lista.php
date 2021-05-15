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

$db = new Dbconnect();
$db->Connection("iktato");

$hiba = "";
$listara = false;
$userName = "Nincs adat";
$nevLista = $db->selectUpload();

if (isset($_POST["lista"])) {
    $uid = $_POST["cimzett"];
    $dat1 = $_POST["datumtol"];
    $dat2 = $_POST["datumig"];
    $levLista = $db->showData($uid, $dat1, $dat2);
    $listara = true;
    $userName = $db->getName($uid);
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
</head>

<body>
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Iktató rendszer</h1>
            <p>Iktatott levelek lekérdezése</p>
        </div>

        <!-- Menü -->
        <ul class="nav  justify-content-center">
            <?php
            /* A menüpontot csak akkor jelenítjük meg, ha a bejelentkezettnek admin jogosultsága van */
            if (!!$_SESSION["adm"]) {
                echo "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"regiszt.php\">Regisztrálás</a>
                </li>";
            }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="iktat.php">Iktatás</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="lista.php">Kimutatások</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Kilépés</a>
            </li>
        </ul>
        <!-- EOF Menü -->

        <form action="" method="POST">
            <div class="form-group">
                <label for="cimzett">Címzett: </label>
                <select class="form-control" name="cimzett" id="cimzett">
                    <!-- Lista feltöltés php-val -->
                    <?php
                    foreach ($nevLista as $key) {
                        echo "<option value=$key[ID_user]>$key[Nev]</option>";
                    }
                    ?>

                </select>
            </div>
            <div class="form-group">
                <label for="datumtol">Dátumtól: </label>
                <input type="date" class="form-control" name="datumtol" id="datumtol" required>
            </div>
            <div class="form-group">
                <label for="datumig">Dátumig: </label>
                <input type="date" class="form-control" name="datumig" id="datumig" required>
            </div>
            <button type="submit" name="lista" class="btn btn-primary">Submit</button>

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

        <!-- Eredmény kiiratás -->
        <div class="col-12 bg-secondary">
            <?php
            if ($listara) {
                echo $userName . " levelei: "; // Felhasználó nevének kiíratása
            ?>
                <table class="text-left">
                    <tr>
                        <th>Dátum</th>
                        <th>Tárgy</th>
                        <th>Leírás</th>
                    </tr>
                    <?php
                    foreach ($levLista as $key) {
                        echo "<tr><td>" . $key['erkezett'] . "</td><td>" . $key['targy'] . "</td><td>" . $key['leiras'] . "</td></tr>";
                    }
                    ?>
                </table>
            <?php
            }
            ?>
        </div>
        <!-- EOF Eredmény kiiratás -->
    </div>
</body>

</html>