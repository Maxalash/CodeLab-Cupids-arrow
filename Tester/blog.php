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
  <title>My Blog</title>
  <link rel="shortcut icon" type="image/png" href="images/Heart.png" />
  <link rel="stylesheet" type="text/css" href="css/blog.css">
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
	<div class="rhombus2" style = "display: block">
        <div class="circle21"></div>
        <div class="circle22"></div>
    </div>
	</div>
  
<div id="backphoto"> </div>
<div style="position: absolute; left: 50%;">
  <div id="avatar"></div>
</div>
<div id="main">
  <h1> <?php echo htmlspecialchars($_SESSION["name"]); echo " "; echo htmlspecialchars($_SESSION["surname"])?>  <hr>  </h1>
  <br>  
  <p><?php echo htmlspecialchars($_SESSION["info"])?></p>
</div>

</body>
</html>