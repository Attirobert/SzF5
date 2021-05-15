<?php
$br = "<br>";
$szak = $br . "===================================" . $br;

$a = 'Ez a $a változó';
$b = 'Ez a $b változó';

echo $szak;
echo "Érték szerinti paraméter átadás" . $br;
echo "Változók értékei fv hívás előtt" . $br;
echo $a . $br;
echo $b . $br;

function fv($p1, $p2)
{
    $p1 = 'Új érték az $a változóban';
    $p2 = 'Új érték az $b változóban';
}

fv($a, $b);

echo "Változók értékei fv hívás után" . $br;
echo $a . $br;
echo $b . $br;

echo $szak;
echo "Cím szerint paraméter átadás kikényszerítése" . $br;
echo "Változók értékei fv hívás előtt" . $br;
echo $a . $br;
echo $b . $br;

function fv2(&$p1, &$p2)
{
    $p1 = 'Új érték az $a változóban';
    $p2 = 'Új érték az $b változóban';
}

fv2($a, $b);

echo "Változók értékei fv hívás után" . $br;
echo $a . $br;
echo $b . $br;

echo $szak;
echo "kezdeti értékadás" . $br;
function fv3($p1, $p2 = 2, $p3 = 3)
{
    echo $p1 * $p2 * $p3;
}

fv3(10, 100);
