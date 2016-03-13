 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

session_start();
include('connect.php');

if($_SESSION['permission']==2||$_SESSION['permission']==3)
{
echo "asd";
$id=$_GET['id'];
include('connect.php');




$query="DELETE FROM ".$prefix."_News WHERE id_news='$id'";
$result = mysql_query($query) or die();

header("Location: deleteNews.php");

}else{
?>

<div id="danger">
Nie posiadasz odpowiednich uprawnień!!
</div>

<?php
}

?>