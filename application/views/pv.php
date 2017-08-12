<?php echo $header; ?>
<h1><?php echo $p->subject; ?></h1>
<div><?php $cats = explode(",", $p->category); foreach($cats as $cat) echo $categories[$cat] . "&nbsp;"; ?></div>
<div><?php echo $p->cpublic; ?></div>
<?php if ($userinfo) { ?><div><?php echo str_replace("\n", "<br>", $p->cprivate); ?></div><?php } ?>
<?php echo $footer; ?>