<?php
include "polacz.php";
$id = wczytaj("id");
if ( $sql = $baza->prepare( "SELECT * FROM kierowcy WHERE id = ?;"))
{
  $sql->bind_param("i" ,$id);
  $sql->execute();
  $sql->bind_result($id, $imie, $nazwisko, $auta);
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
      <tr><td>pesel</td><td><input name="id" value="'.$id.'" disabled>
              <input type="hidden" name="id" value="'.$id.'">  </td></tr>
      <tr><td>nazwisko</td><td><input name="nazwisko" value="'.$nazwisko.'" maxlen="20" size="20"></td></tr>
      <tr><td>imie</td><td><input name="imie" value="'.$imie.'" maxlen="20" size="20"></td></tr>
      <tr><td>auto</td><td><input type="number" name="auta" value="'.$auta.'"></td></tr>
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