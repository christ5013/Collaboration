
<?php

$userN  = $_GET["thisUser"];
$passW  = $_GET["thisPass"];



////specifying the credentials for connection
//$servername = "192.168.254.100";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AIS";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO loginform(userName, password, status)   
VALUES ('".$userN."', '".$passW."', 'Active')";

if ($conn->query($sql) === TRUE) {
  header("location:retrieve.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>

