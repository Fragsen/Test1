<?php
include('connect.php');
session_start();



 $id_news=$_POST['id'];
$topic=$_POST['topic'];
$text=$_POST['text'];
$id=$_SESSION['iduser'];
$textLength=strlen($text);
if($textLength>780){
header("Location: addNews.php");

exit;
}
$allowed =  array('gif','png' ,'jpg');



$filename = $_FILES['file']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(in_array($ext,$allowed) ) {
  $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="news/";
 
 move_uploaded_file($file_loc,$folder.$file);

$query = "UPDATE ".$prefix."_News SET topic='$topic',text='$text',file='$file',type='$file_type',size='$file_size' WHERE id_news='$id_news'";

$result = mysql_query($query) or die(mysql_error());


header("Location: index.php"); 


}else{
header("refresh:3;url=index.php");
echo "zły format format obrazka";
}


?>

