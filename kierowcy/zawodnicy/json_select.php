<?php
        include "polacz.php"; //wzór pliku we wpisie "Pełny panel administracyjny MySQLi"
        if ($sql = $baza->prepare( "SELECT DISTINCT id,imie,nazwisko,miejsce FROM user ORDER BY id "))
        {
                $sql->execute(); //wykonaj SQL
                $sql->bind_result($id,$nazwisko,$imie,$miejsce);
                while ($sql->fetch())
                  $nazwiska[] = array(
					 "id" => $id,
                     "title" => $imie,
                     "subtitle" =>$nazwisko,
                     "miejsce" =>$miejsce,
                   ); //dla każdego nazwiska tworzy 2 pary, nazwiska przekonwertowane do UTF
                $sql->close();
        }
        $baza->close();
        echo json_encode($nazwiska, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>