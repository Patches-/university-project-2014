<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta content="en-gb" http-equiv="Content-Language">
    <meta charset = "utf-8">
    <meta name="description" content="MovieProps.com is the UK&#039;s leading Movie Prop retailer with great deals on lightsabers, costumes, accessories and much much more!">

    <title>MovieProps.com - Thank You for Registering!</title>

<style type="text/css">

body {
    background-color: #474747;
}

p {
    color: #a0a0a0;
    font: 26px helvetica;
    text-shadow: 0px 3px 8px #2a2a2a;
}

h1 { 
    text-decoration: none; 
    font: 120px Helvetica; 
    text-align: center; 
    color: #a0a0a0; 
    text-shadow: 0px 3px 8px #2a2a2a; 
    padding-top: 80px;
}

h3 { 
    text-decoration: none; 
    font: 50px Helvetica; 
    text-align: center; 
    color: #a0a0a0; 
    text-shadow: 0px 3px 8px #2a2a2a; 
    padding-top: 30px;
}

h3 a {
    color: rgb(196,89,30);
    text-decoration: underline; 
    transition: color ease-in 1s;
}

h3 a:hover{ 
    color: white; 
    text-shadow: 0px 5px 8px #2a2a2a; 
}

</style>

</head>

<body>

<?php
if ( isset($_POST["submit"]) )
            $database = $_POST["submit"];
        extract( $_POST );
        
        if ( !( $database = mysql_connect( "localhost", "dbtester", "123456" ) ) )
            die( "<p>Could not connect to database</p>" );
    
        if ( !mysql_select_db( "projectdb", $database ) )
            die( "<p>Could not open project database</p>" );
    
        if ( isset($_POST["custName"]) )
            $name = $_POST["custName"];
        
        if ( isset($_POST["email"]) )
            {
                $mail = $_POST["email"];

                if ( preg_match("/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i", $mail) ){
                    $query = "INSERT INTO customers ( custName, email ) VALUES ( '$name', '$mail' )";
                    if ( !( $sqlquery = mysql_query( $query ) ) )
                    {
                        print( "<p>Could not execute query!</p>" );
                        die( mysql_error() );
                    } //end if
                    else {
                        echo "<h1>Thank you for registering!</h1>";
                        echo "<h3>Your details have been added to our database!</h3>";
                        echo "<h3><a href='index.php'>Return to Home Page</a></h3>";
                    } //end else

                }
                    
                else{
                    print( "<h3 style='color:red;'>$mail is not a valid email address.</h3>" );
                    print( "<div style='width:400px; margin:auto;'>");
                    include 'includes/registerform.html';
                    print( "</div>" );
                }
            } // end if


            
        
            


?> 

</body>
</html>