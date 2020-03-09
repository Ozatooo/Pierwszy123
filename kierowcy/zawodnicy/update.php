<?php
include "polacz.php";
 $id = wczytaj("id");
 $title = wczytaj("title");
 $subtitle = wczytaj("subtitle");
 $miejsce = wczytaj("miejsce");



$sql = $baza->prepare("UPDATE user SET imie=?, nazwisko=?, miejsce=? WHERE id=?");
if ($sql)
{
        $sql->bind_param("ssss", $id, $nazwisko, $imie, $auta);
        $sql->execute();
        $sql->close();
}
else
    die( 'Błąd: '. $baza->error);
$baza->close();

?>