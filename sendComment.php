
<?php
session_start();

$id=$_POST['id'];
$comment=$_POST['comment'];
include('connect.php');
include('config.php');
$query="UPDATE ".$prefix."_UploadPaper SET comment='$comment' WHERE id_uploadpaper='$id'";
$result = mysql_query($query) or die(mysql_error());
header("Location: browsePaper.php");

?>