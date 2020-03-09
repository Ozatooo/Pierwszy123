<?php
include "polacz.php";
$pesel = wczytaj("pesel"); //wczytanie z tablicy _GET ze sprawdzeniem czy niepusty
if ($sql = $baza->prepare( "DELETE FROM uczen WHERE pesel = ?;" ))
{
 $sql->bind_param( "i", $pesel);
 $sql->execute();
 $sql->close();
}
$baza->close();
header("Location: https://localhost/2pi/")

?>