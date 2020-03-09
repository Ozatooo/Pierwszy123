<?php
include "polacz.php";
 $pesel = wczytaj("pesel");
 $imie = wczytaj("imie");
 $nazwisko = wczytaj("nazwisko");
 $adress = wczytaj("adress");
 $klasy = wczytaj("klasy");


$sql = $baza->prepare("INSERT INTO uczen VALUES (?, ?, ?, ?, ?);");
if ($sql)
{
        $sql->bind_param("sssss", $pesel, $nazwisko, $imie, $klasy, $adress);
        $sql->execute();
        echo $baza->error;
        $sql->close();
}
else
    die( 'Błąd: '. $baza->error);
$baza->close();
?>