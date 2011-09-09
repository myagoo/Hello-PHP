<form method="POST">
<input type="hidden" name="category[id]" value="<?php echo empty($category['id']) ? '' : $category['id']; ?>">
<input type="text" name="category[name]" value="<?php echo $category['name']; ?>" placeholder="Nom">
<input type="submit" value="Enregistrer" name="submited">
</form>

