<!DOCTYPE html>
<head>
	<title>Login</title>
</head>

<body>

	<form method='POST' action='login.php'>
		<p>ID Number: <br \> <input type='number' name='usrID'>
			</p>
		<p>Password: <br \> <input type='password' name='password'>
			</p>
		<p><button type='submit' name='bSubmit'>Submit</button></p>
	</form>
	<a href='signup.php'>New Student Registration</a>

<?php
	
class Login {
	public $usrID;
	public $password;

	function loginCheck() {
		$usrID = isset($_POST['usrID']) ? $_POST['usrID'] : 0;
		$password = isset($_POST['password']) ? $_POST['password'] : '';

		$file = 'logins.txt';
		$searchFor = "$usrID";
		$idMatch;

		$handle = fopen($file, 'r');

		while(!feof($f1)) {

			$buffer = $fgets($handle);
			if(strpos($buffer, $searchFor) !== FALSE) {
				$idMatch = $buffer;
			}else{
				echo "Not found.";			
			}
			$fclose($file);
		}
		print_r($idMatch);
	}

	function displayTest() {



	}

	// function usrInfoUpdate() {
	// 	global $usrID;
	// 	global $password;

	// 	$fname = 'logins.txt';
	// 	$str = "$usrID,$password";

	// 	$f1 = fopen($fname, 'w');
	// 	fwrite($f1, $str);
	// 	fclose($f1);

	// 	$f2 = fopen($fname, 'r');
	// 	while(!feof($f2)) {
	// 		echo fgets($f2) . "<br />";
	// 	}
	// 	fclose($f2);
	// }
	
	# CLICKING SUBMIT BUTTON
	function submit() {
		if(isset($_POST['bSubmit'])) {

		loginCheck();
		displayTest();

		}
	}
}

?>



</body>
</html>