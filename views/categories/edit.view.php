<form method="POST" class="form-stacked">
<fieldset>
<legend>Edit this category</legend>
<input type="hidden" name="category[id]" value="<?php echo empty($category['id']) ? '' : $category['id']; ?>">
<div class="clearfix">
	<label>Name</label>
	<div class="input">
		<input type="text" name="category[name]" value="<?php echo $category['name']; ?>" placeholder="Nom">
	</div>
</div>
<div class="actions">
	<input type="submit" value="Save" name="submited" class="btn primary">
	<button class="btn" type="reset">Cancel</button>
</div>
</fieldset>
</form>

