<form method="POST" class="form-stacked">
	<fieldset>
		<legend>Edit</legend>
		<input type="hidden" name="post[id]" value="<?php echo empty($post['id']) ? '' : $post['id']; ?>">
		<div class="clearfix">
			<label></label>
			<div class="input">

			</div>
		</div>
		<div class="clearfix">
			<label>Title</label>
			<div class="input">
				<input type="text" name="post[title]" value="<?php echo $post['title']; ?>" placeholder="Titre">
			</div>
		</div>
		<div class="clearfix">
			<label>Body</label>
			<div class="input">
				<textarea name="post[body]" placeholder="Corps de l'article"><?php echo $post['body']; ?></textarea>
			</div>
		</div>
		<div class="clearfix">
			<label>Category</label>
			<div class="input">
				<select name="post[category_id]">
					<?php foreach($categories as $category){ ?>
						<option value="<?php echo $category['id']; ?>" <?php echo $category['id'] == $post['category_id'] ? 'selected' : '' ?>><?php echo $category['name']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="actions">
			<input type="submit" value="Save" name="submited" class="btn primary">
			<button class="btn" type="reset">Cancel</button>
		</div>
	<fieldset>
</form>

