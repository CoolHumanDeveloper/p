<?php echo $header; ?>
<div style="width:300px;padding:50px;margin:0px auto;">
	<?php if (!$userinfo) { ?>
	<form id="loginfrm" action="<?php echo $baseurl; ?>welcome/login" onsubmit="return chkloginfrm();" method="post">
		<input type="hidden" name="token" value="<?php echo $token; ?>">
		<input type="hidden" name="userpwd" value="" style="width:100px">
		<table>
		<tr><td>
		User ID
		</td><td>
		<input type="text" name="userid" value="" style="width:100px">
		</td></tr><tr><td>
		Password
		</td><td>
		<input type="password" name="userpass" value="" style="width:100px">
		</td></tr><tr><td colspan=2 align=center>
		<button type="submit">Login</button>
		</td></tr>
		</table>
	</form>
	<?php } ?>
</div>
<?php echo $footer; ?>