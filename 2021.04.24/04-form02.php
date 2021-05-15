<?php
if (isset($_GET["nev"])) {
    $nev = $_GET["nev"];
    echo "Üdvözöllek " . $nev;
}

?>


<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Php - Form példa</title>
    <meta name="Author" content="Kovács Attila">
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        <input type="text" name="nev">
        <input type="submit" value="Mehet">
</body>

</html>