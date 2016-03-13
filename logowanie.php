 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
include('connect.php');
session_start();
 $LOGIN=$_POST['name'];
 $PASSWORD=md5($_POST['pass']);


$query="SELECT name,password,permission,id_user FROM ".$prefix."_User WHERE login='$LOGIN' AND password ='$PASSWORD'";
$result = mysql_query($query) or die(mysql_error());
$count=mysql_num_rows($result);
if($count==1){
    while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

        //print_r($row);


        $PERMI= $row['permission'];
        $_SESSION['iduser']=$row['id_user'];
        //  echo $row['password']; // etc..

    }
    $_SESSION['login']= $LOGIN;

   $_SESSION['permission']= $PERMI;
    header("Location: index.php");
}else{
header("refresh:3;url=index.php");
?>
<div id="redirect">
<?php
echo "<h2>"."Zły login lub hasło"."</h2>"."<br>";
echo "Za chwile nastąpi przekierowanie do strony głównej...";
?>
</div>
<?php
}

?>
