<?php
include "polacz.php";
$pesel = wczytaj("pesel");
if ( $sql = $baza->prepare( "SELECT * FROM uczen WHERE pesel = ?;"))
{
  $sql->bind_param("i" ,$pesel);
  $sql->execute();
  $sql->bind_result($pesel, $imie, $nazwisko, $adress, $klasy);
  if (!$sql->fetch())  die("Blad!!! Brak rekordu do edycji w bazie!!! Liczba rekodow:".$sql->num_rows);


 /////////////////////// HTML w PHP
 echo '
 <html>
  <head>
   <meta charset="utf-8">
   <title>Edycja obiektu</title>
  </head>
  <body>
   <h1>Edycja rekordu z bazy</h1>
   <form method="get" action="update.php">
    <table border="0">
      <tr><td>pesel</td><td><input name="pesel" value="'.$pesel.'" disabled>
              <input type="hidden" name="pesel" value="'.$pesel.'">  </td></tr>
      <tr><td>nazwisko</td><td><input name="nazwisko" value="'.$nazwisko.'" maxlen="20" size="20"></td></tr>
      <tr><td>imie</td><td><input name="imie" value="'.$imie.'" maxlen="20" size="20"></td></tr>
      <tr><td>adress</td><td><input type="number" name="adress" value="'.$adress.'"></td></tr>
      <tr><td>klasy</td><td><input   min="1" max="1000000" name="klasy" value="'.$klasy.'"></td></tr>
      <tr><td colspan="2"><input type="submit" value="zapisz zmiany"></td></tr>
    </table>
   </form>
  </body>
 </html>
 ';
 $sql->close();
 }
$baza->close();
?>