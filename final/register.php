<?php

	include('server.php');
	require "header.php";

?>


<!DOCTYPE html>
<html>

<body>

       <div class="wrapper">
          <div class="container nav">
            <div class="row">
              <div class="banner-info text-center wow fadeIn delay-05s">
                <h2 class="bnr-sub-title">User Registration</h2>
				
				
  <!-- start registration -->
	
	<form method="post" action="server.php">

		<?php include('errors.php'); ?>

		<input class="form-control" type="text" name="username" required placeholder="Username"><br>
		<input class="form-control" type="email" name="email" required placeholder="Email"><br>
		<input class="form-control" type="password" name="password_1" required placeholder="Password"><br>
		<input class="form-control" type="password" name="password_2" required placeholder="Confirm Password"><br>

		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>

<?php
	require "footer.php";
?>