<?php
	/*CSRF Token*/
	function CSRF(){
		return $_SESSION['token'] = bin2hex(random_bytes(32));
	}

	
?>
