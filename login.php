<?php
session_start();


	if ( isset($_POST["submit"]) )
            $database = $_POST["submit"];
        extract( $_POST );
        
        if ( !( $database = mysql_connect( "localhost", "dbtester", "123456" ) ) )
            die( "<p>Could not connect to database</p>" );
    
        if ( !mysql_select_db( "projectdb", $database ) )
            die( "<p>Could not open project database</p>" );

	// Conver to simple variables
	$username = $_POST['username'];
	$password = $_POST['password'];

	if((!$username) || (!$password)){
		echo "failed";
		include 'includes/login.html';
	}else{

		// Convert password to md5 hash
		$password = md5($password);

		// check if the user info validates the db
		$sql = mysql_query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
		$login_check = mysql_num_rows($sql);

		if($login_check > 0){
			while($row = mysql_fetch_array($sql)){
			foreach( $row AS $key => $val ){
				$$key = stripslashes( $val );
			}
				// Register some session variables!
				
				$_SESSION['username'] = $username;
				
				$_SESSION['LoggedIn'] = true;

				
			}
		} else {
			echo "Login Failed<br/>
			Please try again!<br/><br/>
			<a href='index.php'>Cancel and return to homepage<a/><br/>";
			include 'includes/login.html';
			
		}
	}


	
	//if we are now logged in
	if(isset($_SESSION['LoggedIn'])){

				header("Location: registeredcustomers.php");
				
		}
	

?>
