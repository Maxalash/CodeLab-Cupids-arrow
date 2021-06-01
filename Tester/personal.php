<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cupid's arrow</title>
	<link rel="shortcut icon" type="image/png" href="images/Heart.png" />
	<link rel="stylesheet" type="text/css" href="css/loading-page.css">
	<link rel="stylesheet" type="text/css" href="css/personal.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>	
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script type="text/javascript"></script>
</head>
<body>
	

		
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
              <a class="nav-link active" aria-current="page" href="#">Zodiac compatibility</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Age compatibility</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="Cupid's arrow(Lovetest).html">Love Test</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Horoscope</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Love Advices</a>
            </li>
          </ul>
          <!-- <form class="d-flex">
            <input class="form-control me-2" id="searchbox" type="search" placeholder="Search" aria-label="Search" autofocus>
            <button class="btn btn-outline-danger" type="submit" onclick="javascript: search('searchbox'); return false;" onsubmit="javascript: search('searchbox'); return false;">Search</button>
          </form> -->
        </div>
      </div>
    </nav>
    <div id="shadoweffect"></div>

    <iframe id="webpages" src="blog.php"></iframe>

    <div id="menu">
      <ul id="menulist">
        <li id='1'>My page</li>
        <li id='2'>Partners</li>
        <li id='3'>Dates</li>
        <li id='4'>My page</li>
        <li id='5'>My page</li>
      </ul>
    </div>

    <div id="toggle">
      <div class="one"></div>
      <div class="two"></div>
      <div class="three"></div>
    </div>

	</div>
	<div id="footer">
		<center><h1>&copy;Cupid's arrow</h1></center>
	</div>

  <script>
// --------------------menu toggle------------------------
    var ifra = true;
    $("#toggle").click(function() {
      var wid=$(window).width();
      $(this).toggleClass("on");
      if(ifra){
      $('#webpages').animate({
        width: wid*0.8,
      },
      {
        duration:500,
        complete:function(){
        $(this).after();}
      }).delay(1000);
      $("#menu").slideToggle();
      ifra=false;
      }else{
      $("#menu").slideToggle().delay(1000);
      $('#webpages').animate({
        width: wid,
      },
      {
        duration:500,
        complete:function(){
        $(this).after();}
      });
      ifra=true;
      }
    });
// ----------------Menu-----------------
$("#menulist li").click(function() {
    var idtem=this.id;
    switch (idtem) {
    case "1": 
    // alert("first");
    $("#webpages").attr('src','blog.php');
    break;
    case "2": 
    // alert("second");
    $("#webpages").attr('src','partners.php');
    break;
    case "3": 
    // alert("third");
    $("#webpages").attr('src','dates.php');
    break;
    case "4": 
    // alert("fourth");
    $("#webpages").attr('src','blog.php');
    break;
    case "5": 
    // alert("fifth");
    $("#webpages").attr('src','blog.php');
    break;
  }
});
  </script>
  <script>
       
		$(window).on("load",function(){
		$(".wrap").fadeOut("slow")
    })
	
        </script>
	<div class = "wrap" >
	<div class="rhombus2" >
        <div class="circle21"></div>
        <div class="circle22"></div>
    </div>
	</div>
</body>
</html>
