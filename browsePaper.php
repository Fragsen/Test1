<link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?
include('config.php');
include('connect.php');

$dir=substr($_SERVER['PHP_SELF'],0,12);
 $uploads=$dir.'uploads/';

$query="SELECT id_uploadpaper,id_user,file,date,acceptation,comment FROM ".$prefix."_UploadPaper ";
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
echo "\t\t<td>Komentarz</td>\n";
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
				<?if ($row[acceptation]=="Zaakceptowany") {?>
		<a href="decline.php?id=<?php echo $row["id_uploadpaper"]; ?>">Odrzuć</a>
		<?} else {?>
		
		<a href="accept.php?id=<?php echo $row["id_uploadpaper"]; ?>">Akceptuj</a>
		<? } ?>
	</td>
	
<td>
<a href="comment.php?id=<?php echo $row["id_uploadpaper"]; ?>">dodaj komentarz</a>

</td>

<?php	
	if($row['file']) 
{$nazwa=$row['file'];
$id_upload=$row['id_uploadpaper'];
echo "\t\t<td>"."<a href=".$uploads.$nazwa.">Podgląd</a>"."</td>\n";
}
?>



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
