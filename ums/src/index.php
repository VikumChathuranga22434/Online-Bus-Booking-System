<?php session_start(); ?>
<?php require_once('../inc/connectionbus.php'); ?>
<?php require_once('../inc/connection.php'); ?>
<?php require_once('../inc/function.php'); ?>

<?php
	// Check for form submission
	if (isset($_POST['submit'])) {
		$error = array();

		// Check if the username and password have been entered
		if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
			$error[] = 'Username is missing / invalid';
		}

		if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
			$error[] = 'Password is missing / invalid';
		}

		// Check if there are any errors in the form
		if (empty($error)) {
			// Save username and password into variables
			$email = mysqli_real_escape_string($connect, $_POST['email']);
			$password = mysqli_real_escape_string($connect, $_POST['password']);
			$encrypted_pass = sha1($password);

			// Prepare database query for users
			$user_query = "SELECT * FROM user WHERE email = '{$email}' AND password = '{$encrypted_pass}' LIMIT 1";
			$user_result = mysqli_query($connect, $user_query);

			// Prepare database query for admins
			$admin_query = "SELECT * FROM adminuser WHERE email = '{$email}' AND password = '{$encrypted_pass}' LIMIT 1";
			$admin_result = mysqli_query($connect, $admin_query);

			if ($user_result) {
				if (mysqli_num_rows($user_result) == 1) {
					// Valid user found
					// Redirect to user.php
					$user = mysqli_fetch_assoc($user_result);
					$_SESSION['user_id'] = $user['id'];
	 				$_SESSION['first_name'] = $user['first_name'];
					header('Location: user.php');
				}elseif ($admin_result && mysqli_num_rows($admin_result) == 1) {
			 		//Valid admin found
			 		//Redirect to admin.php
			 		$user = mysqli_fetch_assoc($admin_result);
			 		$_SESSION['user_id'] = $user['id'];
	 				$_SESSION['first_name'] = $user['first_name'];
	 				echo "<script>alert('Login successful!');</script>";
			 		header('Location: admin.php'); 
			 	} 
				else {
					// Username and password invalid
					$error[] = 'Invalid username/password';
				}
			}else {
				$error[] = 'Database query failed';
			}
		}
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/stylelogin.css">
		<title>login In - User Management System</title>
		<script>
	        function validateForm() {
	            var email = document.forms["loginForm"]["email"].value;
	            var password = document.forms["loginForm"]["password"].value;

	            if (email.trim() === "" || password.trim() === "") {
	                alert("Username and password are required");
	                return false;
	            }

		    }
    	</script>
	</head>
	<body>
		<div class="login"><!--center-->
	        <form action="index.php" method="post" class="user-login">
	            <fieldset>
	                <legend><h1>Log In</h1></legend>
	                <?php 
	                	if (isset($error) && !empty($error)){
	                		echo '<p class="error">Invalid username or password</p>';
	                	} 
	                ?>

	                <div class="txt_field"><p>
	                    <label for="">Username : </label>
	                    <input type="text" name="email" placeholder="Email Address">
	                </p></div>

	                <div class="txt_field"><p>
	                    <label for="">Password : </label>
	                    <input type="password" name="password" placeholder="Password">
	                </p></div>

	                <div class="pass">Forget Password?</div>

	                <div class="txt_field1"><p>
	                    <button type="submit" name="submit"><span></span>Log In</button>
	                </p></div>

	               <div class="sign_up">
	               		Not a User? <a href="reg.php">Sign Up</a>	
	               </div>

	            </fieldset>
	        </form>
	    </div>
	</body>
</html>

<?php mysqli_close($connection); ?>
<?php mysqli_close($connect); ?>