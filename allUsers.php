 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();
if($_SESSION['permission']==2||$_SESSION['permission']==3)
{

$id=$_SESSION['iduser'];
include('connect.php');
$query="SELECT login,name,surname,permission,email,id_user FROM User";
$result = mysql_query($query) or die(mysql_error());
$count=mysql_num_rows($result);

if($count>=1) {
?>
<div id="allUsers">
<h2 style="text-align:center;">Lista zarejestrowanych użytkowników</h2>
<?php
echo "<table border=\"1\" align=\"center\">";
echo "\t<tr>\n";
echo "\t\t<td>Login</td>\n";
echo "\t\t<td>Imię</td>\n";
echo "\t\t<td>Nazwisko</td>\n";
echo "\t\t<td>Uprawnienia</td>\n";
echo "\t\t<td>e-mail</td>\n";
echo "\t\t<td>ID</td>\n";

    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        //print_r($row);

   echo "\t<tr>\n";
	foreach($row as $col_value){
	echo "\t\t<td>$col_value</td>\n";
	}
echo "\t<tr>\n";
}

echo "<table>\n";

echo "</br>";
    
}
?>
<div id="pwt">
<a href="index.php" class="pwt"  >Powrót</a>
</div>
</div>
<?php
}else{
?>

<div id="danger">
Nie posiadasz odpowiednich uprawnień!!
</div>

<?php
}

?>
