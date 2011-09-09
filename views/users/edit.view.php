<form method="POST">
<input type="hidden" name="user[id]" value="<?php echo empty($user['id']) ? '' : $user['id']; ?>">
<input type="text" name="user[username]" value="<?php echo $user['username']; ?>" placeholder="Pseudo">
<input type="text" name="user[password]" value="<?php echo $user['password']; ?>" placeholder="Mot de passe">
<input type="text" name="user[email]" value="<?php echo $user['email']; ?>" placeholder="Adresse email">
<select name="user[group_id]">
	<?php foreach($groups as $group){ ?>
		<option value="<?php echo $group['id']; ?>" <?php echo $group['id'] == $user['group_id'] ? 'selected' : '' ?>><?php echo $group['name']; ?></option>
	<?php } ?>
</select>
<input type="submit" value="Enregistrer" name="submited">
</form>

