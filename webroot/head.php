<!DOCTYPE html>
<html class="no-js" lang="fr">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL.DS; ?>scripts/modernizr.js"></script>
		<link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap-1.2.0.min.css">
		<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/flick/jquery-ui.css" rel="Stylesheet"/>
		<title>Myagoo</title>
	</head>
	<body>
		<script type="text/javascript">
			$(function(){
				var wr = '<?php echo WEBROOT.DS; ?>';
				$("#search").autocomplete({
					source: '<?php echo BASE_URL.DS; ?>autocomplete.php'
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
		<div class="container">
			<div class="topbar">
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
							<li><a href="#">Login</a></li>
							<li><a href="#">Sign up</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="hero-unit">
				<h1>Hello</h1>
				<p>This is a demonstration of the Hello PHP framework</p>
				<p><a href="#" class="btn primary large">More</a></p>
			</div>
