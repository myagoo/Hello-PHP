<!DOCTYPE html>
<html class="no-js" lang="fr">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>/scripts/modernizr.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>/scripts/markitup/jquery.markitup.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/scripts/markitup/skins/simple/style.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/scripts/markitup/sets/default/style.css"/>
		<link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap-1.2.0.min.css"/>
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/style.css"/>
		<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/flick/jquery-ui.css" rel="Stylesheet"/>
		<title><?php echo isset($title_for_layout) ? $title_for_layout : "Blog title" ?></title>
	</head>
	<body>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>/scripts/markitup/sets/default/set.js"></script>
		<script type="text/javascript">
			$(function(){

				$(".markItUp").markItUp(mySettings);
				$("#search").autocomplete({
					source: '<?php echo BASE_URL; ?>/autocomplete.php'
				});
				//Placeholders Fix
				if(!Modernizr.input.placeholder){
					$("input").each(function(){
						if(!$(this).attr("value") && $(this).attr("placeholder")){
							$(this).val($(this).attr("placeholder")).focus(function(){
								if($(this).val()==$(this).attr("placeholder")){
									$(this).val("");
								}
							}).blur(function(){
								if($(this).val()==""){
									$(this).val($(this).attr("placeholder"));
								}
							});
						}
					});
				}
			});
		</script>
		<div class="topbar" style="position:static;">
			<div class="fill">
				<div class="container">
					<h3><a href="<?php echo BASE_URL; ?>">Blog title</a></h3>
					<ul>
						<li><a href="#">Nav...</a></li>
						<li><a href="#">Nav...</a></li>
						<li><a href="#">And nav...</a></li>
					</ul>
					<form>
						<input type="text" id="search" placeholder="Search">
					</form>
					<ul class="nav secondary-nav">
						<li><a href="<?php echo BASE_URL; ?>/users/login">Login</a></li>
						<li><a href="<?php echo BASE_URL; ?>/users/signup">Sign up</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="hero-unit" style="margin-top:20px;">
				<h1>Hello</h1>
				<p>This is a demonstration of the Hello PHP framework</p>
				<p><a href="#" class="btn primary large">More</a></p>
			</div>

