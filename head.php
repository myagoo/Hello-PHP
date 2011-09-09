<!DOCTYPE html>
<html class="no-js" lang="fr">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo WEBROOT; ?>scripts/modernizr.js"></script>
		<link type="text/css" href="<?php echo WEBROOT; ?>styles/style.css"  rel="stylesheet"/>
		<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/ui-lightness/jquery-ui.css" rel="Stylesheet"/>
		<title>Myagoo</title>
	</head>
	<body>
		<header>
		<a href="<?php echo WEBROOT; ?>">Bienvenue sur mon blog</a>
		<script type="text/javascript">
			$(function(){
				var wr = '<?php echo WEBROOT; ?>';
				$("#search").autocomplete({
					source: '<?php echo WEBROOT; ?>autocomplete.php'
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
		<input type="text" id="search" placeholder="Rechercher">
		</header>

