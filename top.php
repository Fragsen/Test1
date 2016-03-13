
<link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <div id="container">
        <div id="top">
            <div id="logo"><img src="images/logo.png"></div>
            <div id="menuFunctions">
                <div id="data"><?php include('data.php'); ?> </div>
                <div id="logowanie">
                    <?php if($_SESSION['login']){
                        echo " You are loged in as	";
			echo '<span style="color:red;">'. "<b>". $_SESSION['login']. "</b>".'</span>';
			echo ",witaj!";
                    }else {
                        ?>
			<a href="logIntoServer.php" ><div class="reg1">Logowanie</div></a>
                        <a href="regIntoServer.php"><div class="reg1"> Rejestracja</div></a>
                        
                        <?php
                        }
                        ?>
                </div>
                <div id="menu"  >
          <ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="konferencje.php">Konferencje</a></li>
  <li><a href="kontakt.php">Kontakt</a></li>
  <li><a href="onas.php">O nas</a></li>
 <li style=float:right;><a href="faq.php">FAQ</a></li>
</ul>
                    
                </div>
            </div>
            </div>
        </div>