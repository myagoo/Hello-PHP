<?php

echo '<h1>Index des catégories</h1>';
if(!empty($categories)) {
	foreach ($categories as $category) {
		echo '<h1><a href="' . BASE_URL . DS . 'categories/view/' . $category['id'] . '">' . $category['name'] . '</a></h1>';
	}
} else {
	echo '<h3>';
	echo 'Aucune catégorie';
	echo '</h3>';
}
echo '<small>';
echo ' ' . $this->html->anchor(BASE_URL.'/categories/edit', 'Créer une nouvelle catégorie');
echo '</small>';
?>
