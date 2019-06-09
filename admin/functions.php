<?php
	function isAdmin()
	{
		if (isset($_SESSION['email']) && $_SESSION['email']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}
	
?>