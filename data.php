<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<?php

$data=mktime(0,0,0,8,23,2016); //Wpisz date
$dzis=date("j-m-Y",mktime());
$dzien=date("j",mktime());
$rok=date("Y",mktime());

$m_pol = array("Stycznia", "Lutego", "Marca", "Kwietnia", "Maja", "Czerwca", "Lipica", "Sierpnia", "Wrzesienia", "PaĹşdziernika", "Listopada", "Grudnia");
$m_en = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
$workoutSlug = str_replace($m_en, $m_pol,date("M",mktime()) );
$dni = array('Niedziela', 'Poniedziałek', 'Wtorek', 'środa', 'Czwartek', 'Piątek', 'Sobota');




echo  'Dziś jest '.$dni[date('w')].' '.$dzien." ".$workoutSlug." ".$rok.'.r';









?>