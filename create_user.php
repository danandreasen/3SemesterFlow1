<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Create User</title>
<link rel="stylesheet" href="reset.css">
<link rel="stylesheet" href="simplegrid.css">
<link rel="stylesheet" href="styles_login.css">

</head>

<body>
<?php
	


if(filter_input(INPUT_POST, 'submit')){
	
	$un = filter_input(INPUT_POST, 'un')or die('missing/illegal Username parameter');
	
	$pw = filter_input(INPUT_POST, 'pw') or die('missing/illegal Password parameter');
	
	$pw = password_hash($pw, PASSWORD_DEFAULT);
	
	// read and check here
	
	//	echo 'Creating user: <br>' .$un. ' : ' .$pw;
	
	
	require_once('db_con.php');
	
	
	$sql = 'INSERT INTO users (username, pwhash) VALUES (?, ?)';
	
	$stmt = $con->prepare($sql);
			$stmt->bind_param('ss', $un, $pw); // kun hvis placeholder (INSERT)
			$stmt->execute();
			
			// for at få data (SELECT) 
			// $stmt->bind_result();
	
			if ($stmt->affected_rows > 0){
				echo 
					'<div class="box_usercreated">
						<h1 class="message_usercreated">Your user: <p class="username">'.$un.'</p> has been created!</h1>
						<br><a href="login.php"><button class="btn_gotologin">Go to login page</button></a>
					</div>';
				
				
				echo '';
			}
			else {
				echo '<h1 class="message_createerror">Whoops! Could not create user - try again.<br>This user might already exist.</h1>';
			}
	
	$stmt->close();
	$con->close();
	
}
	
	
	
?>
<div class="col-1-3 box">
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	
			<legend>Create user</legend>
			<input class="inputfield_create" name="un" type="text" min="1" max="45" placeholder="Username" required autofocus/><br>
			<input class="inputfield_create" name="pw" type="password" min="1" max="255" placeholder="Password" required />
			<input class="btn_create_user" name="submit" type="submit" value="Create user" />
			<p><a href="login.php">Login</a></p>
	
	</form>
</div>



<!--
 <div class="wrapper">
    <form class="form-signin" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">       
      <h2 class="form-signin-heading">Please login</h2>
      <input name="un" type="text" class="form-control" min="1" max="45" placeholder="Username" required autofocus />
      <input name="pw" type="password" class="form-control" min="1" max="255" placeholder="Password" required />
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Login</button>   
    </form>
  </div>
-->


</body>
</html>