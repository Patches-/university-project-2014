<?php 
session_start();

    if(isset($_SESSION['LoggedIn'])){

        if ( !( $database = mysql_connect( "localhost", "dbtester", "123456" ) ) )
            die( "<p>Could not connect to database</p>" );
    
        if ( !mysql_select_db( "projectdb", $database ) )
            die( "<p>Could not open project database</p>" );

        $delete = mysql_query( "DELETE FROM `projectdb`.`customers`;");

            echo "<script>javascript:(window.location='registeredcustomers.php')</script>";
            
            
    }
    else {
        echo "You Should Not Be Here!";
        include 'includes/login.html';
    }

?>