<?php foreach($users as $user){ ?>
	<h1><a href="<?php echo WEBROOT; ?>users/view/<?php echo $user['id']; ?>"><?php echo $user['username']; ?></a></h1>
<?php } ?>
