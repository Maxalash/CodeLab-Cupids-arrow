<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "makhmoud";
 $dbpass = "11ko25sh";
 $db = "cupids_arrow";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 if($conn === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}

 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>

