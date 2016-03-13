<?php 
 include('connect.php');
 include('config.php');

//echo "SELECT * FROM ".$prefix."_News INNER JOIN ".$prefix."_User on ".$prefix."_News.id_user= ".$prefix."_User.id_user ORDER BY ".$prefix."_News.id_news DESC LIMIT $start,$perPage";
$query="SELECT * FROM ".$prefix."_News";

$result = mysql_query($query) or die(mysql_error());
$total=mysql_num_rows($result)
?>

<div id="content">

    <?php
    include('connect.php');

    $page=isset($_GET['page'])?(int)$_GET['page']:1;
    $perPage=5;

    $start=($page>1)?($page*$perPage)-$perPage:0;

    $query="SELECT * FROM ".$prefix."_News INNER JOIN ".$prefix."_User on ".$prefix."_News.id_user= ".$prefix."_User.id_user ORDER BY ".$prefix."_News.id_news DESC LIMIT $start,$perPage";
    $result = mysql_query($query) or die(mysql_error());
  	$count=mysql_num_rows($result);
    $pages=ceil($total/$perPage);

    if($count>=1) {
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	?>
				

									
	<div id="viewNews">
           <div id="imgNews">
<img src="news/<?php echo $row['file'] ?>" alt="Smiley face" height="170" width="260">
</div>

	   <div id="topicNews" style="color:orange" > <?php echo "<i>".$row['topic']."</i>"; ?> </div>
	   <div id="trescNews"><?php echo $row['text']; ?> </div>
	   <div id="autorNews" style="color:red"><?php echo 'dodane przez: '.$row['login'].""; ?></div>
	   <div id="dateNews"><?php echo "&nbsp".$row['date']; ?></div>
	</div>
<hr>

	<?php
		
            echo "</br>";
        }
    }

    ?>
<div id="pagination">
    <?php for($x=1;$x<=$pages;$x++): ?>
    <a href="?page=<?php echo $x; ?>&per-page=<?php echo $perPage; ?>"<?php if($page==$x){echo 'class="selected"';} ?>><?php echo $x ?></a>
<?php endfor; ?>
</div>
</div>

