 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();
if($_SESSION['permission']==2||$_SESSION['permission']==3)
{

$id=$_POST['id_user'];


include('connect.php');
$query="SELECT * FROM UploadPaper WHERE id_user=$id ";
$result = mysql_query($query) or die(mysql_error());
$numPaper=mysql_num_rows($result);

$query="SELECT * FROM News WHERE id_user=$id ";
$result = mysql_query($query) or die(mysql_error());
$numNews=mysql_num_rows($result);
?>


<div id="deleteSelectedUser">
Skasowanie użytkownika o id <?php echo $id; ?> spowoduje skasowanie jego wszystkich referatów <span style="font-size:20px;">{<?php echo $numPaper; ?>}</span> oraz ew. newsów <span style="font-size:20px;">{<?php echo $numNews; ?>}</span>

  <form action="removeUser.php" method="post">
            <input type="hidden" value="<?php echo $id  ?>"  name="id_user">
            <input type="submit" class="edit" value="Kasuj">
        </form>

<a class="pwt" href="index.php">Powrót</a>
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

     