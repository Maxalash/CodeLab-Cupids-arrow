<?php
// Initialize the session
session_start();
 ?>



<!DOCTYPE html>
<html>
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<title>Cupid's arrow</title>
	<link rel="shortcut icon" type="image/png" href="images/Heart.png" />
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<link rel="stylesheet" type="text/css" href="css/Buttons.css">
	<link rel="stylesheet" type="text/css" href="css/loading-page.css">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>	
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		
</head>
<body>
	<script>
       
		$(window).on("load",function(){
		$(".wrap").fadeOut("slow")
    })
	
        </script>
		
	<div id="header" style="background: url('images/cupidspaint.jpg') no-repeat center top fixed;">

	</div>

	<div id="main">
		<nav id="navigation" class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="zodiac.php">Zodiac compatibility</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="age_test.php">Age compatibility</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="love_test.php">Love Test</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Horoscope</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Love Advices</a>
        </li>
		 </ul>

      
    </div>
    <ul class="navbar-nav mb-lg-0">
		<li id="loginicon" class="nav-item">
          <a class="nav-link active" href="login.php">Login</a>
        </li>
		<li id="registericon" class="nav-item " >
          <a class="btn-wps wps-reinit" href="register.php">Register</a>
        </li>
        <li id="signouticon" class="nav-item">
        <a href="logout.php" class="btn-wps wps-reinit" style ="margin-top:15px">Sign Out</a>
        </li>
        <li id="personicon" class="nav-item">
        <a href="personal.php" class="nav-link active"><img src="images/cudidsid.png" alt="Account" width="20%" height=width></a>
        </li>
      </ul>
  </div>
</nav>
	 <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/forCupidsedited.jpg" class="d-block w-100" alt="Sorry, can you reload page?">
      <div class="carousel-caption d-none d-md-block">
        <h5>Zodiac compatability</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/forCupid5edited.jpg" class="d-block w-100" alt="Sorry, can you reload page?">
      <div class="carousel-caption d-none d-md-block">
        <h5>Age compatability</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/forCupids1edited.jpg" class="d-block w-100" alt="Sorry, can you reload page?">
      <div class="carousel-caption d-none d-md-block">
        <h5>Love test</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/forCupids2edited.jpg" class="d-block w-100" alt="Sorry, can you reload page?">
      <div class="carousel-caption d-none d-md-block">
        <h5>Horoscope</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/forCupids3.jpg" class="d-block w-100" alt="Sorry, can you reload page?">
      <div class="carousel-caption d-none d-md-block">
        <h5>Love advices</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container" style="background-color: rgb(249, 200, 222);">
	<div class="row">
		<div class="col-12 text-center"><h3>Recommended books for self study</h3></div>
		<div class="col-12 text-center"><p>This are books which will helpp you to overcome your mistakes</p></div>
	</div>
	<div class="row">
		<div class="col-2" style="background-color: rgb(249, 200, 222);"></div>
		<div class="card col-2" >
		  <img src="https://m.media-amazon.com/images/I/A1uUcF5tVzL.jpg" class="card-img-top" alt="...">
		  <div class="card-body">
		    <h5 class="card-title">If the Budha Married</h5>
		    <p class="card-text">Creating Enduring Relationships on a Spiritual Path (Compass)</p>
		    <a href="http://support.bensonheating.co.uk/download/416754.pdf" class="btn btn-primary">Read</a>
		  </div>
		</div>
		<div class="col-1" style="background-color: rgb(249, 200, 222);"></div>
		<div class="card col-2">
		  <img src="https://i5.walmartimages.com/asr/bd4878be-41e3-4e9f-8536-f56989490b13_1.781eb6f079371ccd15996fb4466a60be.jpeg" class="card-img-top" alt="...">
		  <div class="card-body">
		    <h5 class="card-title">How to Be an Adult in Relationships</h5>
		    <p class="card-text">The Five Keys to Mindful Loving</p>
		    <a href="https://www.goodreads.com/book/show/500901.How_to_Be_an_Adult_in_Relationships" class="btn btn-primary">Read</a>
		  </div>
		</div>
		<div class="col-1" style="background-color: rgb(249, 200, 222);"></div>	
		<div class="card col-2">
		  <img src="https://kbimages1-a.akamaihd.net/42ee12d4-c8d4-4efd-9054-2abe822fd7ba/1200/1200/False/on-love-20.jpg" class="card-img-top" alt="...">
		  <div class="card-body">
		    <h5 class="card-title">On Love</h5>
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		    <a href="https://www.kobo.com/no/nb/ebook/on-love-20" class="btn btn-primary">Read</a>
		  </div>
		</div>
		<div class="col-2" style="background-color: rgb(249, 200, 222);"></div>	
	</div>
</div>
<div class="container-box ms-5 my-5">
            
        <h4 class="text-center">Read Your Daily Horoscope</h4>
        <p class="title-desc text-center">Read our daily horoscope predictions to find out how a fresh new day would greet you. Our daily horoscope prediction tells you about your love fate, career fate, financial fate, health fate for a particular day. We offer these predictions on the basis of your zodiac sign. If you know the day ahead of you, you get a vantage point to bypass the hurdles or possible perils and continue towards success and desirable outcomes.</p>
        <div class="row ms-5">            
            
                       <div class="col-2">

                <a href="https://www.knowastro.com/dailyhoroscope/sign/Aries" target="_self" class="">
                    <div class="img zodiacSignsImgSec"><img alt="Horoscope sign Aries" src="https://www.knowastro.com/cdn/site/images/zodiac-signs/aries.png"></div>
                    <span><h6>Aries</h6>
                    <p>Mar 21 - Apr 19                    </p>
                    </span>  
                </a>               
            </div>
                       <div class="col-2">

                <a href="https://www.knowastro.com/dailyhoroscope/sign/Taurus" target="_self" class="">
                    <div class="img zodiacSignsImgSec"><img alt="Horoscope sign Taurus" src="https://www.knowastro.com/cdn/site/images/zodiac-signs/taurus.png"></div>
                    <span><h6>Taurus</h6>
                    <p>Apr 20 - May 20                    </p>
                    </span>  
                </a>               
            </div>
                       <div class="col-2">

                <a href="https://www.knowastro.com/dailyhoroscope/sign/Gemini" target="_self" class="">
                    <div class="img zodiacSignsImgSec"><img alt="Horoscope sign Gemini" src="https://www.knowastro.com/cdn/site/images/zodiac-signs/gemini.png"></div>
                    <span><h6>Gemini</h6>
                    <p>May 21 - Jun 20                    </p>
                    </span>  
                </a>               
            </div>
                       <div class="col-2">

                <a href="https://www.knowastro.com/dailyhoroscope/sign/Cancer" target="_self" class="">
                    <div class="img zodiacSignsImgSec"><img alt="Horoscope sign Cancer" src="https://www.knowastro.com/cdn/site/images/zodiac-signs/cancer.png"></div>
                    <span><h6>Cancer</h6>
                    <p>Jun 21 - Jul 22                    </p>
                    </span>  
                </a>               
            </div>
                       <div class="col-2">

                <a href="https://www.knowastro.com/dailyhoroscope/sign/Leo" target="_self" class="">
                    <div class="img zodiacSignsImgSec"><img alt="Horoscope sign Leo" src="https://www.knowastro.com/cdn/site/images/zodiac-signs/leo.png"></div>
                    <span><h6>Leo</h6>
                    <p>Jul 23 - Aug 22                    </p>
                    </span>  
                </a>               
            </div>
                       <div class="col-2">

                <a href="https://www.knowastro.com/dailyhoroscope/sign/Virgo" target="_self" class="">
                    <div class="img zodiacSignsImgSec"><img alt="Horoscope sign Virgo" src="https://www.knowastro.com/cdn/site/images/zodiac-signs/virgo.png"></div>
                    <span><h6>Virgo</h6>
                    <p>Aug 23 - Sep 22                    </p>
                    </span>  
                </a>               
            </div>
                       <div class="col-2">

                <a href="https://www.knowastro.com/dailyhoroscope/sign/Libra" target="_self" class="">
                    <div class="img zodiacSignsImgSec"><img alt="Horoscope sign Libra" src="https://www.knowastro.com/cdn/site/images/zodiac-signs/libra.png"></div>
                    <span><h6>Libra</h6>
                    <p>Sep 23 - Oct 22                    </p>
                    </span>  
                </a>               
            </div>
                       <div class="col-2">

                <a href="https://www.knowastro.com/dailyhoroscope/sign/Scorpio" target="_self" class="">
                    <div class="img zodiacSignsImgSec"><img alt="Horoscope sign Scorpio" src="https://www.knowastro.com/cdn/site/images/zodiac-signs/scorpio.png"></div>
                    <span><h6>Scorpio</h6>
                    <p>Oct 23 - Nov 21                    </p>
                    </span>  
                </a>               
            </div>
                       <div class="col-2">

                <a href="https://www.knowastro.com/dailyhoroscope/sign/Sagittarius" target="_self" class="">
                    <div class="img zodiacSignsImgSec"><img alt="Horoscope sign Sagittarius" src="https://www.knowastro.com/cdn/site/images/zodiac-signs/sagittarius.png"></div>
                    <span><h6>Sagittarius</h6>
                    <p>Nov 22 - Dec 21                    </p>
                    </span>  
                </a>               
            </div>
                       <div class="col-2">

                <a href="https://www.knowastro.com/dailyhoroscope/sign/Capricorn" target="_self" class="">
                    <div class="img zodiacSignsImgSec"><img alt="Horoscope sign Capricorn" src="https://www.knowastro.com/cdn/site/images/zodiac-signs/capricorn.png"></div>
                    <span><h6>Capricorn</h6>
                    <p>Dec 22 - Jan 19                    </p>
                    </span>  
                </a>               
            </div>
                       <div class="col-2">

                <a href="https://www.knowastro.com/dailyhoroscope/sign/Aquarius" target="_self" class="">
                    <div class="img zodiacSignsImgSec"><img alt="Horoscope sign Aquarius" src="https://www.knowastro.com/cdn/site/images/zodiac-signs/aquarius.png"></div>
                    <span><h6>Aquarius</h6>
                    <p>Jan 20 - Feb 18                    </p>
                    </span>  
                </a>               
            </div>
                       <div class="col-2">

                <a href="https://www.knowastro.com/dailyhoroscope/sign/Pisces" target="_self" class="">
                    <div class="img zodiacSignsImgSec"><img alt="Horoscope sign Pisces" src="https://www.knowastro.com/cdn/site/images/zodiac-signs/pisces.png"></div>
                    <span><h6>Pisces</h6>
                    <p>Feb 19 - Mar 20                    </p>
                    </span>  
                </a>               
            </div>
           
        </div>        

      </div>
   </div> 

	<div id="footer">
		<center><h1>&copy;Cupid's arrow</h1></center>
	</div>
	
  <div class = "wrap" >
	<div class="rhombus2" >
        <div class="circle21"></div>
        <div class="circle22"></div>
    </div>
	</div>
<?php
// Check if the user is already logged in, if yes then redirect him to welcome page
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  ?>
    <script>
        $("#loginicon, #registericon, #signouticon, #personicon").toggle();
    </script>
    <?php
    exit;
}
?>
</body>
</html>
