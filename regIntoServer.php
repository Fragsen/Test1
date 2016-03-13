<link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="reg"> 
<form action="rejestracja.php" method="POST">
  <h2>Rejestracja</h2>
<span style="color:red;font-size:11px;" >Wszystkie pola są wymagane</span><br>
<input type="text" class="inputL" name="login" placeholder="username"/><br>
<input type="password" class="inputL" name="pass" placeholder="password"/><br>
<input type="password" class="inputL" name="repass" placeholder="repassword"/><br>
<input type="text" class="inputL" name="email" placeholder="e-mail"/><br>
<input type="text" class="inputL" name="name" placeholder="name"/><br>
<input type="text" class="inputL" name="surname" placeholder="surname"/><br>
<input type=submit class="submitL" value="Submit" />
</form>
<a class="pwt" href="index.php">Powrót</a>
</div>
<?php
?>