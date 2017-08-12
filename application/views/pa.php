<?php echo $header; ?>
	<script>
	function chkpost()
	{
		var frm = document.getElementById('postfrm');
		if (frm.subject.value == "")
		{
			alert("Insert subject");
			frm.subject.select();
			return false;
		}
		if (frm.previmg.value == "")
		{
			alert("Insert previmg");
			frm.previmg.select();
			return false;
		}
		if (frm.cpublic.value == "")
		{
			alert("Insert cpublic");
			frm.cpublic.select();
			return false;
		}
		return true;
	}
	</script>
	<form id="postfrm" action="<?php echo $baseurl; ?>p/set" method="POST" enctype="multipart/form-data" onsubmit="return chkpost()">
	<input type="hidden" name="act" value="new">
	<input type="hidden" name="pid" value="0">
	<table align="center" width=90% border=0 class="listtable">
	<tr>
	<th width=50px>Title</th><td><input type="text" name="subject" value="" style="width:800px"></td>
	</tr>
	<tr>
	<th>Preview Image</th>
	<td>
	<input type=file name="previmg">
	</td>
	</tr>
	<tr>
	<th>Category</th>
	<td>
	<select name="category[]" multiple>
	<?php
	foreach($sorted_cats as $c)
	{
		$space = "";
		for($j = 0; $j < $c->dep; $j++)
			$space .= "&nbsp;&nbsp;";
		echo "<option value='" . $c->id . "'>$space" . $c->name . "</option>";
	}
	?>
	</select>
	</td>
	</tr>
	<tr>
	<th valign=top>Public Content</th>
	<td style="background-color:#fff;">
		<!--<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/nicEdit.js"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
		</script>-->
		<script> $(function(){ $('#Form_Body').froalaEditor({imageUploadURL: '<?php echo $baseurl; ?>Welcome/fileupload', fileUploadURL: '<?php echo $baseurl; ?>Welcome/fileupload'}).on('froalaEditor.image.uploaded', function (e, editor, response) {}).on('froalaEditor.file.uploaded', function (e, editor, response) {})});</script>
		<textarea id='Form_Body' name="cpublic" rows="10" style="width:100%"></textarea>
	</td>
	</tr>
	<tr>
	<th valign=top>Private Content</th>
	<td style="background-color:#fff;">
		<textarea name="cprivate" rows="10" style="width:99%;resize:none;"></textarea>
	</td>
	</tr>
	<tr>
	<td colspan=2 align=center><button>Save</button><button type="button" onclick="if (confirm('Are you sure?')) history.back();">Cancel</button></td>
	</tr>
	</table>
	</form>
<?php echo $footer; ?>