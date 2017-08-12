<?php echo $header; ?>
	<div class="title"><h1>Category</h1></div>
	<form action="<?php echo $baseurl; ?>category/set" method="POST">
	<input type="hidden" name="act" value="<?php echo $cur_id == 0 ? 'new' : 'edit'; ?>">
	<input type="hidden" name="cur_id" value="<?php echo $cur_id; ?>">
	<table align="center" width=90% border=0 class="listtable">
	<tr>
	<th>No</th>
	<th>Category Name</th>
	</tr>
	<tr>
	<td align="center">+</td>
	<td><input type="text" name="name" value="<?php echo $cur_id == 0 ? '' : $catinfo->name; ?>">
	<select name="parent">
	<option value="0">Top</option>
	<?php
	foreach($sorted_cats as $c)
	{
		$space = "";
		for($j = 0; $j < $c->dep; $j++)
			$space .= "&nbsp;&nbsp;";
		if (!isset($catinfo) || $catinfo->parent != $c->id)
			echo "<option value='" . $c->id . "'>$space" . $c->name . "</option>";
		else
			echo "<option value='" . $c->id . "' selected>" . $c->name . "</option>";
	}
	?>
	</select>
	<button><?php echo $cur_id == 0 ? 'Add' : 'Save'; ?></button></td>
	</tr>
	<?php
	$i = 1;
	foreach($sorted_cats as $c)
	{
		$space = "";
		for($j = 0; $j < $c->dep; $j++)
			$space .= "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<tr>";
		echo "<td align='center'>" . $i++ . "</td>";
		echo "<td><a href='" . $baseurl . "category/index/" . $c->id . "'>$space" . $c->name . "</a></td>";
		echo "</tr>";
	}
	?>
	</table>
	</form>
<?php echo $footer; ?>