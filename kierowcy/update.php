<?php
include "polacz.php";
 $id = wczytaj("id");
 $imie = wczytaj("imie");
 $nazwisko = wczytaj("nazwisko");
 $auta = wczytaj("auta");



$sql = $baza->prepare("UPDATE kierowcy SET id=?, imie=?, nazwisko=?, auta=?");
if ($sql)
{
        $sql->bind_param("ssss", $id, $nazwisko, $imie, $auta);
        $sql->execute();
        $sql->close();
}
else
    die( 'Błąd: '. $baza->error);
$baza->close();
header("Location: https://localhost/2pi/kierowcy/")

?>