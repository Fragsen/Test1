<?php

include('config.php');

$conn = mysql_connect($servername, $user, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	
	
}
 $db_selected = mysql_select_db($user, $conn);
        if (!$db_selected) {
      
	
        }



  