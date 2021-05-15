<?php
session_start();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>Session unset példa</title>
    <meta name="Author" content="Kovács Attila">
</head>

<body>
    <?php
    print "A session tömb: <br>";
    print_r($_SESSION);
    /* session_unset();
    print "<br>Az új session tömb: <br>";
    print_r($_SESSION); */

    session_destroy();
    print "<br>Az új session tömb: <br>";
    print_r($_SESSION);

    ?>
</body>

</html>