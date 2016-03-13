 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();
if($_SESSION['permission']==2||$_SESSION['permission']==3)
{


include('connect.php');
include('config.php');

 $id=$_GET['id'];


$query="DELETE FROM ".$prefix."_User WHERE id_user='$id'";
$result = mysql_query($query) or die();

$query="DELETE FROM ".$prefix."_UploadPaper WHERE id_user='$id'";
$result = mysql_query($query) or die();

$query="DELETE FROM ".$prefix."_News WHERE id_user='$id'";
$result = mysql_query($query) or die();

header("Location: editUser.php");
}else{
?>

<div id="danger">
Nie posiadasz odpowiednich uprawnień!!
</div>

<?php
}