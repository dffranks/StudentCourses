<!DOCTYPE html>
<head>
	<title>Login</title>
</head>

<body>

	<form method='POST' action='login.php'>
		<p>ID Number: <br \> <input type='text' name='usrID'>
			</p>
		<p>Password: <br \> <input type='password' name='passWord'>
			</p>
		<p><button type='submit' name='bSubmit'>Submit</button></p>
	</form>
	<a href='signup.php'>New Student Registration</a>

<?php
	
	$usrID = isset($_POST['usrID']) ? $_POST['usrID'] : '';
	$passWord = isset($_POST['passWord']) ? $_POST['passWord'] : '';

	function userInfo() {
		global $usrID;
		global $passWord;

		$fname = 'logins.txt';
		$str = "$usrID, $passWord";

		$f1 = fopen($fname, 'w');
		fwrite($f1, $str);
		fclose($f1);

		$f2 = fopen($fname, 'r');
		while(!feof($f2)) {
			echo fgets($f2) . "<br />";
		}
		fclose($f2);
	}
	
	# CLICKING SUBMIT BUTTON
	if(isset($_POST['bSubmit'])) {

		usrInfoUpdate();

	}

?>



</body>
</html>