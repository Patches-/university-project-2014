<?php 
    $pageTitle = 'Registered Customers';
    include 'includes/header.php'; 
?>






<?php 
    if(isset($_SESSION['LoggedIn'])){

        if ( !( $database = mysql_connect( "localhost", "dbtester", "123456" ) ) )
            die( "<p>Could not connect to database</p>" );
    
        if ( !mysql_select_db( "projectdb", $database ) )
            die( "<p>Could not open project database</p>" );

        $result = mysql_query( "SELECT * FROM customers");

            if (mysql_num_rows($result) == 0){
                echo "<h1>No customers have registered their interest yet</h1>";
            }
            else{
            echo "<h1>Customers who have registered!</h1>";

                echo "<ul>";

                    while ( $row = mysql_fetch_array($result, MYSQL_ASSOC) ) {echo "<li>" . $row['custName'] . " - " . $row['email'] . "</li>";};

                echo "</ul><br>
                    <a href='deleteallrows.php'>Delete all customer data</a>";
            }
            
            
    }
    else {
        echo "You Should Not Be Here!";
        include 'includes/login.html';
    }

?>



<?php include 'includes/footer.php'; ?>