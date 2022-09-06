<?php 
		header("Location: site/layout.php");
		if (isset($_POST['logout'])) {
			session_destroy();
    	    header("Refresh:0");
			
			
		}
		
 ?>