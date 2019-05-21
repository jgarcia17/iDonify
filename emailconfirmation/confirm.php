<?php
	function redirect()
	{
		header("Location: ../register.php");
		exit();
	}
	
	if(!isset($_GET['email']) || !isset($_GET['token']))
	{
		redirect();
	}
	else
	{
		require_once('../dbhandler.php');
		
		$email = $conn->real_escape_string($_GET['email']);
		$token = $conn->real_escape_string($_GET['token']);
		
		$sql = $conn->query("SELECT user_id FROM users WHERE user_email='$email' AND token='$token' AND email_confirmed=0");
		
		if($sql->num_rows > 0)
		{
			$conn->query("UPDATE users SET email_confirmed=1, token='' WHERE user_email='$email'");
			echo 'Your email was verified. You can login';
		}
		else
		{
			redirect();
		}
	}

?>