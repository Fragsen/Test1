 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();
include('connect.php');

if($_SESSION['permission']==3)
{
$id=$_GET['id'];


$query="SELECT login,name,surname,permission,email,id_user,password
 FROM ".$prefix."_User WHERE id_user='$id'";
$result = mysql_query($query) or die(mysql_error());
$count=mysql_num_rows($result);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
     //  print_r($row);
$login=$row["login"];
$name=$row["name"];
$surname=$row["surname"];
$permission=$row["permission"];
$email=$row["email"];
$password=$row["password"];
$id=$row["id_user"];


	foreach($row as $col_value){
	 $col_value;
	}
}
?>
<form action="sendEditSelectedUser.php" method="POST">
  login: <input type="text" name="login" value="<?php echo $login; ?>"><br>
imię: <input type="text" name="name" value="<?php echo $name; ?>"><br>
 nazwisko: <input type="text" name="surname" value="<?php echo $surname; ?>"><br>
 uprawnienia: <input type="text" name="permission" value="<?php echo $permission; ?>"><br>
 e-mail: <input type="text" name="email" value="<?php echo $email; ?>"><br>
<input type="hidden" name="id" value="<?php echo $id; ?>"><br>	
nowe hasło: <input type="password" name="Npassword"><br>	
powtórz hasło: <input type="password" name="Npassword1" ><br>	
  <input type="submit" value="Edutuj">
</form>
<?php
}else{

}

?>
