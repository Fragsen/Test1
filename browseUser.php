 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();
if($_SESSION['permission']==2||$_SESSION['permission']==3)
{
include('connect.php');

$query="SELECT * From User";
$result = mysql_query($query) or die(mysql_error());
$count=mysql_num_rows($result);

if($count>=1) {
?>
<h2 style="text-align:center;">Twoje zgłoszone referaty</h2>
<?php
  echo "<table border=\"1\" align=\"center\">";
echo "\t<tr>\n";
echo "\t\t<td>ID</td>\n";
echo "\t\t<td>Nazwa</td>\n";

echo "\t\t<td>Data</td>\n";

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
<?php
}else{
?>

<div id="danger">
Nie posiadasz odpowiednich uprawnień!!
</div>

<?php
}

?>
