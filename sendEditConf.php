 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

include('connect.php');
include('config.php');

$nazwa=$_POST['nazwa'];
$ig=$_POST['ig'];
$ip=$_POST['ip'];
$pay=$_POST['pay'];
$date=$_POST['date'];
$id=$_POST['id'];


$query = "UPDATE ".$prefix."_Conference SET Name='$nazwa',date_conf='$date',estimated_ppl='$ig',estimated_spekers='$ip',payment='$pay' WHERE id_conference='$id'";
$result = mysql_query($query) or die(mysql_error());
header("Location: index.php");
		
?>