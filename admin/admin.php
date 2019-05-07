<?php
	//require "../header.php";
	
	session_start();
	
	if(isset($_SESSION['email']))
	{
		//get user data from database using email
		// let user access logged in only pages
		//header('location: user.php');
		
		echo("{$_SESSION['email']}");
		//echo("{$_SESSION['id']}");
		
	}
	else
	{
		//Redirect to login pages
		header("Location: ../login.php");
	}
?>
	<li><a href="add_admin.php">Add user/admin</a></li>
	<li><a href="../logout.php">Logout</a></li>
	
	<main>
		<div class=""> <!-- class="wrapper-main"-->
			<p> Admin content after log in</p>
		</div>
	</main>
	
<?php
	//require "../footer.php";	
?>