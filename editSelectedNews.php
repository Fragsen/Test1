 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();
if($_SESSION['permission']==2||$_SESSION['permission']==3)
{
$id=$_GET['id'];
include('connect.php');
$query="SELECT topic,text,id_news,file FROM ".$prefix."_News WHERE id_news='$id'";
$result = mysql_query($query) or die(mysql_error());
$count=mysql_num_rows($result);

if($count==1){
 while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
       // print_r($row);


	foreach($row as $col_value){
	//echo "\t\t<td>$col_value</td>\n";

	}


?>

<div id="addNews">

<form action="sendEditedNews.php" method="POST" enctype="multipart/form-data">
<h2>Dodaj Newsa</h2>

<input type="text" name="topic" value=<?php echo $row['topic']; ?> placeholder="Temat"><br>
<span>*Maksymalna dlugośc newsa to 780 znaków(z spacjami) </span><br>
 <textarea name="text" rows="7" cols="40"  placeholder="Treść newsa"><?php echo $row['text']; ?></textarea><br> 

<input type="file" name="file" /> *musisz ponownie dodać grafike newsa<br> 
<input type="hidden" value=<?php echo $id; ?> name="id" />
<input type="submit" class="btn" value="Dodaj newsa"> 
</form>
<div id="pwt">
<a href="index.php"  class="pwt"  >Powrót</a>
</div>
</div>


<?php
}
}
?>



<?php
}else{
?>

<div id="danger">
Nie posiadasz odpowiednich uprawnień!!
</div>

<?php
}

?>