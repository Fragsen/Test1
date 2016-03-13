 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php
session_start();
include('config.php');
include('connect.php');

$id=$_SESSION['iduser'];


$query="SELECT login,password,name,surname,email FROM ".$prefix."_User WHERE id_user='$id'";
$result = mysql_query($query) or die(mysql_error());
$count=mysql_num_rows($result);
 while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
      // print_r($row);

	?>
	<form action="sendEditProfil.php" method="POST">
	login: <input type="text" name="login" value="<?php echo $row['login']; ?>"><br>
	Imię: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
	Nazwisko: <input type="text" name="surname" value="<?php echo $row['surname']; ?>"><br>
	E-mail: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
	Obecne hasło: <input type="password" name="password" ><br>
	Nowe hasło: <input type="password" name="npassword" ><br>
	Powtórz hasło: <input type="password" name="npassword1" ><br>
	<input type="hidden" name="orgpass" value="<?php echo $row['password']; ?>" ><br>
	<input type="submit" class="btn" value="Edytuj"> 
	</form>
	<?php

	}




?>
<a class="pwt" href="index.php">Powrót</a>