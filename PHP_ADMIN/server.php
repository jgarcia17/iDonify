<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('garciacomputercom.ipagemysql.com', 'idonifyadmin', 'Zxv12j45Mst', 'db_idonify');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$password=MD5($password_1);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
	 $sql="SELECT * FROM admin WHERE email='$email'";
 $view=$db->query($sql);
 
 if($view-> num_rows>0){
    array_push($errors,"This email  is already used. Please try to another.");
 }
 
		else {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO admin 
					  VALUES(NULL,'$username', '$email','$password_1', '$password','0')";
			mysqli_query($db, $query);

			$_SESSION['username_admin'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username =  $_POST['username'];
		$password = $_POST['password'];

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		
			$password = md5($password);

			$query = "SELECT * FROM admin WHERE admin_name='$username' AND password='$password'";

			$results = $db->query($query);
			

			if ($results-> num_rows>0) {
				$_SESSION['username_admin'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	

?>