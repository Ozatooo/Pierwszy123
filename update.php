<?php
include "polacz.php";
 $pesel = wczytaj("pesel");
 $imie = wczytaj("imie");
 $nazwisko = wczytaj("nazwisko");
 $adress = wczytaj("adress");
 $klasy = wczytaj("klasy");


$sql = $baza->prepare("UPDATE uczen SET pesel=?, imie=?, nazwisko=?, adress=?, klasy=? LIMIT 1");
if ($sql)
{
        $sql->bind_param("sssss", $pesel, $nazwisko, $imie, $klasy, $adress);
        $sql->execute();
        $sql->close();
}
else
    die( 'Błąd: '. $baza->error);
$baza->close();
header("Location: https://localhost/2pi/")

?>