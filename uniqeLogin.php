<?php
session_start();
include('connect.php');
$varLOGIN=$_SESSION['varlogin'];


$query="SELECT login FROM User WHERE login='$varLOGIN'";



$result = mysql_query($query) or die(mysql_error());
$count=mysql_num_rows($result);
if($count>=1){
    while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

	if($row[login]==$varLOGIN)
	{
	$_SESSION['falseLogin']=true;
	break;
	}

    }

}
