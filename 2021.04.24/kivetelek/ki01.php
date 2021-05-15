<?php
// létrehozunk egy kivételt
function checkNum($szam)
{
    if ($szam > 10 || $szam < 0)
        throw new Exception("A szám csak 0 és 10 közé eső lehet!");
    return true;
}

// Ellenörző blokk
try {
    checkNum(9);
    echo "A szám megfelelő";
} catch (Exception $e) {
    echo "Hibaüzenet: " . $e->getMessage();
}
