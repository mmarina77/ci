<style>
/*
input[placeholder], [placeholder], *[placeholder] {
	color: red !important;
}
*/
</style>

	<section>
	<a href="<?php echo base_url()?>home" class="label active">Register</a>
	</section>
	
	<!-- h1><?=$page_title?></h1 -->
	<section>
    <form method="post" action="" id="login_form">
		<h3>Login</h3>
		<input type="text" name="name" value="user" placeholder="User name" />
		<input type="password" name="password" value="user" placeholder="Password" />
        <input type="submit" name="submit" value="Login" class="btn btn-small btn-success dropdown-toggle" />
    </form>
	<div id="uploadMessage" class="text-error"></div>
	</section>
	
    <!-- h2>Files</h2>
    <div id="files"></div -->
