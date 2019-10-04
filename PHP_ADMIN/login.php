<?php

	include('server.php');

	include('header.php');
//error_reporting(0);
	
?>
<!DOCTYPE html>


          		
<!-- END Repeating code from header -->			  
			 
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
			Issues signing in? Contact iDonify at 555-555-5555 if you believe this is an error.
		</p>
	</form>


<!-- end login -->
		
			

              </div>
            </div>
          </div>
        </div>
      </div>
    
        </nav>
    </header>			
		
      </div>
    </div>
</div>	

</html>








