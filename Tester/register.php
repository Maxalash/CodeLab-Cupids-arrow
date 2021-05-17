<?php
// Include config file
require_once "db_connection.php";
 $link=OpenCon();
// Define variables and initialize with empty values
$username = $password = $confirm_password = $name = $surname = $info = $birthday = $yearsign = $zodiac = "";
$username_err = $password_err = $confirm_password_err = $name_err = $surname_err = $info_err = $birthday_err = "";
 
// Processing form data when form is submitted


if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter your name.";
    } else{
        $name = trim($_POST["name"]);
    }

    // Validate surname
    if(empty(trim($_POST["surname"]))){
        $surname_err = "Please enter your surname.";
    } else{
        $surname = trim($_POST["surname"]);
    }

    // Validate birthday
    if(empty(trim($_POST["birthday"]))){
        $birthday_err = "Please enter your birthday.";
    } else{
        $birthday = date('Y-m-d', strtotime($_POST['birthday']));
    }
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM personal WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate info
    if(empty(trim($_POST["info"]))){
        $info_err = "Please type something here.";     
    } else{
        $info = trim($_POST["info"]);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // identifyng numerology
    $numer=0;
    $lowname=strtolower($name);
    for($i = 0; $i < strlen($name); $i++) {
        switch ($name[$i]) {
        case "a": case "j": case "s":
            $numer=$numer+1;
            break;
        case "b": case "k": case "t":
            $numer=$numer+2;
            break;
        case "c": case "l": case "u":
            $numer=$numer+3;
            break;
        case "d": case "m": case "v":
            $numer=$numer+4;
            break;
        case "e": case "n": case "w":
            $numer=$numer+5;
            break;
        case "f": case "o": case "x":
            $numer=$numer+6;
            break;
        case "g": case "p": case "y":
            $numer=$numer+7;
            break;
        case "h": case "q": case "z":
            $numer=$numer+8;
            break;
        case "i": case "r":
            $numer=$numer+9;
            break;
        default:
            $numer=$numer;
        }
    }
    $rest=$numer%10;
    $decima=($numer-$rest)/10;
    $numer=$rest+$decima;

    //identifying year sign
    
    $year=date("Y",strtotime($birthday));
    $year=($year-2000)%12;

    switch($year){
        case 0:
            $yearsign="dragon";
            break;
        case 1:
            $yearsign="snake";
            break;
        case 2:
            $yearsign="horse";
            break;
        case 3:
            $yearsign="sheep";
            break;
        case 4:
            $yearsign="monkey";
            break;
        case 5:
            $yearsign="rooster";
            break;
        case 6:
            $yearsign="dog";
            break;
        case 7:
            $yearsign="pig";
            break;
        case 8:
            $yearsign="rat";
            break;
        case 9:
            $yearsign="ox";
            break;
        case 10:
            $yearsign="togger";
            break;
        case 11:
            $yearsign="rabit";
            break;
        default:
            echo "Oops! Something went wrong. Please try again later.";
    }

    //identifying year sign

    $month=date("m",strtotime($birthday));
    $day=date("j",strtotime($birthday));

    switch($month){
        case 1:
            if($day<20) $zodiac="goat";
            else $zodiac="water-bearer";
            break;
        case 2:
            if($day<19) $zodiac="water-bearer";
            else $zodiac="fish";
            break;
        case 3:
            if($day<21) $zodiac="fish";
            else $zodiac="ram";
            break;
        case 4:
            if($day<20) $zodiac="ram";
            else $zodiac="bull";
            break;
        case 5:
            if($day<21) $zodiac="bull";
            else $zodiac="twins";
            break;
        case 6:
            if($day<22) $zodiac="twins";
            else $zodiac="crab";
            break;
        case 7:
            if($day<23) $zodiac="crab";
            else $zodiac="lion";
            break;
        case 8:
            if($day<23) $zodiac="lion";
            else $zodiac="maiden";
            break;
        case 9:
            if($day<23) $zodiac="maiden";
            else $zodiac="scales";
            break;
        case 10:
            if($day<23) $zodiac="scales";
            else $zodiac="scorpion";
            break;
        case 11:
            if($day<23) $zodiac="scorpion";
            else $zodiac="centaur";
            break;
        case 12:
            if($day<22)$zodiac="centaur";
            else $zodiac="goat";
            break;
        default:
            echo "Oops! Something went wrong. Please try again later.";
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($surname_err) && empty($info_err) && empty($birthday_err)){
        
        // Prepare an insert statement
        $sql="INSERT INTO personal(username, password,name, surname, info, birth, numerology, year_sign, zodiac) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare sql statement
        if($stmt = $link->prepare($sql)){

            // Set parameters
            $param_name = $name;
            $param_surname = $surname;
            $param_birthday = $birthday;
            $param_username = $username;
            $param_info = $info;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_numer=$numer;
            $param_zodiac=$zodiac;
            $param_year=$yearsign;

            // Bind variables to the prepared statement as parameters
            if (!$stmt->bind_param('ssssssiss', $param_username, $param_password, $param_name, $param_surname, $param_info, $param_birthday, $param_numer, $param_year, $param_zodiac)) {
                // echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
                echo '<script language="javascript">';
                echo 'alert("Binding parameters failed: ("'. $stmt->errno . '") "'. $stmt->error.')';
                echo '</script>';
            }
            
            
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                // echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                echo '<script language="javascript">';
                echo 'alert("Execute failed: ("' . $stmt->errno . '") "' . $stmt->error.')';
                echo '</script>';
            }

            // Close statement
            $stmt->close();
        }
        // echo "Prepare failed: (" . $link->errno . ") " . $link->error;
        echo '<script language="javascript">';
        echo 'alert("Prepare failed: ("'. $link->errno . '") "' . $link->error.')';
        echo '</script>';
    }
    
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>	
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	
</head>
<body>
	
     
	<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <a class="inactive underlineHover" href="login.php"> Sign In </a>
    <a class="active" href="register.php">Sign Up </a>

    <!-- Icon -->
   

    <!-- Login Form -->
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="form-group">
            <input type="text" name="name" class=" fadeIn second form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>" placeholder="name">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div> 

        <div class="form-group">
            <input type="text" name="surname" class=" fadeIn second form-control <?php echo (!empty($surname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $surname; ?>" placeholder="surname">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>  

        <div class="form-group">
            <input type="date" name="birthday" class=" fadeIn second form-control <?php echo (!empty($birthday_err)) ? 'is-invalid' : ''; ?>" value="<?php echo date('Y-m-d'); ?>" placeholder="birthday">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>  

        <div class="form-group">
            <input type="text" name="username" class=" fadeIn second form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="username">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>  

        <div class="form-group">
            <textarea id="infoPart" name="info" rows="4" class=" fadeIn second form-control <?php echo (!empty($info_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $info; ?>" placeholder="Hobbies, interests and main points of your ideal partner"></textarea>
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div> 

        <div class="form-group">
            <input type="password" name="password" class="fadeIn third form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="password">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>

        <div class="form-group">
            <input type="password" name="confirm_password" class="fadeIn third form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" placeholder="confirm password">
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
        </div>

        <div class="form-group">
            <input type="submit" class="fadeIn fourth btn btn-primary" value="Submit">
            <input type="reset" class="fadeIn fourth btn btn-secondary ml-2" value="Reset">
        </div>
    </form>
  </div>
  </div>
</body>
</html>
