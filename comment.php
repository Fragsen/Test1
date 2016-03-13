 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<textarea rows="4" cols="50" name="comment" form="comm">Napisz komentarz do referatu....</textarea>
<form action="sendComment.php" method="POST" id="comm">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

  <input type="submit" value="Dodaj komentarz">
</form>


