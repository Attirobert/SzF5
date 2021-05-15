<?php
$br = "<br>";
$sor = $br . "========================" . $br;

$a = 3;
$b = 2.3;
$c = "10";
$d = true;

echo 'A $a: ' . "$a típusa: " . gettype($a) . $br;
echo 'A $b: ' . "$b típusa: " . gettype($b) . $br;
echo 'A $c: ' . "$c típusa: " . gettype($c) . $br;
echo 'A $d: ' . "$d típusa: " . gettype($d) . $br;
echo $sor;

$c1 = (int)$c;
echo 'A $c1: ' . "$c típusa: " . gettype($c1) . $br;

$c2 = $c;
echo 'A $c2: ' . "$c típusa: " . gettype($c2) . $br;
settype($c2, "integer");
echo 'A $c2: ' . "$c típusa: " . gettype($c2) . $br;

if (0) {
    echo "Igaz ág";
} else {
    echo "Hamis ág";
}
