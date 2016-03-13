 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();
if($_SESSION['permission']==1||$_SESSION['permission']==2||$_SESSION['permission']==3)
{
?>


<div id="upload_d">
<h2>Wyślij referat</h2>
(nazwa pliku powina zawierać tylko polskie znaki bez znaków specialnych)
<form action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<button type="submit" name="btn-upload">upload</button>
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