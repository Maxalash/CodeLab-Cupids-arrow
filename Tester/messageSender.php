<?php
session_start();


require_once "db_connection.php";
$link=OpenCon();

$id=$_SESSION["id"];


$freaks=$_POST['freak'];
$tesxer=$_POST['tesx'];


$sql='INSERT INTO `friends`(`person_id`, `friend_id`, `conversation`) VALUES ('.$id.','.$freaks.',"'.$tesxer.'")';
if($stmt = $link->prepare($sql)){
    if($stmt->execute()){
        // Redirect to login page
        echo("message sent");
    } else{
        // echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        echo 'Message failed';
    }
    $stmt->close();
}

$link->close();
?>