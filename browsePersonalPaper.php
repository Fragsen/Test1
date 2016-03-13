 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();


echo $dir=substr($_SERVER['PHP_SELF'],0,12);
echo "<br>";
echo $uploads=$dir.'uploads/';


$id=$_SESSION['iduser'];
include('connect.php');
include('config.php');
$query="SELECT id_uploadpaper,file,date,acceptation,comment FROM ".$prefix."_UploadPaper WHERE id_user='$id '";
$result = mysql_query($query) or die(mysql_error());
$count=mysql_num_rows($result);




if($count>=1) {
?>

<h2 style="text-align:center;">Twoje zgłoszone referaty</h2>
<?php
echo "<table border=\"1\" align=\"center\">";
echo "\t<tr>\n";
echo "\t\t<td>ID</td>\n";
echo "\t\t<td>Nazwa</td>\n";
echo "\t\t<td>Data</td>\n";
echo "\t\t<td>Status</td>\n";
echo "\t\t<td>Komentarz zwrotny</td>\n";
echo "\t\t<td>Pobierz</td>\n";

  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        	if($row['file']) 
		{$nazwa=$row['file'];
		 $id_upload=$row['id_uploadpaper'];
		}

 			echo "\t<tr>\n";
			foreach($row as $col_value){
			echo "\t\t<td>$col_value</td>\n";
			}

	echo "\t\t<td>"."<a href="."$uploads"."$nazwa".">Click</a>"."</td>\n";
	echo "$uploads"."$nazwa";

			if($row['acceptation']=='Zaakceptowany'){
			$query1="SELECT id_conference FROM ".$prefix."_Conference ORDER BY id_conference DESC LIMIT 1 ";
			$result1 = mysql_query($query1) or die(mysql_error());
				  while ($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
					//echo $row1['id_conference'];
					?>
					<td>
					<form action="zapiszDoConfSpeaker.php" method="post">
					<input type="hidden" name="idconf" value="<?php echo $row1['id_conference']; ?>"/>
					<input type="hidden" name="idupload" value="<?php echo  $id_upload; ?>"/>
					<input type="submit" value="Zapisz na  konferencje jako prelegent" />
					</form>
										</td>
					<?php
				  }	

			}	
	
	
		}
		
			
	
echo "<table>\n";
echo "</br>";
 
}else{
echo "<h1 style="."text-align:center;".">"."nie dodałeś żadnego referatu"."</h1>";
}



?>


<div id="pwt">
<a href="index.php" class="pwt"  >Powrót</a>
</div>