<?php session_start(); ?>
<!DOCTYPE html>
<head>
	<title>Course Listing</title>
	<link rel="stylesheet" type="text/css" href="studentCourses.css" />
</head>
<body>
<div id ="wrapper">

<?php

if (isset($_SESSION['user'])) {
	$usrID = $_SESSION['user'];
	studData($usrID);

	$studData = studData($usrID);
	$fname = $studData['fname'];
	$lname = $studData['lname'];
	$major = $studData['major'];

	print<<<INFO
		<h2>ID #$usrID <br />
		$fname $lname<br />
		Major in $major</h2>
INFO;


}else{
	echo "Please log in.";

}

function studData($id) {
	$ID = $id;

	# Open the file. #
	$file = 'studentInfo.txt';
	$handle = fopen($file, 'r');

	# Convert file contents to string. #
	$content = file_get_contents($file);

	$dataString = explode(';', $content);
	foreach ($dataString as $arr1Val) {
		$dataItem = explode(',', $arr1Val);

		if ($dataItem[0] === $ID) {
			$dataOut['fname'] = $dataItem[1];
			$dataOut['lname'] = $dataItem[2];
			$dataOut['major'] = $dataItem[3];

			return $dataOut;
		}
	}
}


?>

<p><a href='login.php'>Back to Login Page</a></p>

</div> <!--end wrapper-->

</body>
</html>