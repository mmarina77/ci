<div id="login_form">
	<h2>Login, fool!</h2>
	<?php
		echo form_open('login/validate_credentials');
		
		echo '<label>Email address: </label>'.form_input('email', '');
		echo '<label>Password: </label>'.form_password('password', '');
		echo form_submit('submit', 'Submit');
		echo anchor('login/signup', 'Create account');
	?>

	<?php echo form_close(); ?>
	<?php echo validation_errors(); ?>
</div>
