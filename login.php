<?php
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');
  error_reporting(E_ALL);
	include('server.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		if(isset($_SESSION['success']) && $_SESSION['success'] == 1){
	?>
			<div class="alarm">
				Your are login in site.
				<a href="logout.php">
					Log Out
				</a>
			</div>
	<?php
		}
		else {
	?>
		<div class="header">
			<h2>Login</h2>
		</div>
			
		<form method="post" action="login.php">
			<?php include('errors.php'); ?>
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" >
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="login_user">Login</button>
			</div>
			<p>
				Not yet a member? <a href="signup.php">Sign up</a>
			</p>
		</form>
	<?php
		}
	?>
</body>
</html>