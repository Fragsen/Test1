<?php

echo filesize("config.php");

if (file_exists('config.php')){
 if(filesize("config.php")>30){




?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="css/style.css">
    
<script src="js/main.js"></script>
<link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <title>SKN-IM TECH</title>
</head>

<body>

<?php include('top.php'); ?>
<?php include('menuLoged.php'); ?>
<?php include('content.php'); ?>
<?php include('footer.php'); ?>

</div>
</body>

</html>
<?php

}else{
 header("Location: install.php");
}


}else if(!file_exists('config.php')){

 header("Location: install.php");
	
}

?>
