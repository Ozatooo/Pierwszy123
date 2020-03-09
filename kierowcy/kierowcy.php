<?php
        include "polacz.php"; //wzór pliku we wpisie "Pełny panel administracyjny MySQLi"
        if ($sql = $baza->prepare( "SELECT DISTINCT * FROM kierowcy ORDER BY id "))
        {
                $sql->execute(); //wykonaj SQL
                $sql->bind_result($id,$imie,$nazwisko,$auta);
                while ($sql->fetch())
                  $kierowcy[] = array(
                     "id" => $id,
                     "imie" => $imie,
                     "nazwisko" => $nazwisko,
                     "auta" => $auta,
                   ); //dla każdego nazwiska tworzy 2 pary, nazwiska przekonwertowane do UTF
                $sql->close();
        }
        $baza->close();
        echo json_encode($kierowcy, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>