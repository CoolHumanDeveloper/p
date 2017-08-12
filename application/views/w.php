<?php echo $header; ?>
<?php
$foundcat = false;
$foundrootcat = false;
if ($userinfo)
{
echo "<div class='cat_tree' style='float:left;width:19%;border-right:1px solid #ddd;'>";
foreach($categories as $category)
{
	if ($category->name == "web")
	{
		$foundrootcat = true;
		continue;
	}
	if (!$foundrootcat)
		continue;
	if ($foundrootcat && $category->dep == 0)
		break;
	if ($category->dep > count($cattrunk))
		continue;
	if ($category->dep == count($cattrunk) && !in_array($category->parent, $cattrunk))
		continue;
	echo "<a href='" . $baseurl . "w/index/" . $category->id . "'" . ($cid == $category->id ? " style='color:red;'" : "") . ">";
	for($i = 0; $i < $category->dep; $i++)
		echo "&nbsp;&nbsp;";
	echo $category->name . "</a><br>";
}
echo "</div>";
echo "<div class='maincontent' style='float:left;width:80%;'>";
} else {
echo "<div class='maincontent' style='float:left;width:100%;'>";
}
foreach($portfolios as $p)
{
	echo "<div class='portfoliodiv'>";
	echo "<a href='" . $baseurl . "p/v/" . $p->hashurl . "'><img width='200px' height='150px' src='" . $baseurl . 'files/img/'. $p->previmg . "'></a>";
	if ($userinfo && $userinfo->user_id == "mario")
		echo "<span class='title'><a href='" . $baseurl . "p/edit/" . $p->id . "'>" . $p->subject . "</a></span>";
	else
		echo "<span class='title'>" . $p->subject . "</span>";
	echo "<span>";
	$cats = explode(",", $p->category);
	foreach($cats as $cat)
		echo $catnames[$cat] . "&nbsp; ";
	echo "</span>";
	echo "</div>";
}
?>
</div>
<?php echo $footer; ?>