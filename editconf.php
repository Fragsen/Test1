 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php
session_start();
include('config.php');
include('connect.php');

$id=$_GET['id'];


$query="SELECT id_conference,id_user,Name,estimated_ppl,estimated_spekers,payment,date_conf FROM ".$prefix."_Conference WHERE id_conference='$id'";
$result = mysql_query($query) or die(mysql_error());
$count=mysql_num_rows($result);
 while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
      // print_r($row);

	?>
	<form action="sendEditConf.php" method="POST">
	nazwa: <input type="text" name="nazwa" value="<?php echo $row['Name']; ?>"><br>
	ilość gości: <input type="text" name="ig" value="<?php echo $row['estimated_ppl']; ?>"><br>
	ilość prelegentów: <input type="text" name="ip" value="<?php echo $row['estimated_spekers']; ?>"><br>
	Zapłata: <input type="text" name="pay" value="<?php echo $row['payment']; ?>"><br>
	Dtata: <input type="text" name="date" value="<?php echo $row['date_conf']; ?>"><br>
	 <input type="hidden" name="id" value="<?php echo $row['id_conference']; ?>"><br>
	<input type="submit" class="btn" value="Edytuj"> 
	</form>
	<?php

	}




?>
<a class="pwt" href="index.php">Powrót</a>