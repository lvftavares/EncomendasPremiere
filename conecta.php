<?php
	
	$server = "localhost";
	$user = "root";
	$pswd = "";
	$bd = "encomendas";

	$mysqli = mysqli_connect(
			$server,
			$user,
			$pswd,
			$bd
	) or die (mysqli_error($mysqli));
		

?>