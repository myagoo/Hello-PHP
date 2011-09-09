<?php foreach($posts as $post){ ?>
	<h1><a href="<?php echo WEBROOT; ?>posts/view/<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h1>
<?php } ?>
