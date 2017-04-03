// Canvas
        window.requestAnimFrame = (function(callback){
        return  window.requestAnimationFrame       ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame    ||
        function( callback ){
            window.setTimeout(callback, 1000 / 60);
      };
})();
    
    function playSound(){
        var sound = new Audio("SaberOn.wav");
        if(soundsetting=="on"){
            sound.play();
        }
    }

    function drawLightsaber(myLightsaber, ctx) {
// Logo text
    ctx.beginPath();
    ctx.fillStyle = "rgba(238,238,238,"+myLightsaber.textAlpha+")";
    ctx.font = "40px Verdana";
    ctx.shadowColor = "rgba(0,0,0,"+myLightsaber.textAlpha+")";
    ctx.shadowBlur = 3;
    ctx.shadowOffsetX = 2;
    ctx.shadowOffsetY = 2;
    ctx.fillText("Movie Props.com", 20, 50);


//Green of saber
    ctx.beginPath();
    ctx.shadowBlur = 15;
	ctx.shadowOffsetX = 0;
    ctx.shadowOffsetY = 0;
    ctx.shadowColor = "rgba(185,252,197,"+ myLightsaber.alpha +")";
    ctx.fillStyle = "rgb(5,252,28)";
    ctx.rect(myLightsaber.x, myLightsaber.y, myLightsaber.width, myLightsaber.height);
    ctx.fill();
//Green saber tip
    if(myLightsaber.width != 0) {
        var greenArcX = 80 + myLightsaber.width;
        ctx.beginPath();
        ctx.arc(greenArcX,85,5,1.5*Math.PI,0.5*Math.PI); 
        ctx.fill();
    }

//Handle of lightsaber
    ctx.shadowBlur = 5;
    ctx.shadowColor = "rgb(0,0,0)";
    ctx.shadowOffsetX = -2;
    ctx.shadowOffsetY = 2;
    var gradient = ctx.createLinearGradient(15,0,80,0);
    gradient.addColorStop(0, "rgb(80,80,80)");
    gradient.addColorStop(0.5, "rgb(150,150,150)");
    gradient.addColorStop(1, "rgb(100,100,100)");
    ctx.fillStyle = gradient;
    ctx.fillRect(15,80,65,10);

//Handle details
    ctx.shadowBlur = 0;
    ctx.shadowOffsetY = 0;
    ctx.shadowOffsetX = 0;
    ctx.fillStyle = "rgb(15,15,15)";
    ctx.fillRect(15,77,4,16);
    ctx.fillRect(78,77,4,16);
    ctx.fillRect(50,77,20,5);
    ctx.fillStyle = "rgb(60,60,60)";
    ctx.fillRect(20,77,2,10);
    ctx.fillRect(25,77,2,10);
    ctx.fillStyle = "rgb(40,40,40)";
    ctx.fillRect(30,77,2,10);
    ctx.fillRect(35,77,2,10);
    ctx.fillStyle = "rgb(50,50,50)";
    ctx.fillRect(40,77,2,10);
    ctx.fillRect(45,77,2,10);
    ctx.fillRect(50,77,20,5);

    ctx.beginPath();
    ctx.arc(55,86,3,0,2 * Math.PI);
    ctx.fillStyle = myLightsaber.rgbButton2+myLightsaber.textAlpha+")";
    ctx.fill();

    ctx.beginPath();
    ctx.lineWidth = 1;
    ctx.arc(63,86,3,0,2 * Math.PI);
    ctx.fillStyle = myLightsaber.rgbButton+myLightsaber.textAlpha+")";
    ctx.strokeStyle = "rgb(0,0,0)";
    ctx.stroke();
    ctx.fill();

    ctx.beginPath();
    ctx.arc(71,86,3,0,2 * Math.PI);
    ctx.fillStyle = "rgb(0,0,0)";
    ctx.fill();
    } //end of drawLightsaber

//Animation of the lightsaber
    function animate(myLightsaber, canvas, ctx, startTime) {
    
    //code for the initial movement of the saber
    // update
        var time = (new Date()).getTime() - startTime;

    // pixels / second^2
        var speed = 1000;

        myLightsaber.width = 0.5 * speed * Math.pow(time / 1000, 2);

        if(myLightsaber.width > 400) {
        myLightsaber.width = 400;
        }

        var textspeed = 0.5;

        myLightsaber.textAlpha = 0.5 * textspeed * Math.pow(time / 1000, 2);

        if(myLightsaber.textAlpha > 1) {
        myLightsaber.textAlpha = 1;
        }

    // animating the pulse of the lightsaber
        var amplitude = 0.3;
        var period = 2000;
        var nextA = amplitude * Math.sin(time * 2 * Math.PI / period) + 0.7;
        myLightsaber.alpha = nextA;
        
    //Colour changer for the button on the light saber
        var rgb1 = 0;
        var rgb2 = 0;
        var rgb3 = 0;
        
        if(myLightsaber.alpha<=0.5) { rgb1 = 255; }
        else if(myLightsaber.alpha>0.5 && myLightsaber.alpha<= 0.9) { rgb2 = 255; }
        else { rgb3 = 255; }

        myLightsaber.rgbButton = "rgba("+rgb1+","+rgb2+","+rgb3+",";
        myLightsaber.rgbButton2 = "rgba("+rgb2+","+rgb3+","+rgb1+",";

    // clear
        ctx.clearRect(0, 0, canvas.width, canvas.height);

    // draw
        drawLightsaber(myLightsaber, ctx);

    // request new frame
        requestAnimFrame(function() {
        animate(myLightsaber, canvas, ctx, startTime);
        });
    } //end of function animate

    var canvas = document.getElementById('logoCanvas');
    var ctx = canvas.getContext('2d');

    var myLightsaber = {
    x: 80,
    y: 80,
    width: 0,
    height: 10,
    alpha: 0,
    textAlpha: 0,
    };

    drawLightsaber(myLightsaber, ctx);

    // wait one second before animation
    setTimeout(function() {
    var startTime = (new Date()).getTime();
    animate(myLightsaber, canvas, ctx, startTime);
    playSound();
    }, 1000);

//END of CANVAS


//sound on/off settings
if(soundsetting=="off"){
    $("#soundon").removeClass("hidden");
}
else if(soundsetting=="on"){
    $("#soundoff").removeClass("hidden");
}

$("#soundoff").click(function(e) {
    $("#soundoff").addClass("hidden");
    $("#loading").removeClass("hidden");
    e.preventDefault();
    $.ajax({
        type:'POST',
        url:'soundupdate.php',
        data: { varname: 'off'},
        success: function(){
            $("#soundon").removeClass("hidden");
            $("#loading").addClass("hidden");
        }
    });
});

$("#soundon").click(function(e) {    
    $("#soundon").addClass("hidden");
    $("#loading").removeClass("hidden");
    e.preventDefault();
    $.ajax({
        type:'POST',
        url:'soundupdate.php',
        data: { varname: 'on'},
        success: function(){
            $("#soundoff").removeClass("hidden");
            $("#loading").addClass("hidden");
        }
    });
});


///////////////// Trivia Slider ////////////////////


var trivia = $('#triviabanner');
trivia.each(function() {
    var mar = $(this),indent = 0;
    mar.trivia = function() {
        indent--;
        mar.css('text-indent',indent);
        if (indent < -1 * mar.children('#triviatext').width()) {
            indent = mar.width();
        }
    };
    mar.data('interval',setInterval(mar.trivia,1000/60));
});



//This function automatically updates the copyright year in the footer
function getYear() {
var year = new Date().getFullYear();
document.getElementById( "copy" ).innerHTML = "&copy Copyright 2001 - "+year; }
window.addEventListener( "load", getYear, false );