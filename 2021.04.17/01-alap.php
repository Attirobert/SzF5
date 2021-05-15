<?php
// Egysoros komment
/* 
Többsoros komment
xxxxxxxxxxxxxxxx
 */
echo "Üdvözöllek a PHP-ban!";
$cim = "PHP példák";
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title><?php echo $cim; ?></title>
    <meta name="Author" content="Kovács Attila">
</head>

<body>
    <h2>Ezt a html kódból írtam ki</h2>
    <?php
    echo "<h1>Ezt <b>php</b> kódból írtam ki</h1>";
    echo "<p>Ezt is <b>php</b> kódból írtam ki</p>";
    ?>

</body>

</html>