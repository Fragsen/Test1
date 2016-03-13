<?php
session_start();
if ($_SESSION['login']&& $_SESSION['permission']==1) {


    ?>
    <div id="menuLoged">

        <ul>
            <li><a href="sendPaper.php">Zgłoś referat</a></li>
		<li><a href="konferencje.php">Konferencje</a></li>
            <li><a href="browsePersonalPaper.php">Przeglądaj swoje referaty</a></li>
		<li><a href="editProfil.php">Edytuj Profil</a></li>
            <li><a href="logout.php">Wyloguj</a></li>
        </ul>

    </div>

    <?php
}else if($_SESSION['login']&& $_SESSION['permission']==2) {
?>
<div id="menuLoged">

    <ul>
 	<li><a href="addConf.php">Utwórz konferencje</a></li>
 	<li><a href="editKonferencje.php">Zarządzaj konferencjami</a></li>
        <li><a href="browsePaper.php">Przeglądaj referaty</a></li>
        <li><a href="addNews.php">Dodaj ogłoszenie</a></li>
	<li><a href="deleteNews.php">Zarządzaj ogłoszeniem</a></li>
	<li><a href="editProfil.php">Edytuj Profil</a></li>
        <li><a href="logout.php">Wyloguj</a></li>
    </ul>

</div>
<?php
}else if($_SESSION['login']&& $_SESSION['permission']==3){
    ?>
<div id="menuLoged">

    <ul>
                <li><a href="editUser.php">Zarządzanie użytkownikami</a></li>
    
        <li><a href="addNews.php">Dodaj ogłoszenie</a></li>
  	<li><a href="deleteNews.php">Zarządaj ogłoszeniem</a></li>
        <li><a href="logout.php">Wyloguj</a></li>
    </ul>

</div>
<?php
}else {

}
?>