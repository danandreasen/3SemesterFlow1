<?php session_start(); ?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Content</title>
<link rel="stylesheet" href="reset.css">
<link rel="stylesheet" href="simplegrid.css">
<link rel="stylesheet" href="styles_login.css">
</head>

<body>


	<?php
	
		if(empty($_SESSION['uid'])){
			echo '<h1 class="message_needto_login">You need to <a href="login.php">login</a> to access this page</h1>';
		}
		else{
			echo '<div class="box1_contentpage">';
			echo '<a href="logout.php">Logout</a>';
			echo '<h1 class="message_contentpage">';
			echo 'Welcome to the dark side '.$_SESSION['username'];
			echo '</h1>';
			echo '</div>';
			
			echo '<div class="box2_contentpage">';
			echo '<p>
   Having taken her first steps into a larger world in Star Wars: The Force Awakens (2015), Rey continues her epic journey with Finn, Poe and Luke Skywalker in the next chapter of the saga. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus
    </p>';
			echo '</div>';
		}
	?>


</body>
</html>
