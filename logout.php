<?php		

	session_start();	
	session_destroy();

	unset ($_SESSION['email']);
	unset ($_SESSION['senha']);
	echo "<script language='javascript' type'text/javascript'>
			alert('Logout efetuado com sucesso!');
			window.location.replace('login.php');
		  </script>";
?>