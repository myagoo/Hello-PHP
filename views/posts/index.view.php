<?php

echo '<h1>Posts index</h1>';
if (!empty($posts)) {
	foreach ($posts as $post) {
		echo '<h3>' . $this->html->anchor('posts/view/' . $post['id'], $post['title']) . '<br/>';
		echo '<small>';
		echo ' par ' . $this->html->anchor('users/view/' . $post['user_id'], $post['user']['username']);
		echo ' dans la catégorie ' . $this->html->anchor('categories/view/' . $post['category_id'], $post['category']['name']);
		echo '</small>';
		echo '</h3>';
	}
} else {
	echo '<h3>';
	echo 'Aucun article';
	echo '<small>';
	echo $this->html->anchor('posts/edit', 'Créer un article');
	echo '</small>';
}
?>

