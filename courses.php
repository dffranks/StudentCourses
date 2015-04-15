<?php session_start(); ?>
<!DOCTYPE html>
<head>
	<title>Course Listing</title>
	<link rel="stylesheet" type="text/css" href="studentCourses.css" />
</head>
<body>

<?php

# If user logged in:
if (isset($_SESSION['user'])) {

	$usrID = $_SESSION['user'];

	grabStudData($usrID);
	$fname;
	$lname;
	$major;

	$grabStudData = grabStudData($usrID);
	if (!isset($grabStudData)) {
		echo "<p>An error has occured while fetching data.</p>";
	} else {
		$fname = $grabStudData['fname'];
		$lname = $grabStudData['lname'];
		$major = $grabStudData['major'];

		print<<<HEADER
			<h2>ID #$usrID <br />
			$fname $lname<br />
			Major in $major</h2>
			<p><a href='logout.php'>Logout</a></p>

			<div id ='wrapper'>
			<h1><u>Available Courses:</u></h1>
HEADER;

		grabCourseData();	

		print<<<FOOTER
			<form method='POST' action='courses.php'>
				<p><button type='submit' name='bSubmit'>Add These Courses</button></p>
			</form>
FOOTER;
	}

# If user NOT logged in:
}else{
	echo "<p>You must be logged in to view this page.</p>";
	echo "<p><a href='login.php'>Return to Login Page</a></p>";
}

/***********************/
/****** FUNCTIONS ******/
/***********************/

function grabStudData($id) {
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

function grabCourseData() {
	$file = 'courses.txt';
	$handle = fopen($file, 'r');
	$content = file_get_contents($file);
	$dataArr = explode(';', $content);
	print<<<TABLEHEAD
		<table align='center'>
		<tr>
			<th>✓</th>
			<th>ID</th>
			<th>Name</th>
			<th>Max Students</th>
			<th>Currently Enrolled</th>
		</tr>
TABLEHEAD;
	
	foreach($dataArr as $k1=>$arr1Val) {
		$dataItems = explode(',', $arr1Val);
		if($dataItems[0] === '#') { break; }
		print<<<TABLE
			<tr>
				<td><input type="checkbox" name="$dataItems[0]"></td>
				<td>$dataItems[0]</td>
				<td>$dataItems[1]</td>
				<td>$dataItems[2]</td>
				<td>$dataItems[3]</td>
			</tr>
TABLE;

	}
	echo "</table>";
}

?>

</div> <!--end wrapper-->

</body>
</html>