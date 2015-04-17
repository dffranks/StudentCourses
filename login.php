<?php session_start();
ob_start();?>
<!DOCTYPE html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="studentCourses.css" />
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

		$pattern = "/$id,$pw;/";

		$loginFile = 'logins.txt';
		$handle = fopen($loginFile, 'r');
		$content = file_get_contents($loginFile);

		if (preg_match($pattern, $content)) {
			logEntry($id);
 			$_SESSION['user'] = $id;
			header("Location: courses.php");
			ob_end_flush();
		}else {
			echo "<p>Invalid ID and/or password.</p>";
		}
		fclose($handle);


	}

	function logEntry($logID){
		date_default_timezone_set('America/New_York');
		$handle = fopen('logs.txt', 'a');
		$stamp = "\n$logID\t\t" . date('M d Y') . "\t\t" . date('H:i:s');
		fwrite($handle, $stamp);
		fclose($handle);
	}

?>

<p><a href='signup.php'>New Student Registration</a>
	</p>

<hr>
<div id="footer">Designed by Ben Williams and Daniel Franks.</div>

</body>
</html>
