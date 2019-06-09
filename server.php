<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'db_idonify');

	




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
	
 
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO user 
					  VALUES(NULL,'$username', '$email','$password_1', '$password','0')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
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

		
			//$password = md5($password);
			//$password = password_hash($pwd1, PASSWORD_BCRYPT);

			$query = "SELECT * FROM user WHERE username='$username' AND psw='$password'";


			$results = $db->query($query);
		

			if ($results->num_rows > 0) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				//header('location: index.php');
				header('location: user/user.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}





	//Device Request Form

		// REGISTER USER
	if (isset($_POST['device_request'])) {
		// receive all input values from the form
		$d_fname = mysqli_real_escape_string($db, $_POST['d_fname']);
		$d_lname = mysqli_real_escape_string($db, $_POST['d_lname']);
		$d_email = mysqli_real_escape_string($db, $_POST['d_email']);
		$d_occupation = mysqli_real_escape_string($db, $_POST['d_occupation']);
		$d_additionalDetails = mysqli_real_escape_string($db, $_POST['d_additionalDetails']);
		$d_phone = mysqli_real_escape_string($db, $_POST['d_phone']);
		$d_aIncome = mysqli_real_escape_string($db, $_POST['d_aIncome']);
		//$password=MD5($password_1);

		// form validation: ensure that the form is correctly filled
		// if (empty($username)) { array_push($errors, "Username is required"); }
		// if (empty($email)) { array_push($errors, "Email is required"); }
		// if (empty($password_1)) { array_push($errors, "Password is required"); }

		// if ($password_1 != $password_2) {
		// 	array_push($errors, "The two passwords do not match");
		// }

		// register user if there are no errors in the form

		// Submit data to records
		if (count($errors) == 0) {
			$query = "INSERT INTO device_request_submission (f_name, l_name, email, occupation,phone, annualIncome, additionalDetails)
					  VALUES('$d_fname', '$d_lname','$d_email', '$d_occupation','$d_additionalDetails','$d_phone','$d_aIncome')";

			mysqli_query($db, $query);
   
			$to_email = $d_email;
			$subject = 'Website Support';
			$message = 'Thanks for submitting the form.We will get back to you as soon as we can.';
			$headers = 'From: noreply@company.com';
			if(mail($to_email,$subject,$message,$headers)){
			header('location: thankyou.php'); } else {echo "Failed Sending email.";}
		}

	}
	//Volunteer Form		

	if (isset($_POST['volunteer_request'])) {
		// receive all input values from the form
		$v_fname = mysqli_real_escape_string($db, $_POST['v_fname']);
		$v_lname = mysqli_real_escape_string($db, $_POST['v_lname']);
		$v_email = mysqli_real_escape_string($db, $_POST['v_email']);
		$v_phoneNumber = mysqli_real_escape_string($db, $_POST['v_phoneNumber']);

		if (isset($_POST['v_phone'])) {
			$v_phone = "Yes";
		} else {
			$v_phone = "No";
		}

		if (isset($_POST['v_repair'])) {
			$v_repair = "Yes";
		} else {
			$v_repair = "No";
		}

		if (isset($_POST['v_enter'])) {
			$v_enter = "Yes";
		} else {
			$v_enter = "No";
		}

		// Submit data to records
		if (count($errors) == 0) {
			$query = "INSERT INTO volunteer_form (f_name, l_name, email, phone,q_phone, q_repair_devices, q_entering_data)
					  VALUES('$v_fname', '$v_lname','$v_email', '$v_phoneNumber','$v_phone','$v_repair','$v_enter')";


			mysqli_query($db, $query);
			$to_email = $v_email;
			$subject = 'Website Support';
			$message = 'Thanks for submitting the form.We will get back to you as soon as we can.';
			$headers = 'From: noreply@company.com';
			if(mail($to_email,$subject,$message,$headers)){
			header('location: thankyou.php'); } else {echo "Failed Sending email.";}
		}

	}

?>