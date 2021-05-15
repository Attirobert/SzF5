<?php
session_start();
echo "Az állat: " . $_SESSION["allat"] . "<br>";
echo "A színe: " . $_SESSION["szin"] . "<br>";
echo "<h3>Az adatokat megváltoztatom</h3>";
$_SESSION["allat"] = "kutya";
$_SESSION["szin"] = "piros";
