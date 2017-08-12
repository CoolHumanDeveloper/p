function chkloginfrm()
{
	var frm = document.getElementById('loginfrm');
	if (frm.userid.value == "")
	{
		alert('Insert ID');
		frm.userid.select();
		return false;
	}
	if (frm.userpass.value == "")
	{
		alert('Insert Password');
		frm.userpass.select();
		return false;
	}
	frm.userpwd.value = MD5.hex(frm.userpass.value);
	frm.userpass.value = "";
	return true;
}

$(document).ready(function () {
	$("#menuicondiv").on("click", function(){
		if ($("#menudiv").css('display') == 'none')
			$("#menudiv").show();
		else
			$("#menudiv").hide();
	});
	$(window).resize();
});
window.onresize = function() {
	if (window.innerWidth - 60 < 964)
		$("section").css("width", 964);
	else
		$("section").css("width", window.innerWidth - 60);
	$("section").css("height", window.innerHeight - 120);
	if ($("#newsframe")) $("#newsframe").css("height", window.innerHeight - 150);
};