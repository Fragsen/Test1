<link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();

$id=$_SESSION['iduser'];
include('connect.php');
$query="SELECT completed,Name,date_conf,estimated_ppl,estimated_spekers,payment,id_conference FROM ".$prefix."_Conference";
$result = mysql_query($query) or die(mysql_error());
$count=mysql_num_rows($result);

if($count>=1) {
?>
<div id="allUsers">

<?php
echo "<table border=\"1\" align=\"center\">";
echo "\t<tr>\n";
echo "\t\t<td>Zakończona</td>\n";
echo "\t\t<td>Nazwa</td>\n";
echo "\t\t<td>Data</td>\n";
echo "\t\t<td>Liczba gość</td>\n";
echo "\t\t<td>Liczba prelegentów</td>\n";
echo "\t\t<td>Płatność</td>\n";
echo "\t\t<td>Id</td>\n";
echo "\t\t<td>Zapisy</td>\n";

    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        //print_r($row);

   echo "\t<tr>\n";
	foreach($row as $col_value){

	echo "\t\t<td>$col_value</td>\n";
	}
//echo $_SESSION['iduser'];

if($_SESSION['iduser'] !="")
{

if($row['completed']==No){

$idconf= $row['id_conference'];
$iduser=$_SESSION['iduser'];

$query1="SELECT * FROM ".$prefix."_Participant WHERE id_conference='$idconf' AND id_user='$iduser' ";
$result1 = mysql_query($query1) or die(mysql_error());
$count1=mysql_num_rows($result1);

$query2="SELECT * FROM ".$prefix."_Speaker WHERE id_conference='$idconf' AND id_user='$iduser' ";
$result2 = mysql_query($query2) or die(mysql_error());
$count2=mysql_num_rows($result2);


if($count1>0 ||$count2>0 ){ ?>
<td> <a href="wypisz.php?idconf=<?php echo $row['id_conference']; ?>">Wypisz!</a></td>
<?php }else{

	 ?>
	<td> <a href="zapiszConf.php?idconf=<?php echo $row['id_conference']; ?>">Zapisz!</a></td>
	 <?php }


}else{
echo "\t\t<td>Niedostępne</td>\n";
}
}else{
echo "\t\t<td>Zarejestruj się</td>\n";
}

echo "\t<tr>\n";
}




echo "<table>\n";

echo "</br>";
    
}
?>
<div id="pwt">
<a href="index.php" class="pwt"  >Powrót</a>
</div>
</div>
