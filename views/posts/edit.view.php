<form method="POST">
<input type="hidden" name="post[id]" value="<?php echo empty($post['id']) ? '' : $post['id']; ?>">
<input type="text" name="post[title]" value="<?php echo $post['title']; ?>" placeholder="Titre">
<textarea name="post[body]" placeholder="Corps de l'article"><?php echo $post['body']; ?></textarea>
<select name="post[category_id]">
	<?php foreach($categories as $category){ ?>
		<option value="<?php echo $category['id']; ?>" <?php echo $category['id'] == $post['category_id'] ? 'selected' : '' ?>><?php echo $category['name']; ?></option>
	<?php } ?>
</select>
<input type="submit" value="Enregistrer" name="submited">
</form>
