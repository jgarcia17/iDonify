<?php

	include('server.php');

	require "header.php";
//error_reporting(0);
	
?>
<!DOCTYPE html>
<html>
<body>

        <div class="wrapper">
          <div class="container nav">
            <div class="row">
              <div class="banner-info text-center wow fadeIn delay-05s">
                <h2 class="bnr-sub-title">Login</h2>
				
				
  <!-- start login -->
				
		<form method="post" action="login.php">

		<?php include('errors.php'); ?>
		
			<div>
			<label>Username</label>
			<input type="text" name="username" >
			</div>
			
			<div>
			<label>Password</label>
			<input type="password" color="black" name="password">
			</div>
		
		<div class="brn-btn">
			<button type="submit" class="btn btn-download" name="login_user">Login</button>
		</div>
		
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>


<!-- end login -->
		
			

              </div>
            </div>
          </div>
        </div>

		
</body>
</html>

<?php
	require "footer.php";
?>