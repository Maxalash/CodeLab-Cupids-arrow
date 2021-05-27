<?php
// Initialize the session
session_start();
$log = $_SESSION["username"];
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Cupid's arrow</title>
	<link rel="shortcut icon" type="image/png" href="images/Heart.png" />
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<link rel="stylesheet" type="text/css" href="css/Buttons.css">
	<link rel="stylesheet" type="text/css" href="css/loading-page.css">
	<link rel="stylesheet" type="text/css" href="css/calculator_year.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>	
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script>
function sh(){
		document.getElementById("submit").style.display:'block';
	}
</script>

	
	
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

<br>
	<div class = "calc">
	<form action="" method="post">
<div class="field pixel">
		<label for="pixel">Your date of birth</label>
		<input id="pixel" name="you"  type="number" min="0" class="m-pixel" placeholder="enter you date of birth year"/>		 
	</div>
	<div class="field pixel">
		<label for="vpwidth">Partner's date of birth</label>
		<input id="vpwidth" name="partner"  type="number" min="0" class="m-vpwidth" placeholder="enter your partner's date of birth year"/>		 
	</div>
	<div style = "text-align: center">
	<button name = "Submit" value = "submit" type = "submit" onclick="sh()" id="submit">
		Calculate compatibility
	</button>
	</form>
	</div>
	<div class = "output">
		<label>
		<?php 

		if(isset($_POST['Submit'])){
			$you = $_POST['you'];
		$partner = $_POST['partner'];
		if((!$you && $you != '0') || (!$partner && $partner != '0')){
		$error_pol = "Fill all dates";
		echo "Fill all dates";
		}else if($you < '2000' || $partner <'200'){
			echo "This test is supposed for those who was born after 2000 year";
		}else{
	

		$con = mysqli_connect('localhost', 'root', '', 'lab');
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
		
		
		$result1 = ($you-2000)%12;
		$result2 = ($partner-2000)%12;
		$yearsign2;
		$yearsign1;
		switch($result1){
        case 0:
            $yearsign1="dragon";
            break;
        case 1:
            $yearsign1="snake";
            break;
        case 2:
            $yearsign1="horse";
            break;
        case 3:
            $yearsign1="sheep";
            break;
        case 4:
            $yearsign1="monkey";
            break;
        case 5:
            $yearsign1="rooster";
            break;
        case 6:
            $yearsign1="dog";
            break;
        case 7:
            $yearsign1="pig";
            break;
        case 8:
            $yearsign1="rat";
            break;
        case 9:
            $yearsign1="ox";
            break;
        case 10:
            $yearsign1="tiger";
            break;
        case 11:
            $yearsign1="rabbit";
            break;
			 default:
            echo "Oops! Something went wrong. Please try again later.";
    }
	switch($result2){
        case 0:
            $yearsign2="dragon";
            break;
        case 1:
            $yearsign2="snake";
            break;
        case 2:
            $yearsign2="horse";
            break;
        case 3:
            $yearsign2="sheep";
            break;
        case 4:
            $yearsign2="monkey";
            break;
        case 5:
            $yearsign2="rooster";
            break;
        case 6:
            $yearsign2="dog";
            break;
        case 7:
            $yearsign2="pig";
            break;
        case 8:
            $yearsign2="rat";
            break;
        case 9:
            $yearsign2="ox";
            break;
        case 10:
            $yearsign2="tiger";
            break;
        case 11:
            $yearsign2="rabbit";
            break;
			 default:
            echo "Oops! Something went wrong. Please try again later.";
    }
		$sql = "SELECT `compatability` FROM `year_sign` WHERE `first_sign` = '$yearsign1' and `second_sigh` = '$yearsign2'";
		$r = mysqli_query($con, $sql,MYSQLI_STORE_RESULT);
		$c = mysqli_fetch_array($r);
			
		
		if(!isset($error_pol)){
    if($c == NULL || $c == '0'){
	echo "You can try, but it is not recomended";}
	else{
	echo "You will be a great pair for a whole life";}
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	$some = "SELECT `id` FROM `personal` WHERE `year_sign` = '$yearsign1' and `username` = '$log'";
	$sc = mysqli_query($con, $some,MYSQLI_STORE_RESULT);
		$s = mysqli_fetch_array($sc);
	if($s != NULL || $s !='0'){
			$execute = "UPDATE `personal`
  SET `year_sign` = '$yearsign1'
  WHERE `username` = '$log';";
  $con->query($execute);
	}
	}
		}
		
		else{echo "$error_pol";}
		}
		}
		?>
		</label>
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
