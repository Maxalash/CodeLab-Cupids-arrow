<?php
$dbhost = "localhost";
$dbuser = "makhmoud";
$dbpass = "11ko25sh";
$db = "cupids_arrow";
$mysqli = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $mysqli -> error);
if ($mysqli->connect_errno) {
   echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo '<script language="javascript">';
echo 'alert("connection success")';
echo '</script>';
$sql="INSERT INTO personal(username, password,name, surname, info, birth, numerology, year_sign, zodiac) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
/* Prepared statement, stage 1: prepare */
if (!($stmt = $mysqli->prepare($sql))) {
     echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
echo '<script language="javascript">';
echo 'alert("statement prepared")';
echo '</script>';

//($param_username, $param_password, $param_name, $param_surname, $param_info, $param_birthday, $param_numer, $param_year, $param_zodiac)

/* Prepared statement, stage 2: bind and execute */
$password="11ko25sh";
$param_name = "Makhmoud";
$param_surname = "Zhantleuov";
$param_birthday = "2002-11-18";
$param_username = "makhmoud";
$param_info = "spmth nor asdfaihsdfulajlsf";
$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
$param_numer=6;
$param_zodiac="scorpion";
$param_year="horse";

// mysqli_stmt_bind_param($stmt, 'ssssssiss', $param_username, $param_password, $param_name, $param_surname, $param_info, $param_birthday, $param_numer, $param_year, $param_zodiac);

$description = "maxalash";
if (!$stmt->bind_param('ssssssiss', $param_username, $param_password, $param_name, $param_surname, $param_info, $param_birthday, $param_numer, $param_year, $param_zodiac)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}
echo '<script language="javascript">';
echo 'alert("statement binded")';
echo '</script>';

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}
echo '<script language="javascript">';
echo 'alert("statement executed")';
echo '</script>';

/* explicit close recommended */
$stmt->close();
echo '<script language="javascript">';
echo 'alert("stmt closed")';
echo '</script>';

$mysqli->close();
echo '<script language="javascript">';
echo 'alert("connection closed")';
echo '</script>';
?>