//////////////AJAX for Product page///////////////

        var asyncRequest; // variable to hold XMLHttpRequest object
    
        // set up and send the asynchronous request to get the XML file
        function getImages( url )
        {
            // attempt to create XMLHttpRequest object and make the request
            try
            {
                asyncRequest = new XMLHttpRequest(); // create request object
    
                // register event handler
                asyncRequest.addEventListener(
                    "readystatechange", processResponse, false); 
                asyncRequest.open( "GET", url, true ); // prepare the request
                asyncRequest.send( null ); // send the request
            } // end try
            catch ( exception )
            {
                alert( "Request Failed" );
            } // end catch
        } // end function getImages

        // parses the XML response; dynamically creates an undordered list and 
        // populates it with the response data; displays the list on the page
        function processResponse()
        {
            // if request completed successfully and responseXML is non-null
            if ( asyncRequest.readyState == 4 && asyncRequest.status == 200 && 
                asyncRequest.responseXML )
            {
                

                // get the covers from the responseXML
                var products = asyncRequest.responseXML.getElementsByTagName(
                    "product" );

                // get base URL for the images
                var baseUrl = asyncRequest.responseXML.getElementsByTagName( 
                    "baseurl" ).item( 0 ).firstChild.nodeValue;

                var product = products.item(0);

                // get the image filename
                var img1 = product.getElementsByTagName( "img1" ).item( 0 ).firstChild.nodeValue;
                var img2 = product.getElementsByTagName( "img2" ).item( 0 ).firstChild.nodeValue;
                var img3 = product.getElementsByTagName( "img3" ).item( 0 ).firstChild.nodeValue;
                var img4 = product.getElementsByTagName( "img4" ).item( 0 ).firstChild.nodeValue;
                var name = product.getElementsByTagName( "name" ).item( 0 ).firstChild.nodeValue;
                var para1 = product.getElementsByTagName( "para1" ).item( 0 ).firstChild.nodeValue;
                var para2 = product.getElementsByTagName( "para2" ).item( 0 ).firstChild.nodeValue;

                var img1out = document.getElementById( "img1" );
                var img2out = document.getElementById( "img2" );
                var img3out = document.getElementById( "img3" );
                var img4out = document.getElementById( "img4" );
                var bigimgout = document.getElementById( "bigimg" );
                var nameout = document.getElementById( "name" );
                var para1out = document.getElementById( "para1" );
                var para2out = document.getElementById( "para2" );

                img1out.setAttribute( "src", baseUrl + escape( img1 ) );
                img2out.setAttribute( "src", baseUrl + escape( img2 ) );
                img3out.setAttribute( "src", baseUrl + escape( img3 ) );
                img4out.setAttribute( "src", baseUrl + escape( img4 ) );
                bigimgout.setAttribute( "src", baseUrl + escape( img1 ));
                nameout.innerHTML = name;
                para1out.innerHTML = para1;
                para2out.innerHTML = para2;


                //changing the main image when using a mouse over on the thumbnails
                img1out.addEventListener( "mouseover", function() {bigimgout.setAttribute( "src", baseUrl + escape( img1 ));}, false );
                img2out.addEventListener( "mouseover", function() {bigimgout.setAttribute( "src", baseUrl + escape( img2 ));}, false );
                img3out.addEventListener( "mouseover", function() {bigimgout.setAttribute( "src", baseUrl + escape( img3 ));}, false );
                img4out.addEventListener( "mouseover", function() {bigimgout.setAttribute( "src", baseUrl + escape( img4 ));}, false );


            } // end if 
        } // end function processResponse



        // clears the images and data in all the elements
        function clearImages()
        {
            document.querySelectorAll( "#img1, #img2, #img3, #img4, #bigimg, ,#name, #para1, #para2" ).innerHTML = ""; 
        } // end function clearImages



        // register event listeners
        function registerListeners()
        {
            document.getElementById( "bondppk" ).addEventListener(
                "click", function() { getImages( "xml/bond.xml" ); }, false );
            document.getElementById( "hpipe" ).addEventListener(
                "click", function() { getImages( "xml/pipe.xml" ); }, false );
            document.getElementById( "lsaber" ).addEventListener(
                "click", function() { getImages( "xml/saber.xml" ); }, false );  
            document.getElementById( "ppack" ).addEventListener(
                "click", function() { getImages( "xml/proton.xml" ); }, false );    
            document.getElementById( "onering" ).addEventListener(
                "click", function() { getImages( "xml/ring.xml" ); }, false );   
            document.getElementById( "smask" ).addEventListener(
                "click", function() { getImages( "xml/scream.xml" ); }, false );  
        } // end function registerListeners


    
        window.addEventListener( "load", registerListeners, false );
        
        window.addEventListener( "load", function() {getImages( "xml/bond.xml" ); }, false);

        if(getproduct=='saber')
            window.addEventListener( "load", function() {getImages( "xml/saber.xml" ); }, false);
        else if(getproduct=='proton')
            window.addEventListener( "load", function() {getImages( "xml/proton.xml" ); }, false);
        
            


//set mouseovers and implement the below function


function centreMainImg() {
            var bigimgboxwidth = $("#bigimg").width();
            $("#bigimgbox").attr('style', "width:"+bigimgboxwidth+"px;");
        }
        // end function centreMainImg