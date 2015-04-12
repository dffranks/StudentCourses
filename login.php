<!DOCTYPE html>
<head>
	<title>Login</title>
</head>

<body>

<form method='POST' action='login.php'>
	<p>ID Number: <br \> <input type='number' name='usrID' value="<?PHP print $usrID; ?>">
		</p>
	<p>Password: <br \> <input type='password' name='password'>
		</p>
	<p><button type='submit' name='bSubmit'>Submit</button></p>
</form>

<?php

	if(isset($_POST['bSubmit'])) {
		$usrID = $_POST['usrID'];
		$password = $_POST['password'];

		loginCheck($usrID, $password);
	}

	function loginCheck($id, $pw) {
		$usrInfo = array($id, $pw);

		// foreach($usrInfo as $item) {
		// 	echo $item;
		// }

		$pattern = "/$id,$pw;/";

		$loginFile = 'logins.txt';
		$handle = fopen($loginFile, 'r');
		$content = file_get_contents($loginFile);

		if (preg_match($pattern, $content)) {
			session_start();
			$_SESSION['user'] = $id;
			header("Location: courses.php");
		}else {
			echo "<p>Invalid ID and/or password.</p>";
		}
		fclose($handle);
	}

?>

<p><a href='signup.php'>New Student Registration</a>
	</p>

</body>
</html>