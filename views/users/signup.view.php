<form method="POST" class="form-stacked">
	<fieldset>
		<legend>Create your account</legend>
		<div class="clearfix">
			<label>Username</label>
			<div class="input">
				<input type="text" value="<?php echo $user['username'] ?>" name="user[username]" placeholder="Username">
			</div>
		</div>
		<div class="clearfix">
			<label>Password</label>
			<div class="input">
				<input type="password" name="user[password]" placeholder="Password">
			</div>
		</div>
		<div class="clearfix">
			<label>Confirm password</label>
			<div class="input">
				<input type="password" name="user[confirm]" placeholder="Confirm your password">
			</div>
		</div>
		<div class="clearfix">
			<label>Email</label>
			<div class="input">
				<input type="text" value="<?php echo $user['email'] ?>" name="user[email]" placeholder="Email">
			</div>
		</div>
		<div class="actions">
			<input type="submit" value="Sign Up" name="submited" class="btn primary">
			<button class="btn" type="reset">Cancel</button>
		</div>
	<fieldset>
</form>

