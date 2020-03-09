<?php
        include "polacz.php"; //wzór pliku we wpisie "Pełny panel administracyjny MySQLi"
        if ($sql = $baza->prepare( "SELECT DISTINCT * FROM auta ORDER BY id "))
        {
                $sql->execute(); //wykonaj SQL
                $sql->bind_result($id,$model,$kolor,$rocznik);
                while ($sql->fetch())
                  $auto[] = array(
                     "id" => $id,
                     "model" => $model,
                     "kolor" => $kolor,
                     "rocznik" => $rocznik,
                   ); //dla każdego nazwiska tworzy 2 pary, nazwiska przekonwertowane do UTF
                $sql->close();
        }
        $baza->close();
        echo json_encode($auto, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>