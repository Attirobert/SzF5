<?php

$br = "<br>";
$szak = $br . "=================================" . $br;

$tanulok = array("Ádám", "Berci", "Marci", "Dani", "Morgó");

$lanyok[] = "Éva";
$lanyok[] = "Zsuzsa";
$lanyok[] = "Ildi";
$lanyok[] = "Mari";
$lanyok[] = "Kati";
$lanyok[] = "Sári";

$fiuk = array(0 => "Attila", 1 => "Zoli", 5 => "Hapci", 10 => "Feri");
echo "tanulok tomb mérete = " . count($tanulok) . $br;
var_dump($tanulok);
echo $br;
echo "lanyok tomb mérete = " . count($lanyok) . $br;
var_dump($lanyok);
echo $br;
echo "fiuk tomb mérete = " . count($fiuk) . $br;
var_dump($fiuk);

echo $szak . "fiuk tömb kiíratása for ciklussal" . $br;
for ($i = 0; $i < count($fiuk); $i++) {
    if (isset($fiuk[$i]))
        echo $fiuk[$i] . $br;
}

echo "fiuk tömb kiíratása foreach ciklussal" . $br;
foreach ($fiuk as $index => $ertek) {
    echo $index . ": " . $ertek . $br;
}
function kiir($tomb, $a)
{
    foreach ($tomb as $index => $ertek) {
        echo $index . ": " . $ertek . $a;
    }
}
echo $szak . "Asszociatív tömb" . $br;
$apak = array("T" => "Attila", "L" => "Bálint", "Z" => "Zoltán", "K" => "Miklós", 10 => "Péter");
var_dump($apak);
echo $br . $br;
foreach ($apak as $index => $ertek) {
    echo $index . ": " . $ertek . $br;
}

echo "Rendezés érték szerint asort metódussal" . $br;
asort($apak);
kiir($apak, $br);

echo "Rendezés érték szerint arsort metódussal" . $br;
arsort($apak);
kiir($apak, $br);

echo "Rendezés érték szerint ksort metódussal" . $br;
ksort($apak);
kiir($apak, $br);

echo "Rendezés érték szerint krsort metódussal" . $br;
krsort($apak);
kiir($apak, $br);
