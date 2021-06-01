<?php
session_start();
$log = $_SESSION["username"];  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cupid's arrow</title>
	<link rel="shortcut icon" type="image/png" href="images/Heart.png" />
	<link rel="stylesheet" type="text/css" href="css/love_test.css">
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<link rel="stylesheet" type="text/css" href="css/loading-page.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>	
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		

	
	
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
        <a href="logout.php" class="nav-link active">Sign Out</a>
        </li>
        <li id="personicon" class="nav-item">
        <a href="personal.php" class="nav-link active"><img src="images/cudidsid.png" alt="Account" width="20%" height=width></a>
        </li>
      </ul>
  </div>
</nav>
<div id="evaluating">
<form action="" method="post">
  <div id="namepart">
    <input type="text" class="name1 heartname" id="name7" name="name1" placeholder="Your name">
	<div class="output"><label><a class="r-link animated-underline animated-underline_type1 news__link">
					
	<?php 
		
		if(isset($_POST['submit'])){
			$you = $_POST['name1'];
		$partner = $_POST['name2'];
		if((!$you && $you != '0') || (!$partner && $partner != '0')){
		$error_pol = "Fill again";
		echo "Fill again";
		}else{
	

		$con = mysqli_connect('localhost', 'root', '', 'lab');
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
		
		$s_you=str_split($you);
		$s_partner = str_split($partner);
		$num1=0;
		$num2=0;
		for ($i=0;$i<count($s_you);$i++){
			switch($s_you[$i]){
				case "A":
				case "a":
				case "J":
				case "j":
				case "S":
				case "s": $num1+=1; break;
				case "b":
				case "B":
				case "k":
				case "K":
				case "T":
				case "t": $num1+=2;break; 
				case "c":
				case "C":
				case "L":
				case "l":
				case "U":
				case "u": $num1+=3;break;
				case "d":
				case "D":
				case "m":
				case "M":
				case "v":
				case "V": $num1+=4;break;
				case "e":
				case "E":
				case "N":
				case "n": 
				case "w":
				case "W": $num1+=5;break;
				case "f":
				case "F":
				case "o":
				case "O":
				case "x":
				case "X": $num1+=6;break;
				case "g":
				case "G":
				case "p":
				case "P":
				case "y":
				case "Y": $num1+=7;break;
				case "h":
				case "H":
				case "q":
				case "Q":
				case "z":
				case "Z": $num1+=8;break;
				case "i":
				case "I":
				case "r":
				case "R": $num1+=9;break;
			}
		}
		for ($i=0;$i<count($s_partner);$i++){
			switch($s_partner[$i]){
				case "A":
				case "a":
				case "J":
				case "j":
				case "S":
				case "s": $num2+=1; break;
				case "b":
				case "B":
				case "k":
				case "K":
				case "T":
				case "t": $num2+=2;break; 
				case "c":
				case "C":
				case "L":
				case "l":
				case "U":
				case "u": $num2+=3;break;
				case "d":
				case "D":
				case "m":
				case "M":
				case "v":
				case "V": $num2+=4;break;
				case "e":
				case "E":
				case "N":
				case "n": 
				case "w":
				case "W": $num2+=5;break;
				case "f":
				case "F":
				case "o":
				case "O":
				case "x":
				case "X": $num2+=6;break;
				case "g":
				case "G":
				case "p":
				case "P":
				case "y":
				case "Y": $num2+=7;break;
				case "h":
				case "H":
				case "q":
				case "Q":
				case "z":
				case "Z": $num2+=8;break;
				case "i":
				case "I":
				case "r":
				case "R": $num2+=9;break;
			}
		}
		$sql = "SELECT `compatability` FROM `numerology` WHERE `first_num` = '$num1' and `second_num` = '$num2'";
		$r = mysqli_query($con, $sql,MYSQLI_STORE_RESULT);
		$c = mysqli_fetch_array($r);
			
		
		if(!isset($error_pol)){
    if($c == NULL || $c == '0'){
		$r = rand(0,50);
	echo $r,"%";}
	else{
		$r = rand(0,50);
	echo $r,"%";}
	
		}
		
		else{echo "$error_pol";}
		}
		}
		?></a></label></div>
	
    <input type="text" class="name1 heartname" id="name8" name="name2" placeholder="Your crush name:)">
  </div>

    <div id="heartev">
      
	  
    
	<button id="heartness" type = "submit" name="submit" style="border: 0; background: transparent" ><img id="heartimg" src="images/Heart.png" style="width: 100%; transition:0.5s"></div>
    </div>
	</form>
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
