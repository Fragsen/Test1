
<link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();
include('connect.php');
 $LOGIN=$_POST['login'];
 $PASSWORD=md5($_POST['pass']);



 $REPASSWORD=md5($_POST['repass']);
 $NAME=$_POST['name'];
 $SURNAME=$_POST['surname'];
 $EMAIL=$_POST['email'];
 $PERMISSION=1;

if( $NAME=="" ||$SURNAME=="" || $EMAIL =="" )
{
header("refresh:3;url=index.php");
echo "Należy wypełnić wszytskie pola"."<br>";
echo "za chwile nastąpi przekierowanie.."."<br>";

}


$_SESSION['varlogin'] = $LOGIN;
$_SESSION['falseLogin']=false;

//include('uniqeLogin.php');


if($_SESSION['falseLogin']==false) {

    if ($PASSWORD == $REPASSWORD) {
               $query = "INSERT INTO ".$prefix."_User (login,password,email,name,surname,permission)
VALUES('$LOGIN','$PASSWORD','$EMAIL','$NAME','$SURNAME',1)";
        $result = mysql_query($query) or die(mysql_error());
header("refresh:1;url=index.php");
    } else {
        echo "Hasła nie są identyczne."."<br>";
header("refresh:3;url=index.php");

echo "za chwile nastąpi przekierowanie.."."<br>";
    }
}else{
    echo "Użytkownik z takim loginem już istnieje"."<br>";
header("refresh:1;url=index.php");

echo "za chwile nastąpi przekierowanie.."."<br>";
}