<html>
 <head>
  <meta charset="utf-8">
  <title>Dodaj nowy obiekt</title>
 </head>
 <body>
  <h1>Dodawanie do bazy</h1>
  <form method="get" action="insert.php">
   <table border="0">
      <tr><td>pesel</td><td><input type="number" name="pesel" maxlen="11" size="20"></td></tr>
      <tr><td>imie</td><td><input name="imie"></td></tr>
      <tr><td>nazwisko</td><td><input name="nazwisko"></td></tr>
      <tr><td>adress</td><td><input  name="adress"></td></tr>
      <tr><td>klasy</td><td><input name="klasy"></td></tr>
      <tr><td colspan="2"><input type="submit" value="wstaw"></td></tr>
   </table>
  </form>
 </body>
</html>