</div> <!-- END OF MAIN CONTENT -->
<div id="foot" class="clearfix"> 
    <div id="admin"><p>
    	<?php 
    	if(!isset($_SESSION['LoggedIn']))
    		echo "<a href='adminlogin.php'>Admin Login</a>";
    	else
    		echo "<strong>YOU ARE LOGGED IN AS ".$_SESSION['username']."</strong> <a href='registeredcustomers.php'>Registered Customers</a> - <a href='includes/logout.php'>Logout</a>";
    	?>
    </p></div> 

    <div id="copycontain"> 
    	<p id="copy"></p>
    </div>
</div> <!-- END OF MAIN FOOTER -->
</div> <!--end of wrapper-->
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
        <script src="js/lightbox.min.js"></script>
        <script type="text/javascript" src="js/javascript.js"></script>

</body>
</html>