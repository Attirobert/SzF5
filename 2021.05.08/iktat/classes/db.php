<?php
header("content-type:text/html; charset=utf-8");

class Dbconnect
{
    // Adatbázis műveletek

    /* Belső változók */
    protected $host;
    protected $user;
    protected $pwd;
    protected $con; // kapcsolati string változója

    // Konstruktor metódus, a példányosításkor fut le.
    function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->pwd = "";
    }

    /* Destruktor metódus
        Az objektum megszüntetésekor fut le.  Általában nem kell külön megírnunk. */
    function __destruct()
    {
        // echo "Ezt a destruktor írja ki";
    }

    function Connection($dbname)
    {
        try {
            $this->con = new PDO("mysql:host=$this->host; dbname=$dbname", $this->user, $this->pwd);
            $this->con->exec("set names 'utf8'");
        } catch (PDOException $e) {
            die("<h1>Adatbázis kapcsolódási hiba!</h1>");
        }
    }

    // Név-jelszó páros ellenőrzése
    function LoginCheck($user, $pwd)
    {
        $tomb = null; // Eredmény 
        $res = $this->con->prepare("SELECT Nev, Jelszo, Admin FROM users WHERE Nev = ? and Jelszo = ? ");
        $res->bindparam(1, $user);
        $res->bindparam(2, $pwd);
        $res->execute();

        // Az eredmény tömbbe bepakoljuk a select utasítás eredményét
        while ($row = $res->fetch()) {
            $tomb[] = $row;
        }
        //var_dump($tomb);
        return $tomb;
    }

    // Címzett nevek lekérése
    function selectUpload()
    {
        $tomb = null;
        $res = $this->con->prepare("SELECT Nev, ID_user FROM users");
        $res->execute();
        while ($row = $res->fetch()) {
            $tomb[] = $row;
        }

        return $tomb;
    }
    /*
    // Iktatás */
    function iktat($datum, $userid, $targy, $leiras)
    {
        $res = $this->con->prepare("INSERT INTO letters(erkezett, ID_user, targy, leiras) VALUES (:erkezett, :userid, :targy, :leiras)");
        $res->bindParam(':erkezett', $datum);
        $res->bindParam(':userid', $userid);
        $res->bindParam(':targy', $targy);
        $res->bindParam(':leiras', $leiras);
        $res->execute();
    }

    // Felhasználó ellenőrzése
    function nameValid($user)
    {
        $reserved = false;
        $res = $this->con->prepare("select Nev from users where Nev=?");
        $res->bindparam(1, $user);
        $row = $res->execute();
        $row = $res->fetch();
        if ($row > 0)
            return $reserved = true;
    }

    /* Jelszó hosszának ellenőrzése */
    function pwdLength($pwd, $hossz)
    {
        $check = true;
        if (strlen($pwd) < $hossz) {
            $check = false;
        }
        return $check;
    }

    /* Regisztráció */
    function Reg($user, $pwd, $admin)
    {
        $success = false;
        $res = $this->con->prepare("insert into users(Nev,Jelszo, Admin) values(?,?,?)");
        $res->bindparam(1, $user);
        $res->bindparam(2, $pwd);
        $res->bindparam(3, $admin);
        $row = $res->execute();
        if ($row > 0) $success = true;

        return $success;
    }
}
