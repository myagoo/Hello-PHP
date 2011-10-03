<h1>Posts index</h1>
<?php foreach($posts as $post){ ?>
	<h3><?php echo $this->html->anchor('posts/view/'.$post['id'], $post['title']) ?><br/>
	<small> par <?php echo $this->html->anchor('users/view/'.$post['user_id'], $post['user']['username']) ?> dans la catégorie <?php echo $this->html->anchor('categories/view/'.$post['category_id'], $post['category']['name']) ?></small></h3>
<?php } ?>

