<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<?php if (!$userinfo && isset($owner)) { ?>
	<title><?php echo $owner; ?> Portfolio</title>
	<?php } else { ?>
	<title>My Portfolio</title>
	<?php } ?>
	<script src="<?php echo $baseurl; ?>files/js/jquery.js"></script>
	<script src="<?php echo $baseurl; ?>files/js/main.js"></script>
	<script src="<?php echo $baseurl; ?>files/js/md5.js"></script>
	<link rel="shortcut icon" href="<?php echo $baseurl; ?>files/css/favicon.ico"/>
	<link rel="bookmark" href="<?php echo $baseurl; ?>files/css/favicon.ico"/>
	
	<link rel="stylesheet" href="<?php echo $baseurl; ?>files/js/froala/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>files/js/froala/css/froala_editor.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>files/js/froala/css/froala_style.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>files/js/froala/css/plugins/code_view.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>files/js/froala/css/plugins/colors.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>files/js/froala/css/plugins/emoticons.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>files/js/froala/css/plugins/image_manager.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>files/js/froala/css/plugins/image.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>files/js/froala/css/plugins/line_breaker.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>files/js/froala/css/plugins/table.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>files/js/froala/css/plugins/char_counter.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>files/js/froala/css/plugins/video.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>files/js/froala/css/plugins/fullscreen.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>files/js/froala/css/plugins/file.css">
	<link rel="stylesheet" href="<?php echo $baseurl; ?>files/js/froala/css/codemirror.min.css">
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/codemirror.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/xml.min.js"></script>

	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/froala_editor.min.js" ></script>

	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/align.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/code_beautifier.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/code_view.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/colors.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/emoticons.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/font_size.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/font_family.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/image.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/file.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/image_manager.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/line_breaker.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/link.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/lists.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/paragraph_format.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/paragraph_style.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/video.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/table.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/url.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/entities.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/char_counter.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/inline_style.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/save.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/fullscreen.min.js"></script>
	<script type="text/javascript" src="<?php echo $baseurl; ?>files/js/froala/js/plugins/quote.min.js"></script>
  	
	<script>
		var baseurl = '<?php echo $baseurl; ?>';
		$(document).ready(function(){
			<?php if (isset($warn) && $warn != "") { ?>
				alert('<?php echo $warn; ?>');
			<?php } ?>
			$(document.body).css('zoom','100%');
		});
		function copyTextToClipboard(text) {
			var copyFrom = $('<textarea/>');
			copyFrom.text(text);
			$('body').append(copyFrom);
			copyFrom.select();
			document.execCommand('copy');
			copyFrom.remove();
		}
	</script>
	<?php if (!isset($editmode) || !$editmode) { ?>
	<style>
	body {
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		-moz-user-select: -moz-none;
	}
	</style>
	<?php } ?>
<style>#freewha{display:none !important;}#chat-icon{display:none;}</style>
	<link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>files/css/style.css">
</head>
<?php if (!isset($editmode) || !$editmode) { ?>
<body unselectable="on" onselectstart="return false;" oncontextmenu="return false;">
<?php } else { ?>
<body>
<?php } ?>
<header>
	<div id="maintitle" style="width:100%">
	<?php if (!$userinfo && isset($owner)) { ?>
	<h1><?php echo $owner; ?> Portfolio</h1>
	<?php } else { ?>
	<h1 style="float:left;">My Portfolio</h1>
		<?php if ($userinfo) { ?>
		<div id="menulist">
			<ul id="menuitems">
			<li><span onclick='window.location="<?php echo $baseurl; ?>p"'<?php echo $mycls=="p" ? " class='curmenu'" : ""; ?>>Home</span></li>
			<li><span onclick='window.location="<?php echo $baseurl; ?>w"'<?php echo $mycls=="w" ? " class='curmenu'" : ""; ?>>Web</span></li>
			<li><span onclick='window.location="<?php echo $baseurl; ?>m"'<?php echo $mycls=="m" ? " class='curmenu'" : ""; ?>>Mobile</span></li>
			<li><span onclick='window.location="<?php echo $baseurl; ?>g"'<?php echo $mycls=="g" ? " class='curmenu'" : ""; ?>>Game</span></li>
			<?php if ($userinfo->user_id == "mario") { ?>
			<li><span onclick='window.location="<?php echo $baseurl; ?>category"'<?php echo $mycls=="Category" ? " class='curmenu'" : ""; ?>>Category</span></li>
			<?php } ?>
			</ul>
		</div>
		<div style="float:right; font-size:12px; padding-top:2px; margin-top:20px;">
		<a href="<?php echo $baseurl; ?>p/add">+Add Post</a>&nbsp;&nbsp;&nbsp;
		User : <a href="<?php echo $baseurl; ?>profile"><span style="color:red"><?php echo $userinfo->username; ?></span></a>&nbsp;
		<a href="<?php echo $baseurl; ?>welcome/logout">Logout</a>&nbsp;&nbsp;&nbsp;
		</div>
		<?php } ?>
		<?php if ($userinfo) { ?>
		<div id="searchdiv" style="float:right; margin-top:20px;">
			<form action="<?php echo $baseurl; ?>p/s" onsubmit="return this.searchstr.value!='';" method="post">
			<input type="hidden" name="act" value="s">
			<input type="text" name="searchstr" value="<?php if (isset($searchstr)) echo $searchstr; ?>" style="width:250px;"><button>Search</button>
			</form>
		</div>
		<?php } ?>
	<?php } ?>
	</div>
</header>
<section>