<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "db_connection.php";
 $con = mysqli_connect('localhost', 'root', '', 'lab');
$link=OpenCon();
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter login.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
	// if(isset($_POST['Login']){
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT `id`, `username`, `password`, `name`, `surname`, `info`, `numerology`, `birth`, `year_sign`, `zodiac` FROM `personal` WHERE `username` = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $password, $name, $surname, $info, $birthday, $numer, $year, $zodiac);
                    echo '<script language="javascript">';
        echo 'alert("statement result")';
        echo '</script>';
                    if(mysqli_stmt_fetch($stmt)){
						$fist = $_POST["password"];
						$user = $_POST["username"];
						$ssql = "SELECT `password` FROM `personal` where `username`= $user ";
						$result = mysqli_query($con, $ssql);
                        while($row = mysqli_fetch_assoc($result)) {
							$pass = $row["password"];
						}
						if($pass == $fist ){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["name"] = $name;
                            $_SESSION["surname"] = $surname;
                            $_SESSION["info"] = $info;
                            $_SESSION["birthday"] = $birthday;
                            $_SESSION["numer"] = $numer;
                            $_SESSION["yearsign"] = $year;
                            $_SESSION["zodiac"] = $zodiac;                           
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
	//}
    
    // Close connection
    CloseCon($link);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cupid's arrow</title>
	<link rel="shortcut icon" type="image/png" href="images/Heart.png" />
	<link rel="stylesheet" type="text/css" href="css/login.css">
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
	
        

	<div class="wrapper fadeInDown">
    <div id="formContent">
    <!-- Tabs Titles -->
    <a class="active" href="login.php"> Sign In </a>
    <a class="inactive underlineHover" href="register.php">Sign Up </a>

    <!-- Icon -->
   
    <?php 
    if(!empty($login_err)){
        echo '<div class="alert alert-danger">' . $login_err . '</div>';
    }        
    ?> 

    <!-- Login Form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <div class="form-group">
        <input type="text" id="login" name="username" class="fadeIn second form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="login">
        <span class="invalid-feedback"><?php echo $username_err; ?></span>
    </div>  
    <div class="form-group">
        <input type="password" id="password" name="password" class="fadeIn third form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="passwords">
        <span class="invalid-feedback"><?php echo $password_err; ?></span>
    </div>

    <div class="form-group">
        <input type="submit" class="fadeIn fourth" value="Login">
    </div>
    </form>


  

  </div>
  </div>
  <div class = "wrap">
<div class="rhombus2" style = "display: block">
        <div class="circle21"></div>
        <div class="circle22"></div>
    </div>
	</div>
    
	

	</body>
	</html>
