<?php
require "classes/db.php";   // Osztály importálása

// Üzenet változója
$uzen = "";

// Törlöm az esetleg beragadt session-t 
if (isset($_SESSION["user"])) {
    session_destroy();
}

// Ellenőrzöm, hogy az oldal a login gombbal lett-e elküldve.  Csak ekkor dolgozom fel. 
if (isset($_POST["login"])) {
    // A küldött adatok kimentése 
    $user = $_POST["nev"];
    $pwd = $_POST["pwd"];

    // Kapcsolódás az adatbázishoz 
    $db = new Dbconnect();
    $db->Connection("iktato");

    // Ellenőrizzük, hogy a felhasználó jogosult-e a kapcsolódásra 
    if ($tomb = $db->LoginCheck($user, $pwd)) {
        session_start();    // Elindítjuk a session-t
        $_SESSION["user"] = $user;
        $_SESSION["admin"] = $tomb[0]["Admin"];

        header("location: iktat.php");
    } else {
        // Ha az adatok nem szerepelnek a userek között, akkor a kapcsolatot bezárom 
        $db = null;
        $uzen = "Hibás bejelentkező adatok!";
    }
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
            <h1>Iktató rendszer</h1>
            <p>A belépéshez adja meg a nevét és jelszavát</p>
        </div>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nev">Név</label>
                <input type="text" class="form-control" id="nev" name="nev" placeholder="Adja meg a nevét" minlength="3" required>
            </div>
            <div class="form-group">
                <label for="pwd">Jelszó</label>
                <input type="password" class="form-control" id="pwd" name="pwd" minlength="6" required>
            </div>
            <button type="submit" class="btn btn-primary" name="login">OK</button>
            <div>
                <h3><?php echo $uzen; ?></h3>
            </div>
        </form>
    </div>
</body>

</html>