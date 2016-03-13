 <link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
include('connect.php');
session_start();

if($_SESSION['permission']==1||$_SESSION['permission']==2||$_SESSION['permission']==3)
{

if(isset($_POST['btn-upload']))
{    

$id=$_SESSION['iduser'];
 $file = rand(1,1000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 

$allowed =  array('pdf','docx','doc');
$filename = $_FILES['file']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(in_array($ext,$allowed) ) {
 move_uploaded_file($file_loc,$folder.$file);

 $sql="INSERT INTO ".$prefix."_UploadPaper(file,type,size,date,id_user,acceptation) VALUES('$file','$file_type','$file_size',now(),'$id','Czeka')";
 mysql_query($sql); 
}else{
header("refresh:3;url=index.php");
echo "nie poprawny format referatu (tylko .pdf .docx)";

}
header("refresh:1;url=index.php");
}
}else{
?>
<div id="danger">
Nie posiadasz odpowiednich uprawnień!!
</div>

<?php
}

?>
