<?php
include('connect.php');
include('config.php');


$id=$_GET['id'];
$query = "UPDATE ".$prefix."_Conference SET completed='YES' WHERE id_conference='$id'";
$result = mysql_query($query) or die(mysql_error());
header("Location: editKonferencje.php");

?>