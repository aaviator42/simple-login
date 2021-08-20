<?php
/*
Sample login system in PHP to demonstrate Sesher usage
AGPLv3

@aaviator42
*/


require 'Sesher.php';
session_start();

$password = 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f';


//logout if request made to ?logout=true
if(isset($_GET["logout"]) && $_GET["logout"]){
	\Sesher\stop();
	header('Location: '. $_SERVER['SCRIPT_NAME']);

}

//if form submitted, check if password correct
if(!\Sesher\check()){
	if(isset($_POST["password"])){
		if(hash('sha256', $_POST['password']) === $password){
			//password is correct!	
			\Sesher\start();
		} else {
			//password is incorrect
			echo "Incorrect password! <hr>";
		}	
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Simple Login Page</title>
	<style>
	body {
		font-family: monospace;
	}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
	<meta name="robots" content="noindex,nofollow">

</head>
<body>
<h2>Simple Login Page</h2>

<?php
if(\Sesher\check()){
	//user logged in
	print 'You are logged in!<br>';
} else{
	//user logged out
	loginFormPrint();
}

footerPrint();


function loginFormPrint(){
	print '	<h3>Login</h3>
	  <form action="#" method="post">
		Password: <input type="password" name="password" required><br>
	  <input type="submit" value="Login!" />
	</form>
	';
}


function footerPrint(){

print '<br><br><hr>';
	if(\Sesher\check()){
		print '<a href="?logout=true">Logout</a> | ' ;
	}
	print '<a href="https://github.com/aaviator42">@aaviator42</a>';
}

?>
</body>
</html>
