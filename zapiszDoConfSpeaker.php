<link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<?php

include('connect.php');
include('config.php');
session_start();
 $idconf=$_POST['idconf'];
$idupload=$_POST['idupload'];
$id=$_SESSION['iduser'];


$query1="SELECT id_user FROM ".$prefix."_Speaker WHERE id_user='$id'";
$result1 = mysql_query($query1) or die(mysql_error());
$count=mysql_num_rows($result1);
if($count>1){
echo "Już zapisałeś się na tą konferencje.";
}else{
$query="INSERT INTO ".$prefix."_Speaker (id_user,id_conference,id_ref) VALUES ('$id','$idconf','$idupload')";
$result = mysql_query($query) or die(mysql_error());
}
//---- PRZY ZAPISIE JAKO SPEAKER KASOWANIE JAKO GOŚĆ
$query2="SELECT id_user FROM ".$prefix."_Participant WHERE id_user='$id'";
$result2 = mysql_query($query2) or die(mysql_error());
$count2=mysql_num_rows($result2);
if($count2>1){

$query3="DELETE  FROM ".$prefix."_Participant WHERE id_user='$id'";
$result3 = mysql_query($query3) or die(mysql_error());

}

header("Location: index.php");

?>