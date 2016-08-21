<?php  
	session_start();
	if (isset($_SESSION['user'])) {
		# code...
		header("Location: /css/login/home");
	}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="site.css">

</head>
<body>
	<script src="main.js"></script>
	<div class="login-page">
	  <div class="form">
	    <form class="register-form">
	      <input type="text" placeholder="name"/>
	      <input type="password" placeholder="password"/>
	      <input type="text" placeholder="email address"/>
	      <button>create</button>
	      <p class="message">Already registered? <a href="#">Sign In</a></p>
	    </form>
	    <form class="login-form" method="post">
	    <?php  
			$con = mysqli_connect("localhost","root","","login");
			if (isset($_POST['login'])) {
				# code...
				$user_name = $_POST['user_name'];
				$user_password = sha1($_POST['user_password']);

				$query = mysqli_query($con, "SELECT * FROM users WHERE user_name='$user_name'");
				while ($row = mysqli_fetch_assoc($query)) {
					# code...
					$user_email = $row['user_email'];
					$user_id = $row['user_id'];
					$user_password_db = $row['user_password'];

					if ($user_password == $user_password_db) {
						# code...
						
						$_SESSION['user'] = $user_name;
						header("Location: /css/login/home");
					}else{
						echo "<span class='error'>Your password is incorrect.</span><p>";
					}
				}
			}
			?>
	      <input type="text" name="user_name" placeholder="Username" required />
	      <input type="password" name="user_password" placeholder="Password" required />
	      
	      <button name="login">login</button>
	      <p class="message">Not registered? <a href="#">Create an account</a></p>
	    </form>
	  </div>
</div>
	
</body>
</html>