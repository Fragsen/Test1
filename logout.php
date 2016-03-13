<?php

header("Location: http://www.pec.uni.lodz.pl/~matfran91/");
setcookie(session_name(), '', time()-42000, '/');
session_destroy();
?>