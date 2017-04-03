<?php
session_start();

if(!isset($_SESSION['sound']))
    $_SESSION['sound'] = "on";

$json = file_get_contents('http://webdev.student.uws.ac.uk/movie-trivia.php');
$trivia = (json_decode($json, true));

?>
<!DOCTYPE html>
<html>
<head>
    <meta content="en-gb" http-equiv="Content-Language">
    <meta charset = "utf-8">
    <meta name="description" content="MovieProps.com is the UK&#039;s leading Movie Prop retailer with great deals on lightsabers, costumes, accessories and much much more!">
    <title>MovieProps.com - <?php echo $pageTitle ?> </title>
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/lightbox.css" rel="stylesheet" />
    <script type="text/javascript">
        <?php echo 'var soundsetting = '.json_encode($_SESSION['sound']).';'; ?>
    </script>

</head>
<body>
<div id="wrapper">
<div id="header">
<canvas id="logoCanvas" height="100" width="520">
    Movie Props.com
</canvas>


<div id="soundicon">
    
    <a href="#" class="hidden" id="soundoff"><img src="img/sound.png"/></a>
    <a href="#" class="hidden" id="soundon"><img src="img/sound_off.png"/></a>
    <img class="hidden" id="loading" src="img/loading.gif"/>
</div>


<div id="navcontain">
    <nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li>
            <a href="products.php">Products</a>
           
        </li>
        <li><a class="lastlink" href="register.php">Register Your Interest!</a></li>
    </ul>
    </nav>
</div>


</div> <!-- END OF HEADER DIV -->
<div id="maincontent" class="clearfix">