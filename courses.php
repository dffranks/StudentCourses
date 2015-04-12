<?php session_start(); ?>
<!DOCTYPE html>
<head>
	<title>Course Listing</title>
	<link rel="stylesheet" type="text/css" href="studentCourses.css" />
</head>
<body>
<div id ="wrapper">

<?php

# If user logged in:
if (isset($_SESSION['user'])) {

	$usrID = $_SESSION['user'];

	studData($usrID);
	$fname;
	$lname;
	$major;

	$studData = studData($usrID);
	if (!isset($studData)) {
		echo "<p>An error has occured while fetching data.</p>";
	} else {
		$fname = $studData['fname'];
		$lname = $studData['lname'];
		$major = $studData['major'];

		print<<<INFO
			<h2>ID #$usrID <br />
			$fname $lname<br />
			Major in $major</h2>
INFO;
	echo "<p><a href='logout.php'>Logout</a></p>";
	}

# If user not logged in:
}else{
	echo "<p>You must be logged in to view this page.</p>";
	echo "<p><a href='login.php'>Return to Login Page</a></p>";
}

/***********************/
/****** FUNCTIONS ******/
/***********************/

function studData($id) {
	$ID = $id;

	# Open the file
	$file = 'studentInfo.txt';
	$handle = fopen($file, 'r');

	# Convert file contents to string
	$content = file_get_contents($file);

	# Convert string to array $dataArr[]
	$dataArr = explode(';', $content);
	foreach ($dataArr as $value) {
		# Convert each value to array $dataItems[]
		$dataItems = explode(',', $value);

		# If first value of $dataItems[] matches
		# current SESSION id, return $dataOut[]
		if ($dataItems[0] === $ID) {
			$dataOut['fname'] = $dataItems[1];
			$dataOut['lname'] = $dataItems[2];
			$dataOut['major'] = $dataItems[3];
			return $dataOut;
		}
	}
	fclose($handle);
}

?>

</div> <!--end wrapper-->

</body>
</html>