<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link rel="stylesheet" href="reset.css">
<link rel="stylesheet" href="simplegrid.css">
<link rel="stylesheet" href="styles_login.css">
</head>

<body>
<?php
	
	if(filter_input(INPUT_POST, 'submit')){
	
	$un = filter_input(INPUT_POST, 'un')or die('missing/illegal Username parameter');
	
	$pw = filter_input(INPUT_POST, 'pw') or die('missing/illegal Password parameter');
	
	require_once('db_con.php');
	$sql = 'SELECT id, pwhash FROM users WHERE username=?';
	$stmt = $con->prepare($sql);
	$stmt->bind_param('s', $un);
	$stmt->execute();
		
		
		
	$stmt->bind_result($uid, $pwhash);
	
	while($stmt->fetch()) {}
		
	if (password_verify($pw, $pwhash)){
		
		echo '<div class="message_login">
		You are now logged in as<p class="bold"> 
		'.$un.'</p><a href="contentpage.php"><button class="btn_continue">Continue here</button></a><br><p>or</p>
		<a class="link_logout" href="logout.php">Logout</a>
		
		</div>';
		
		$_SESSION['uid'] = $uid;
		$_SESSION['username'] = $un;
	}
	else {
		echo '<div class="message_loginerror">
			Whoops! Wrong username or password.
			</div>';
	}
}
		
?>

<!--
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset>
    	<legend>Login</legend>
    	<input name="un" type="text" min="1" max="100" placeholder="Username" required /><br>
    	<input name="pw" type="password" placeholder="Password" required />
    	<input name="submit" type="submit" value="login" />
	</fieldset>
</form>
-->


<div class="col-1-3 box">
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		
			<legend>Login</legend>
			<input class="inputfield_login" name="un" type="text" min="1" max="45" placeholder="Username" required autofocus/><br>
			<input class="inputfield_login" name="pw" type="password" min="1" max="255" placeholder="Password" required />
			<input class="btn_login" name="submit" type="submit" value="Login" />
			<p><a href="create_user.php">Create a user</a></p>
		
	</form>
</div>






</body>
</html>