 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();
if($_SESSION['permission']==2||$_SESSION['permission']==3)
{
?>


<div id="addNews">

<form action="sendNews.php" method="POST" enctype="multipart/form-data">
<h2>Dodaj Newsa</h2>

<input type="text" name="topic" placeholder="Temat"><br>
<span>*Maksymalna dlugośc newsa to 780 znaków(z spacjami) </span><br>
 <textarea name="text" rows="7" cols="40"  placeholder="Treść newsa"></textarea><br> 

<input type="file"  name="file" /><br>

<input type="submit" class="btn" value="Dodaj newsa"> 
</form>
<div id="pwt">
<a href="index.php" class="pwt"  >Powrót</a>
</div>
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