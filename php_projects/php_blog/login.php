<?php
require 'include/init.php';

// $_SESSION['is_logged_in'] = true; // for testing purposes

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$conn = require 'include/db.php';

	if (User::authenticate($conn, $_POST['username'], $_POST['password'])) {
		Auth::login();
		Url::redirect('/');
		// header("location:index.php");
	} else {
		$error = "login incorrect";
	}
}

?>
<?php require 'include/header.php' ?>

	<?php if (!empty($error)): ?>
		<p><?= $error ?></p>
	<?php endif; ?>

	<h2>Login</h2>
	<form action="" method="post">
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="form-control">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control">
		</div>
		<button class="btn">Log In</button>
	</form>

<?php require 'include/footer.php' ?>
