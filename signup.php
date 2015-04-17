<!DOCTYPE html>
<head>
	<title>New Student Registration</title>
	<link rel="stylesheet" type="text/css" href="studentCourses.css" />
</head>

<body>

	<form method='POST' action='signup.php'>
		<p>User ID: <br /><input type='number' name='id'>
			</p>
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

	$id = isset($_POST['id']) ? $_POST['id'] : 0;
	$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
	$lname = isset($_POST['lname']) ? $_POST['lname'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$major = isset($_POST['major']) ? $_POST['major'] : '';


//	function

	function userInfo($id,$fn,$ln,$pw,$maj) {

		$studentInfo = 'studentInfo.txt';
		$logins = 'logins.txt';
		$str1 = "$id,$fn,$ln,$maj,,,;";
		$str2 = "$id,$pw;";


		$f1 = fopen($studentInfo, 'a+');
		fwrite($f1, $str1);
		fclose($f1);

		$f2 = fopen($logins, 'a+');
		fwrite($f2, $str2);
		fclose($f2);
	}


	# CLICKING SUBMIT BUTTON

	if(isset($_POST['bSubmit'])) {
		userInfo($id, $fname, $lname, $password, $major);
	}


?>

<hr>
<div id="footer">Designed by Ben Williams and Daniel Franks.</div>


</body>
</html>
