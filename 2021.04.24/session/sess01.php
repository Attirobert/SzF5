<?php
session_start();
$_SESSION["allat"] = "macska";
$_SESSION["szin"] = "lila";

?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Session 01</title>
    <meta name="Author" content="Kovács Attila">
</head>

<body>
    <h3>Session változók beállítása</h3>
    <ul>
        <li>Állat = macska</li>
        <li>Szín = lila</li>
    </ul>
</body>

</html>