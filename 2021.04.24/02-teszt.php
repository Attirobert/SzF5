<?php
define("br", "<br>");
define("ujsor", "<br><br>======================================<br><br>");

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
        echo br . "Üdv! A nevem " . $this->nev . ", szülővárosom " . $this->varos . ", születési dátumom: " . $this->szulDatum;
    }
}
$jancsi = new dolgozo("Jancsi", "Debrecen", "2002-01-23");
echo br . $jancsi->koszon();
//var_dump($jancsi);
$vera = new dolgozo("Vera", "Budapest", "1985-01-23");
echo br . $vera->koszon();
$julcsi = new dolgozo("Julcsi", "Győr", "1995-01-23");
echo br . $julcsi->koszon();
