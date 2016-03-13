<?php
include('connect.php');
include('config.php');
session_start();

$id=$_SESSION['iduser'];
$idconf=$_GET['idconf'];


$query="DELETE FROM ".$prefix."_Speaker WHERE id_user='$id'AND id_conference='$idconf' ";
$result = mysql_query($query) or die(mysql_error());


$query1="DELETE FROM ".$prefix."_Participant WHERE id_user='$id'AND id_conference='$idconf' ";
$result1 = mysql_query($query1) or die(mysql_error());

	
 header("Location: konferencje.php");
?>