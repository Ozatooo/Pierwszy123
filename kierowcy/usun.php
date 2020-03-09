<?php
include "polacz.php";
$id = wczytaj("id"); //wczytanie z tablicy _GET ze sprawdzeniem czy niepusty
if ($sql = $baza->prepare( "DELETE FROM kierowcy WHERE id = ?;" ))
{
 $sql->bind_param( "i", $id);
 $sql->execute();
 $sql->close();
}
$baza->close();
header("Location: https://localhost/2pi/kierowcy/")

?>