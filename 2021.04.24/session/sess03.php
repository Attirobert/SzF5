<?php
session_start();
echo "Az állat: " . $_SESSION["allat"] . "<br>";
echo "A színe: " . $_SESSION["szin"] . "<br>";
