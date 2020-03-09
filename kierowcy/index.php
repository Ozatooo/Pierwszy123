<html>
<style>
.tabelka {
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
  
	animation: gradient 1s ease infinite;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
</style>
 <head>
  <meta charset="utf-8">
  <title>Panel admina</title>
 </head>
 <body>
 <h1>Panel Administratora</h1>
  <table border="1">
   <tr>
     <th>id</th><th>imie</th><th>nazwisko</th><th>auto</th>
     <th>Edycja</th><th>Usuwanie</th>
   </tr>
<?php
include "polacz.php";
if ($sql =  $baza->prepare("SELECT * FROM kierowcy ORDER BY nazwisko, imie"))
{
        $sql->execute();
        $sql->bind_result($id, $imie, $nazwisko, $auta);
        while ($sql->fetch())
        {
                echo "<tr class='tabelka'>
                        <td>$id</td>
                        <td>$imie</td>
                        <td>$nazwisko</td>
                        <td>$auta</td>
                        <td><a href=\"edycja.php?id=$id\">Edytuj</a></td>
                        <td><a href=\"usun.php?id=$id\" onclick=\"javascript:return confirm('Czy na pewno usunąć?'); \">Usuń</a></td>
                   </tr>";
        }
        $sql->close();
 }
//else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin." );

 $baza->close();
?>
  </table>
  <a href="dodaj.php">Dodawanie nowego</a>
 </body>
</html>