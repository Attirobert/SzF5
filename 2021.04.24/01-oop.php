<?php
/* Az OOP alapelemei
1. Absztrakció
    Osztály (Class) => példányosítás => objektum (object)
    Pl. Kutya => Bodri kutya
    Az osztály elemei (tagok):
        - Tulajdonságok (property): változók
        - Metódusok 
2. Származtatás (Inheritance)
    Pl. Házi állatok (mint osztály)
            - Kutyák (mint osztály)
            - Macskák (mint osztály)
            - Tyúkok (mint osztály)

3. Egységbezárás (encapsulation)
    Láthatósági szintek:
    - private: csak az osztály metódusai férnek hozzá, a leszármazott osztály sem!
    - protected: mint a private, de a leszármazottak hozzá férnek.
    - public: kivülről (másik osztályból) is elérhető.

4. Többalakúság (polimorfizmus, polymorphism)
*/

/* Osztály létrehozása */
define("br", "<br>");
define("ujsor", "<br><br>======================================<br><br>");


class alkalmazott
{
    private $nev;
    private $lakcim;
    private $szulDatum;

    public function alkalmazott($nev = "Név nélkül")
    {
        if ($this->nev != $nev) $this->nev = $nev;
    }

    public function getNev()
    {
        return $this->nev;
    }

    public function setNev($nev)
    {
        $this->nev = $nev;
    }

    public function getLakcim()
    {
        return $this->lakcim;
    }

    public function setLakcim($lakcim)
    {
        $this->lakcim = $lakcim;
    }

    public function getSzulDatum()
    {
        return $this->szulDatum;
    }

    public function setSzulDatum($szulDatum)
    {
        $this->szulDatum = $szulDatum;
    }
}

/* Példányosítom */
$fiu = new alkalmazott();
print $fiu->getNev();
$fiu->setLakcim("Debrecen");
$fiu->setSzulDatum("1999.01.12");

print br . $fiu->getSzulDatum();
print br . $fiu->getLakcim();

$sari = new alkalmazott();
print br . $sari->getNev();
$sari->setNev("Sári");
print br . $sari->getNev();

// Példányosítás névvel
$pista = new alkalmazott("Pista");
echo br . $pista->getNev();

echo ujsor;

/* Származtatás */
class dolgozo
{
    private $nev;
    private $varos;
    private $szulDatum;

    public function dolgozo($nev, $varos, $szulDatum)
    {
        $this->nev = $nev;
        $this->varos = $varos;
        $this->szulDatum = $szulDatum;
    }

    public function koszon()
    {
        echo br . "Üdv! A nevem " . $this->nev . ", szülővárosom " . $this->varos . " születési dátumom: " . $this->szulDatum;
    }
}

$jancsi = new dolgozo("Jancsi", "Debrecen", "2002-01-23");
echo $jancsi->koszon();

$vera = new dolgozo("Vera", "Budapest", "1985-01-23");
echo $vera->koszon();

$julcsi = new dolgozo("Julcsi", "Győr", "1995-01-23");
echo $julcsi->koszon();

class mernok extends dolgozo
{
    private $kepzettseg;

    public function __construct($nev, $varos, $szulDatum, $kepzettseg)
    {
        dolgozo::dolgozo($nev, $varos, $szulDatum);
        $this->kepzettseg = $kepzettseg;
    }

    public function koszon()
    {
        dolgozo::koszon();
        echo " a képzettségem: " . $this->kepzettseg;
    }

    public function __destruct()
    {
        echo br . "A destructor lefut";
    }
}

$tibor = new mernok("Tibor", "Kaba", "1982-05-21", "Villamos mérnök");
echo $tibor->koszon();
$tibor = null;
