<?php echo $header; ?>
<?php
$i = 1;
foreach($portfolios as $p)
{
	echo "<div class='portfoliodiv'>";
	echo "<a href='" . $baseurl . "p/v/" . $p->hashurl . "'><img width='200px' src='" . $baseurl . 'files/img/'. $p->previmg . "'></a>";
	if ($userinfo && $userinfo->user_id == "mario")
		echo "<span class='title'><a href='" . $baseurl . "p/edit/" . $p->id . "'>" . $p->subject . "</a></span>";
	else
		echo "<span class='title'>" . $p->subject . "</span>";
	echo "<span>";
	$cats = explode(",", $p->category);
	foreach($cats as $cat)
		echo $categories[$cat] . "&nbsp; ";
	echo "</span>";
	echo "</div>";
}
?>
<?php echo $footer; ?>