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

	grabStudData($usrID);
	grabCourseData();
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
	$courses = array();
	$file = 'courses.txt';
	$handle = fopen($file, 'r');
	$content = file_get_contents($file);
	$dataArr = explode(';', $content);
	foreach($dataArr as $k1=>$arr1Val) {
		echo "Arr1: $k1 => $arr1Val</br>";
		$dataItems = explode(',', $arr1Val);
		foreach ($dataItems as $k2=>$arr2Val) {
		//	$courses array( array($k1))
		// FUCK


			echo "Arr2: $k2 => $arr2Val</br>";
		}
		
	//	$dataOut[]
	}
}

?>

<table align="center">
	<tr>
		<th>✓</th>
		<th>ID</th>
		<th>Name</th>
		<th>Max Students</th>
		<th>Currently Enrolled</th>
	</tr>
	<tr>
		<td><input type="checkbox" name="hist101"></td>
		<td>HIST101</td>
		<td>World History I</td>
		<td>30</td>
		<td>22</td>
	</tr>
	<tr>
		<th><input type="checkbox" name="math304"></th>
		<td>MATH304</td>
		<td>Advanced Calculus</td>
		<td>20</td>
		<td>17</td>
	</tr>
</table>

</div> <!--end wrapper-->

</body>
</html>