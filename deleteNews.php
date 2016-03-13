 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();
if($_SESSION['permission']==2||$_SESSION['permission']==3)
{

$id=$_SESSION['iduser'];
include('connect.php');
$query="SELECT id_news,topic,text,date,id_user FROM ".$prefix."_News WHERE id_user='$id' ORDER BY id_news DESC  ";
$result = mysql_query($query) or die(mysql_error());
$count=mysql_num_rows($result);

if($count>=1) {
?>

<h2 style="text-align:center;">Lista Newsów</h2>
<?php
echo "<table border=\"1\" align=\"center\">";
echo "\t<tr>\n";
echo "\t\t<td>ID</td>\n";
echo "\t\t<td>Temat</td>\n";
echo "\t\t<td>Treść</td>\n";
echo "\t\t<td>	Data</td>\n";
echo "\t\t<td>Użytkownik</td>\n";
echo "\t\t<td></td>\n";
echo "\t\t<td></td>\n";
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        //print_r($row);

   echo "\t<tr>\n";
	foreach($row as $col_value){
	echo "\t\t<td>$col_value</td>\n";
	}
?>
<td>
 <a href="deleteSelectedNews.php?id=<?php echo $row['id_news']; ?>">Delete</a>
</td>

<td>
 <a href="editSelectedNews.php?id=<?php echo $row['id_news']; ?>">Edit</a>
</td>


<?php
echo "\t<tr>\n";
}

echo "<table>\n";

echo "</br>";
    
}

?>
<div id="pwt">
<a href="index.php" class="pwt"  >Powrót</a>
</div>
<?php
}else{
?>

<div id="danger">
Nie posiadasz odpowiednich uprawnień!!
</div>

<?php
}

?>