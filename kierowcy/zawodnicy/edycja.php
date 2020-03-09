<?php
include "polacz.php";
$id = wczytaj("id");
$title = wczytaj("title");
$subtitle = wczytaj("subtitle");
$miejsce = wczytaj("miejsce");
if ( $sql = $baza->prepare( "SELECT * FROM user WHERE id = ?;"))
{
  $sql->bind_param("ssss" ,$id, $title, $subtitle, $miejsce);
  $sql->execute();
  $sql->bind_result($id, $title, $subtitle, $miejsce);
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
      <tr><td>nazwisko</td><td><input name="nazwisko" value="'.$title.'" maxlen="20" size="20"></td></tr>
      <tr><td>imie</td><td><input name="imie" value="'.$subtitle.'" maxlen="20" size="20"></td></tr>
      <tr><td>auto</td><td><input type="number" name="auta" value="'.$miejsce.'"></td></tr>
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