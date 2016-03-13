<?php

session_start();
include('connect.php');
$id= $_SESSION['iduser'];
$idconf= $_GET['idconf'];

 $query4 = "SELECT id_user FROM ".$prefix."_Participant WHERE id_user='$id' AND id_conference='$idconf'";
$result1=mysql_query($query4) or die(mysql_error());
$count=mysql_num_rows($result1);
	if($count<1){
	$query3 = "INSERT INTO ".$prefix."_Participant (id_user,id_conference) VALUES('$id','$idconf')";
	mysql_query($query3) or die(mysql_error());
	}else{
	echo "jest już zapisany na tą konferencje";
	}

header("Location: konferencje.php");


?>