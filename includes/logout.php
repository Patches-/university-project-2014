<?php
	session_start();

unset($_SESSION['username']);
unset($_SESSION['LoggedIn']);

    
        echo "<script>javascript:(window.location='../index.php')</script>";
    
?>
