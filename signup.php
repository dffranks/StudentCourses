<!DOCTYPE html>
<head>
	<title>New Student Registration</title>
</head>

<body>

	<form method='POST' action='signup.php'>
		<p>First Name: <br \> <input type='text' name='fname'>
			</p>
		<p>Last Name: <br \> <input type='text' name='lname'>
			</p>
		<p>Choose a Password: <br \> <input type='password' name='password'>
			</p>
		<p>Major: <br \> <input type='text' name='major'>
			</p>
		<p><button type='submit' name='bSubmit'>Submit</button>
	</form></p>

	<a href='login.php'>Go Back</a>

<?php
	
	$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
	$lname = isset($_POST['lname']) ? $_POST['lname'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$major = isset($_POST['major']) ? $_POST['major'] : '';

//	function

	function userInfo() {

		$filename = 'studentInfo.txt';
		$str = "$fname, $lname, $password, $major";

		$f1 = fopen($filename, 'w');
		fwrite($f1, $str);
		fclose($f1);

		$f2 = fopen($filename, 'r');
		while(!feof($f2)) {
			echo fgets($f2) . "<br />";
		}
		fclose($f2);
	}

	function inputTest($fn, $ln, $pw, $maj) {
		echo "<br \><br \>$fn<br \>$ln<br \>$pw<br \>$maj";
	}
	
	# CLICKING SUBMIT BUTTON

	if(isset($_POST['bSubmit'])) {
//		usrInfoUpdate();
		inputTest($fname, $lname, $password, $major);

	}


?>



</body>
</html>