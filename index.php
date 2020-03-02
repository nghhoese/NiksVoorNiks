<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Niks voor Niks</title>
    <link rel="icon" href="Resources/favicon.png">

    
</head>

<body>
    <div class="container">

        <?php include("header.php"); ?>

        
        <div class="content">
            <div class="slider">
                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="Resources/handshake.png" style="width:100%">
                    <div class="text">Ruilkring Niks voor Niks</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="Resources/denbosch.png" style="width:100%">
                    <div class="text">'S Hertogenbosch en omgeving</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="Resources/appeltaart.png" style="width:100%">
                  <div class="text">Ruilen van diverse diensten en producten</div> 
                
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
     </div>      
        
            <div class="preview-aanbod">
               
                <div class="aanbod">

                    <img src="Resources/MXsfEWs.png">
			<h1>Titel advertentie</h1>                    
                    <p class="price">10 Niks</p>
                    <p>Beschrijving van de advertentie in het kort..</p>
                    <p><button>Bekijk advertentie</button></p>
                </div>
                <div class="aanbod">
                    <img src="Resources/MXsfEWs.png" alt="Aanbod">
                    <h1>Titel advertentie</h1>
                    <p class="price">10 Niks</p>
                    <p>Beschrijving van de advertentie in het kort..</p>
                    <p><button>Bekijk advertentie</button></p>
                </div>
                <div class="aanbod">
                    <img src="Resources/MXsfEWs.png" alt="Aanbod">
                    <h1>Titel advertentie</h1>
                    <p class="price">10 Niks</p>
                    <p>Beschrijving van de advertentie in het kort..</p>
                    <p><button>Bekijk advertentie</button></p>
                </div>
            </div>
     

    </div>
 	 	
        <?php include("footer.php"); ?>
 <script src="JS/slider.js"></script>

    </div>
</body>

</html>
