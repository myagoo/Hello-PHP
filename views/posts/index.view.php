<h1>Posts index</h1>
<?php foreach($posts as $post){ ?>
	<h3><a href="<?php echo BASE_URL.DS; ?>posts/view/<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a><small> by <a href="<?php echo BASE_URL.DS.'categories/view/'.$post['user']['id'] ?>"><?php echo $post['user']['username']; ?></a> in the category <a href="<?php echo BASE_URL.DS.'categories/view/'.$post['category']['id'] ?>"><?php echo $post['category']['name']; ?></a></small></h3>
<?php } ?>

