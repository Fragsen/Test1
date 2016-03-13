 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();
if($_SESSION['permission']==2||$_SESSION['permission']==3)
{

include('connect.php');

$id=$_POST['id_user'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$email=$_POST['email'];
$permission=$_POST['permission'];
$login=$_POST['login'];
$password=$_POST['password'];

$query="UPDATE User SET
login='$login',
password='$password',
email='$email',
name='$name',
surname='$surname',
permission='$permission'
WHERE id_user='$id'";

$result = mysql_query($query) or die();
header("Location: http://www.pec.uni.lodz.pl/~matfran91/index.php");
}else{
?>

<div id="danger">
Nie posiadasz odpowiednich uprawnień!!
</div>

<?php
}







