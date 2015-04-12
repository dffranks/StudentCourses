<!DOCTYPE html>
<?php session_start(); ?>
<head>
	<title>Course Listing</title>
</head>
<body>

<?php

if (isset($_SESSION['user'])) {
	echo "Welcome, " . $_SESSION['user'];
}else{
	echo "Please log in.";
}

?>


</body>
</html>