 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();


if($_SESSION['permission']==2||$_SESSION['permission']==3)
{

$id=$_POST['id'];
$id=$_GET['id'];
include('connect.php');
$query="UPDATE ".$prefix."_UploadPaper SET acceptation='Zaakceptowany' WHERE id_uploadpaper='$id'";
$result = mysql_query($query) or die(mysql_error());
header("Location: browsePaper.php");
// Nowa linia kodu!!!!!

}else{
?>

<div id="danger">
Nie posiadasz odpowiednich uprawnień!!
</div>

<?php
}

?>

