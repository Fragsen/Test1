 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();
if($_SESSION['permission']==2||$_SESSION['permission']==3)
{

include('connect.php');
//session_start();

$query="SELECT id_uploadpaper,id_user,file,date,acceptation FROM UploadPaper ";
$result = mysql_query($query) or die(mysql_error());
$count=mysql_num_rows($result);

if($count>=1){
  echo "<table border=\"1\" align=\"center\">";

echo "\t<tr>\n";
echo "\t\t<td>ID_Referatu</td>\n";
echo "\t\t<td>ID_Użytkownika</td>\n";
echo "\t\t<td>Nazwa</td>\n";
echo "\t\t<td>Data</td>\n";
echo "\t\t<td>Status</td>\n";
echo "\t\t<td>Zaakceptuj ref.</td>\n";
echo "\t\t<td>Odrzuć ref.</td>\n";

    while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        //print_r($row);
		

	echo "\t<tr>\n";
	foreach($row as $col_value){
	echo "\t\t<td>$col_value</td>\n";
	}

?>
	<td>	
		<form action="accept.php" method="POST"><input type="hidden" name="id" value="<?php echo $row["id_uploadpaper"]; ?>"><br>
		<input type="submit" class="acpt" value="accept" />
		</form>
		<?if ($row[acceptation]=="Zaakceptowany") {?>
		<a href="decline.php?id=<?php echo $row["id_uploadpaper"]; ?>">Odrzuć</a>
		<?} else {?>
		
		<a href="accept.php?id=<?php echo $row["id_uploadpaper"]; ?>">Akceptuj</a>
		<? } ?>
	</td>

	<td>	
		<form action="decline.php" method="POST"><input type="hidden" name="id" value="<?php echo $row["id_uploadpaper"]; ?>"><br>
		<input type="submit" class="odc" value="decline" />
		</form>
	</td>


<?php	
	//echo "\t\t<td>sd</td>\n";	


   echo "\t<tr>\n";

    }
echo "<table>\n";
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

