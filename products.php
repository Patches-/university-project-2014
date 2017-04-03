<?php 
	$pageTitle = "Products";
	include 'includes/header.php'; 

if(isset($_GET['product'])){
	echo '<script> var getproduct = \'' . $_GET['product'] . '\'; </script>';
}
else
	echo '<script> var getproduct = \'bond\';</script>';
?>
<!-- update page title to reflect product -->
<div id="productnavcontain" class="clearfix" >
	<div id="productnav" class="clearfix" >
	<nav>
		<ul>
			<li><a id="bondppk" href="#">Bond PPK</a></li>
            <li><a id="hpipe" href="#">Hobbit Pipe</a></li>
			<li><a id="lsaber" href="#">Light Saber</a></li>
            <li><a id="ppack" href="#">Proton Pack</a></li>
            <li><a id="onering" href="#">One Ring</a></li>
            <li><a id="smask" class="lastlink" href="#">Scream Mask</a></li>
        </ul>
    </nav>
    </div>
</div>

<div id="imgsection" class="clearfix">
	<div id="thumbnails">
		<img id="img1"/>
		<img id="img2"/>
		<img id="img3"/>
		<img id="img4"/>
	</div>
	<div id="mainimgcontain">
		<div id="bigimgbox" >
			<img id="bigimg"/>
		</div>
	</div>
</div>

<div id="textsection">
		<h2 id="name"></h2>
	
		<p id="para1"></p>
		
		<p id="para2"></p>
	
</div>



<script type="text/javascript" src="js/productajax.js"></script>
<?php include 'includes/footer.php'; ?>
