
<?php

//specifying the credentials for connection

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AIS";



//Create connection
$conn = new mysqli($servername , $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$id = $_GET['userid'];
$sql = "DELETE FROM loginform WHERE id ='$id'";

if (mysqli_query($conn, $sql)) {
  
    header("location:retrieve.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

