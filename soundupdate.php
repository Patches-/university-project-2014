<?php
session_start();

$update = $_POST['varname'];

	switch($update){
		case "off":
			$_SESSION['sound'] = off;
			break;
		case "on":
			$_SESSION['sound'] = on;
			break;
	}
?>