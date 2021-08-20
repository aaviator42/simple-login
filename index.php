<?php
/*
Simple login system in PHP to demonstrate Sesher usage
AGPLv3

@aaviator42
*/


require 'Sesher.php';
session_start();

//BCRYPT password hash generated with password_hash()
//default: password1234
$hashedPassword = '$2y$10$sV9cOUot6w3y3eivMrTmq.O/NteebWDY5tY7rx9wSJoEMXZTxjO8u';


//logout if request made to ?logout=true
if(isset($_GET["logout"]) && $_GET["logout"]){
	\Sesher\stop();
	header('Location: '. $_SERVER['SCRIPT_NAME']);

}

//if form submitted, check if password correct
if(!\Sesher\check()){
	if(isset($_POST["password"])){
		if(password_verify($_POST['password'], $hashedPassword)){
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
		max-width: 50rem;
		padding: 2rem;
		margin: auto;
	}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
	<meta name="robots" content="noindex, nofollow, noarchive">
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

print '<br><br><hr><small>';
	if(\Sesher\check()){
		print '<a href="?logout=true">Logout</a> | ' ;
	}
	print '<a href="https://github.com/aaviator42/simple-login">Help/Source</a></small>';
}

?>

</body>
</html>
