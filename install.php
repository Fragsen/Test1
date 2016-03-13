<link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php

if (file_exists('config.php')){
	if (is_writable('config.php')  ){

	if(!isset( $_POST['p1']) && !isset( $_POST['p2']) && !isset( $_POST['p3']))
	{
	?>
		<form action="install.php" method="POST">
		User:<br> <input type="text" name="User"><br>
		Hasło:<br> <input type="text" name="Pass"><br>
		Nazwa Hosta:<br> <input type="text" name="Serv"><br>
		Prefix:<br> <input type="text" name="Pref"><br><br>
 		<input type="submit" value="Dalej" name="p1" >
		</form>
	<?php
	}
	}else{echo 'zmień prawda do pliku na 0646';
	?> <br><br><button><a href="install.php" style="color:black;">zrobione(click)</a></button><?php
	}
}else{
echo 'Stwórz plik config.php';
?>  <br><br><button><a href="install.php" style="color:black;">zrobione(click)</a></button> <?php
}

?>
 

<?php
if ( isset( $_POST['p1'] ) ) { 
if(!mysql_connect($_POST['Serv'],$_POST['User'],$_POST['Pass']))
{
echo "<h2>"."złe dane"."</h2>";
?>

<form action="install.php" method="POST">
		User:<br> <input type="text" name="User"><br>
		Hasło:<br> <input type="text" name="Pass"><br>
		Nazwa Hosta:<br> <input type="text" name="Serv"><br>
		Prefix:<br> <input type="text" name="Pref"><br><br>
 		<input type="submit" value="Dalej" name="p1" >
		</form>




<?php
}else{
echo "<h2>Przekopiuj wygenrowany kod do stworzonego/istniejącego pliku config.php</h2>";

echo "&lt;?php"."<br />";

echo '$user='."'".$_POST['User']."'".";"."<br>";
echo '$password='."'".$_POST['Pass']."'".";"."<br>"; 
echo '$servername ='."'".$_POST['Serv']."'".";"."<br>";
echo '$prefix='."'".$_POST['Pref']."'".";"."<br>";
echo '?>';

?>
	<form action="install.php" method="POST">
 		<input type="submit" value="Zrobione" name="p2" >
		</form>
<?php
}


?>
	

<?php

}
if ( isset( $_POST['p2'] ) ) { 
include('config.php');
include('connect.php');
	$conn = mysql_connect($servername, $user, $password);
	// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
 	$db_selected = mysql_select_db($user, $conn);
        if (!$db_selected) {
            die ('Nie można wybrać bazy: ' . mysql_error());
        }else{ echo "nawiązano połączenie z bazą danych"; }


	


 $query=" CREATE TABLE IF NOT EXISTS `".$prefix."_Conference` (
  `id_conference` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Name` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `date_conf` date NOT NULL,
  `Date_post` date NOT NULL,
  `estimated_ppl` int(11) NOT NULL,
  `estimated_spekers` int(11) NOT NULL,
  `payment` double NOT NULL,
  `completed` enum('Yes','No') COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";
$result = mysql_query($query) or die(mysql_error());

$query111="CREATE TABLE IF NOT EXISTS `".$prefix."_News` (
  `id_news` int(4) unsigned NOT NULL,
  `topic` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `text` longtext COLLATE utf8_polish_ci NOT NULL,
  `date` date NOT NULL,
  `id_user` int(10) NOT NULL,
  `size` int(11) NOT NULL,
  `file` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";
$result = mysql_query($query111) or die(mysql_error());

$query1="CREATE TABLE IF NOT EXISTS `".$prefix."_Participant` (
  `id_participant` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_conference` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";
$result = mysql_query($query1) or die(mysql_error());		




$query2="CREATE TABLE IF NOT EXISTS `".$prefix."_Speaker` (
  `id_speaker` int(11) NOT NULL,
  `id_conference` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ref` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";
$result = mysql_query($query2) or die(mysql_error());	


$query3="CREATE TABLE IF NOT EXISTS `".$prefix."_UploadPaper` (
  `id_uploadpaper` int(11) NOT NULL,
  `file` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `topic` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `size` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `acceptation` enum('Zaakceptowany','Odrzucony','Czeka') COLLATE utf8_polish_ci NOT NULL,
  `comment` varchar(300) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";
$result = mysql_query($query3) or die(mysql_error());	



$query4="CREATE TABLE IF NOT EXISTS `".$prefix."_User` (
  `id_user` int(10) unsigned NOT NULL,
  `login` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `password` char(50) COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `permission` enum('1','2','3') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";
$result = mysql_query($query4) or die(mysql_error());	

$query5="ALTER TABLE `".$prefix."_Conference`
  ADD PRIMARY KEY (`id_conference`);";
$result = mysql_query($query5) or die(mysql_error());	


$query6="ALTER TABLE `".$prefix."_News`
  ADD PRIMARY KEY (`id_news`), ADD KEY `id_user` (`id_user`);";
$result = mysql_query($query6) or die(mysql_error());	

$query7="ALTER TABLE `".$prefix."_Participant`
  ADD PRIMARY KEY (`id_participant`);";
$result = mysql_query($query7) or die(mysql_error());

$query8="ALTER TABLE `".$prefix."_Speaker`
  ADD PRIMARY KEY (`id_speaker`);";
$result = mysql_query($query8) or die(mysql_error());


$query9="ALTER TABLE `".$prefix."_UploadPaper`
  ADD PRIMARY KEY (`id_uploadpaper`);";
$result = mysql_query($query9) or die(mysql_error());


$query10="ALTER TABLE `".$prefix."_User`
  ADD PRIMARY KEY (`id_user`);";
$result = mysql_query($query10) or die(mysql_error());

$query11="ALTER TABLE `".$prefix."_Conference`
  MODIFY `id_conference` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;";
$result = mysql_query($query11) or die(mysql_error());

$query12="ALTER TABLE `".$prefix."_News`
  MODIFY `id_news` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;";
$result = mysql_query($query12) or die(mysql_error());

$query13="ALTER TABLE `".$prefix."_Participant`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;";
$result = mysql_query($query13) or die(mysql_error());

$query14="ALTER TABLE `".$prefix."_Speaker`
  MODIFY `id_speaker` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;";
$result = mysql_query($query14) or die(mysql_error());

$query15="ALTER TABLE `".$prefix."_UploadPaper`
  MODIFY `id_uploadpaper` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;";
$result = mysql_query($query15) or die(mysql_error());


$query16="ALTER TABLE `".$prefix."_User`
  MODIFY `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;"; 
$result = mysql_query($query16) or die(mysql_error());

?>

<form action="install.php" method="POST">
<h3>Wpisz login i hasło nowego administartora strony</h3>
Użytkownik:<br> <input type="text" name="User1"><br>
Hasło:<br> <input type="text" name="Pass1"><br>
<input type="submit" value="Dalej" name="p3" >
</form>


<?php
}


if ( isset( $_POST['p3'] ) ) {
$login=$_POST['User1'];
$pass=md5($_POST['Pass1']);

include('config.php');
include('connect.php');



 $query="INSERT INTO ".$prefix."_User (login,password,permission)
 VALUES ('$login','$pass','3') ";
 $result = mysql_query($query) or die(mysql_error());
?>

 -Skasuj plik instalacyjny install.php.<br>
 -Zmień prawda dostępu do  pliku config.php (0644). <br>
 -Zmień prawda dostępu do katalogu(folderu) "news/" na 0777 aby móc poprawnie wyświetlać obrazki w newsach. <br>
 -Zmień prawda dostępu do katalogu(folderu) "uploads/" na 0777 aby móc poprawnie przesyłać pliki na serwer. <br>

<button><a href="index.php" style="color:black;">Zakończ</a></button>
<?php
	
}


?>







