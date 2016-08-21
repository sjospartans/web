<?php  
	session_start();
	if (!isset($_SESSION['user'])) {
		# code...
		header("Location: http://localhost/css/login");
	}
	$user_name = $_SESSION['user'];




?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome <?php echo $user_name; ?>!</title>
	<link rel="stylesheet" type="text/css" href="../site.css">
</head>
<body>

	<a href="http://localhost/css/login/logout.php">Logout</a>

</body>
</html>