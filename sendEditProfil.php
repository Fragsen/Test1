 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

include('connect.php');
include('config.php');
session_start();

$login=$_POST['login'];
$name=$_POST['name'];
 $surname=$_POST['surname'];
 $email=$_POST['email'];
$id=$_SESSION['iduser'];
//-------------------------------------
$npass=$_POST['npassword'];
$npass1=$_POST['npassword1'];
$pass=$_POST['password'];
 
	if($pass==""){
		$query = "UPDATE ".$prefix."_User SET login='$login',name='$name',surname='$surname',email='$email' WHERE id_user='$id'";
		$result = mysql_query($query) or die(mysql_error());
		echo "wszystko zmienione pomyślnie";
		   header("Location: editProfil.php");


	}else{echo "obecne hasło nie jest poprawne"; header("refresh:3;url=editProfil.php");}



	if($_POST['orgpass']==md5($pass)){
		if($npass==$npass1 && $npass!="" && $npass!="" ){
		$pass2=md5($npass);
		$query = "UPDATE ".$prefix."_User SET password='$pass2',login='$login',name='$name',surname='$surname',email='$email' WHERE id_user='$id'";
		$result = mysql_query($query) or die(mysql_error());
		echo "wszytsko zmienione pomyślnie";
		header("refresh:3;url=editProfil.php");

		
		}else{echo "hasła nie są identyczne lub są puste"; header("refresh:3;url=editProfil.php");}
	}else{echo "obecne hasło nie jest poprawne"; header("refresh:3;url=editProfil.php");}
	
	

?>