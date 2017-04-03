<?php
	$pageTitle = 'Home';
	include 'includes/header.php';
?>

<h3>Add another javascript element</h3>

<div id="indexslider" class="cycle-slideshow" 
    data-cycle-fx=scrollHorz
    data-cycle-timeout=7000
    data-cycle-slides="> div.slide"
    data-cycle-pager=".custom-pager"
    data-cycle-pager-template="<li><a href=#> {{slideNum}} </a></li>"
    >
    <!-- empty element for pager links -->
    <ol class="custom-pager-nav"><div class="custom-pager"></div></ol>

    <div class="slide"> 
    	<img src="img/slides/1.jpg">
    	<div class="overslidertext">
    		<a href="products.php?product=saber"><h3>Lightsabers!</h3></a>
    	</div>
    </div>
    <div class="slide"> 
    	<img src="img/slides/2.jpg">
    	<div class="overslidertext">
    		<a href="products.php"><h3>James Bond's<br>
    			Walther PPK</h3></a>
    	</div>
    </div>
    <div class="slide"> 
    	<img src="img/slides/3.jpg">
    	<div class="overslidertext"> 
    		<a href="products.php?product=proton"><h3>Ghostbusters 
    			Proton Packs</h3></a>
    	</div>
    </div>
</div>


    <div id="triviabanner" class="boxshadow">
        <div id="triviatext"><p>
            <?php 
                echo $trivia["movie-trivia"];
            ?></p>
        </div>
        <div class="newscorner"></div>
    </div>





<?php include 'includes/footer.php'; ?>
