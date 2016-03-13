<link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php

include('connect.php');
include('config.php');
session_start();

$id=$_SESSION['iduser'];

$query="SELECT name,date_conf,payment,estimated_ppl,estimated_spekers,id_conference FROM ".$prefix."_Conference WHERE id_user='$id' AND completed='No' ";
$result = mysql_query($query) or die(mysql_error());
$count=mysql_num_rows($result);
  echo "<table border=\"1\" align=\"center\">";
echo "\t<tr>\n";
echo "\t\t<td>Nazwa</td>\n";
echo "\t\t<td>Kiedy</td>\n";
echo "\t\t<td>Zapłata</td>\n";
echo "\t\t<td>Goście</td>\n";
echo "\t\t<td>Prelegenci</td>\n";
echo "\t\t<td></td>\n";
echo "\t\t<td></td>\n";

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        //print_r($row);
		

	echo "\t<tr>\n";
	foreach($row as $col_value){
	echo "\t\t<td>$col_value</td>\n";
	}

?>
	<td>
<a href="editconf.php?id=<?php echo $row['id_conference']; ?>">Edytuj</a>
	</td>

	<td>
<a href="listaOsobConf.php?id=<?php echo $row['id_conference']; ?>">Lista osób</a>
	</td>

	<td>
<a href="endConf.php?id=<?php echo $row['id_conference']; ?>">Zakończ</a>
	</td>
<?php	

}

?>
<a class="pwt" href="index.php">Powrót</a>