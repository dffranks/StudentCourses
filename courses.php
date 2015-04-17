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

		pageBuild();
		courseSelect();

	}

	# If user NOT logged in:
	else{
		echo "<p>You must be logged in to view this page.</p>";
		echo "<p><a href='login.php'>Return to Login Page</a></p>";
	}

	/***************************************************/
	/******************** FUNCTIONS ***************************/
	/*****************************************************************/ 

	function pageBuild() {
		$usrID = $_SESSION['user'];

		$grabStudData = grabStudData($usrID);
		if (!isset($grabStudData)) {
			echo "<p>An error has occured while fetching data.</p>";
		} else {
			$fname = $grabStudData['fn'];
			$lname = $grabStudData['ln'];
			$major = $grabStudData['maj'];
			$course1 = $grabStudData['c1'];
			$course2 = $grabStudData['c2'];
			$course3 = $grabStudData['c3'];

			print<<<HEADER
				<h2>ID #$usrID <br />
				$fname $lname<br />
				Major in $major</h2>
				<p><a href='logout.php'>Logout</a></p>

				<div id ='wrapper'>
				<h1><u>Available Courses:</u></h1>
HEADER;
		}
	}

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
				$dataOut['id'] = $dataItems[0];
				$dataOut['fn'] = $dataItems[1];
				$dataOut['ln'] = $dataItems[2];
				$dataOut['maj'] = $dataItems[3];
				$dataOut['c1'] = $dataItems[4];
				$dataOut['c2'] = $dataItems[5];
				$dataOut['c3'] = $dataItems[6];
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

		$courseNum = 0;
		$courseOut = array();

		foreach($dataArr as $k1=>$val) {
			$dataItems = explode(',', $val);

			if($dataItems[0] === '#') { break; }

			$courseOut[$courseNum] = array();
			$courseOut[$courseNum]['id'] = $dataItems[0];
			$courseOut[$courseNum]['name'] = $dataItems[1];
			$courseOut[$courseNum]['stuMax'] = $dataItems[2];
			$courseOut[$courseNum]['stuEnrl'] = $dataItems[3];

			$courseNum++;
		}
		return $courseOut;

	}

	function courseSelect() {
		$courseList = grabCourseData();

		print<<<HEAD
			<table align='center'>
			<tr>
				<th>✓</th>
				<th>ID</th>
				<th>Name</th>
				<th>Max Students</th>
				<th>Currently Enrolled</th>
			</tr>
HEAD;

		#Start of form
		echo "<form method='POST' action='courses.php'>";
		foreach($courseList as $v) {
			print<<<ROW
				<tr>
					<td><input type="checkbox" name='id[]' value="$v[id]"></td>
					<td>$v[id]</td>
					<td>$v[name]</td>
					<td>$v[stuMax]</td>
					<td>$v[stuEnrl]</td>
				</tr>
ROW;
		}
		print<<<FOOT
			</table>
				<p><button type='submit' name='bSubmit'>Add These Courses</button></p>
			</form>
FOOT;
		if(isset($_POST['bSubmit'])) {
			$selectOut = $_POST['id'];

			writeStudData($selectOut);
		}
		
	}

function writeStudData($selectIn) {
	$id = $_SESSION['user'];
	$stu = grabStudData($id);

	if(!isset($selectIn[3])) {
		echo "$selectIn[0], $selectIn[1], and $selectIn[2] have been<br />added to your schedule.<br /><br />";
		$stu['c1'] = $selectIn[0];
		$stu['c2'] = $selectIn[1];
		$stu['c3'] = $selectIn[2];
		$str = "$stu[id],$stu[fn],$stu[ln],$stu[maj],$stu[c1],$stu[c2],$stu[c3];";
		echo $str;

// 		$content = file_get_contents('studentInfo.txt');
// 		$handle = fopen('studentInfo.txt', 'a');
// 		$start = strpos($content, $id);
// 		$fseek($handle, $start);
// 		echo $start;
// 		fclose($handle);
	}else{
		echo "You may only choose a maximum of three courses.";
	}
}

?>

</div> <!--end wrapper-->

</body>
</html>