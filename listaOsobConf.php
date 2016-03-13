<link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<?php

include('connect.php');
include('config.php');
session_start();

$id=$_GET['id'];

$query="SELECT id_user FROM ".$prefix."_Participant WHERE id_conference='$id'";
$result = mysql_query($query) or die(mysql_error());
$count=mysql_num_rows($result);
echo "<table border=\"1\" align=\"center\">";
?> <h3 style="text-align:center;color:orange">Goście</h3> <?php
echo "\t<tr>\n";
echo "\t\t<td>Imię</td>\n";
echo "\t\t<td>Nazwisko</td>\n";
echo "\t\t<td>e-mail</td>\n";
  
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
     
	foreach($row as $col_value){
	$query="SELECT name,surname,email FROM ".$prefix."_User WHERE id_user='$col_value'";
	$result1 = mysql_query($query) or die(mysql_error());
	
		while($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
     		echo "\t<tr>\n";
		foreach($row1 as $col_value1){
		echo "\t\t<td>$col_value1</td>\n";

		}
		}

	}
}

//---------------------------------------------------------------------------------------------------------


$query="SELECT id_user FROM ".$prefix."_Speaker WHERE id_conference='$id'";
$result = mysql_query($query) or die(mysql_error());
$count=mysql_num_rows($result);
echo "<table border=\"1\" align=\"center\">";
?> <h3 style="text-align:center;color:red">Prelegenci</h3> <?php
echo "\t<tr>\n";
echo "\t\t<td>Imię</td>\n";
echo "\t\t<td>Nazwisko</td>\n";
echo "\t\t<td>e-mail</td>\n";
  
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
     
	foreach($row as $col_value){
	$query="SELECT name,surname,email FROM ".$prefix."_User WHERE id_user='$col_value'";
	$result1 = mysql_query($query) or die(mysql_error());
	
		while($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
     		echo "\t<tr>\n";
		foreach($row1 as $col_value1){
		echo "\t\t<td>$col_value1</td>\n";

		}
		}

	}
}


?>