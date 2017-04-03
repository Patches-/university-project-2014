<?php 
	$pageTitle = 'About Us';
	include 'includes/header.php'; 
?>


<div class="clearfix">
	<div id="aboutustext"> <h1>About Us!</h1>

		<p>

		We are a long time running second hand props retailer! My name is Peter Jackson and i have worked 
		in the film industry for a long time creating props and managing the prop department for Warner Bros. The department 
		needed a clearout and i decided to start this company.</p>

		<p>Based in Miami we have a warehouse packed full of props used in many blockbuster films and are constantly updating
		our stock.</p>

		<p>Films we have worked on include:
			<ul>
				<li>Pirates of the Carribean</li>
				<li>Starwars</li>
				<li>James Bond</li>
				<li>Top Gun</li>
				<li>...and many many more!</li>
			</ul>
		</p>
	</div>

	<img id="aboutimg" src="img/aboutus.jpg"/>

</div>

<br>

<div class="textcenter">
	<h1>Watch our video!</h1>
</div>

<div id="videocontainer">
	<video src="video/video.mp4" controls>
  		Your browser does not support the <strong>Video</strong> element.
	</video>
</div>

<br>

<div class="textcenter">
	<h1>Gallery</h1>
</div>

<div id="gallery">
	<a href="img/aboutgallery/1.jpg" data-lightbox="aboutgallery" data-title="The Warehouse"><img src="img/aboutgallery/1.jpg"/></a>
	<a href="img/aboutgallery/2.jpg" data-lightbox="aboutgallery" data-title="More of The Warehouse"><img src="img/aboutgallery/2.jpg"/></a>
	<a href="img/aboutgallery/3.jpg" data-lightbox="aboutgallery" data-title="Pirates of the Carribean Cannon"><img src="img/aboutgallery/3.jpg"/></a>

</div>


<?php include 'includes/footer.php'; ?>