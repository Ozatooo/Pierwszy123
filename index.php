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
.tabelka1 {
	margin: 0;
	width: 100%;
	height: 100%;
	font-family: "Exo", sans-serif;
	color: #fff;
	background: linear-gradient(-45deg, #00FF00, #FF00FF, #FFFF00, #000080 );
	background-size: 400% 400%;
	-webkit-animation: gradient 2s ease infinite;
	        animation: gradient 2s ease infinite;
}
.tabelka2 {
	margin: 0;
	width: 100%;
	height: 100%;
	font-family: "Exo", sans-serif;
	color: #fff;
	background: linear-gradient(-45deg, #800000, #0000FF, #008000, #FF0000 );
	background-size: 400% 400%;
	-webkit-animation: gradient 2s ease infinite;
	        animation: gradient 2s ease infinite;
}

</style>
 <head>
  <meta charset="utf-8">
  <title>Panel admina</title>
 </head>
 <body class="tabelka1">
 <h1>Panel Administratora
  <table border="1">
   <tr class='tabelka2' >
     <th>pesel</th><th>imie</th><th>nazwisko</th><th>adress</th><th>klasy</th>
     <th>Edycja</th><th>Usuwanie</th>
   </tr></h1>
<?php
include "polacz.php";
if ($sql =  $baza->prepare("SELECT * FROM uczen ORDER BY nazwisko, imie"))
{
        $sql->execute();
        $sql->bind_result($pesel, $imie, $nazwisko, $adress, $klasy);
        while ($sql->fetch())
        {
                echo "<tr class='tabelka'>
                        <td>$pesel</td>
                        <td>$imie</td>
                        <td>$nazwisko</td>
                        <td>$adress</td>
                        <td>$klasy</td>
                        <td><a href=\"edycja.php?pesel=$pesel\">Edytuj</a></td>
                        <td><a href=\"usun.php?pesel=$pesel\" onclick=\"javascript:return confirm('Czy na pewno usunąć?'); \">Usuń</a></td>
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