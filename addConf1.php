<link rel="stylesheet" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
include('connect.php');
include('config.php');
session_start();

$id=$_SESSION['iduser'];
$name= $_POST['Name'];
$payment= $_POST['Payment'];
$date=$_POST['Date'];
$ppl= $_POST['Ppl'];
$spk= $_POST['Spk'];

$sql1="SELECT * FROM ".$prefix."_Conference WHERE completed = 'NO'";
	 $result1 = mysql_query($sql1) or die(mysql_error());
$count=mysql_num_rows($result1);
if($count>1){
echo "Może istnieć tylko 1 aktywna konferencja na raz";
	header("refresh:3;url=index.php");

}else{

if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date))
    {	
	if(is_numeric($ppl)&& is_numeric($spk)&&is_numeric($payment))
	{
         $sql="INSERT INTO ".$prefix."_Conference(Name,date_conf,Date_post,estimated_ppl,estimated_spekers,payment,completed,id_user) VALUES('$name','$date',now(),'$ppl',$spk,'$payment','No','$id')";
	 $result = mysql_query($sql) or die(mysql_error());
 header("Location: editKonferencje.php");
	}else{  echo "Nie poprawny format gości/recenzentów/zapłaty";
	header("refresh:3;url=index.php");}

    }else{

        echo "Nie poprawny format daty";
	header("refresh:3;url=index.php");
    }


}
?>