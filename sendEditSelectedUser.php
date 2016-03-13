 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

include('connect.php');
include('config.php');

$login=$_POST['login'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$permission=$_POST['permission'];
$email=$_POST['email'];
$id=$_POST['id'];
//-------------------------------------
 $npass=$_POST['Npassword1'];
 $npass1=$_POST['Npassword'];


	
	if($npass1==$npass){
	$query = "SELECT password FROM ".$prefix."_User WHERE id_user='$id'";
	$result = mysql_query($query) or die(mysql_error());
	$count=mysql_num_rows($result);
	if($count==1){
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
 	if($npass1=="" && $npass=="" ){
		$query = "UPDATE ".$prefix."_User SET login='$login',name='$name',surname='$surname',permission='$permission',email='$email' WHERE id_user='$id'";
		$result = mysql_query($query) or die(mysql_error());
		header("Location: editUser.php");
		
		}else{
		$password=md5($npass1);
		$query1 = "UPDATE ".$prefix."_User SET login='$login',name='$name',surname='$surname',permission='$permission',email='$email',password='$password' WHERE id_user='$id'";
		$result3 = mysql_query($query1) or die(mysql_error());
		header("Location: editUser.php"); 
		
		}
		}
	}
		
}else{
echo "hasła nie są identyczne.";
}

?>