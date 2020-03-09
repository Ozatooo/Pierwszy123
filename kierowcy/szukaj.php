<form method="get" action="<?=$_SERVER['PHP_SELF']?>">
<input type="text" name="word" />
<input type="submit" name="submit" value="Szukaj" />
</form>
<?php
if (isset($_GET['submit'])){
	$conn=new  mysqli("localhost", "root", "", "user");
	mysqli_select_db($conn,'user') or die(mysqli_error());
	$keyword = "";
	if(isset($_GET['word'])) {
	   $keyword = $_GET['word'];
	}
	print "Wyniki wyszukiwania";
	$sql = "SELECT * FROM kierowcy WHERE imie LIKE '%$keyword%' OR nazwisko LIKE '%$keyword%'";
	$result = mysqli_query($conn,$sql);
	while ($row = mysqli_fetch_assoc($result)){
		print '<br /><a href="szukaj.php?id=' 
		. $row['id'] . '">'
		. $row['imie'] . ' '
		. $row['nazwisko'] . '</a>';
	}
	
	
	if(mysqli_num_rows($result)==0){
	print "Brak wynikow!";
	}
}
if(mysqli_num_rows($result)==1){
	include "polacz.php"; //wzór pliku we wpisie "Pełny panel administracyjny MySQLi"
        if ($sql = $baza->prepare( "SELECT DISTINCT * FROM kierowcy WHERE imie LIKE '%$keyword%' OR nazwisko LIKE '%$keyword%'"))
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
}

?>