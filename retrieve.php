<?php
$servername = "localhost";
$username='root';
$password='';
$dbname = "AIS";
$conn=mysqli_connect($servername, $username,$password, $dbname);
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
?>
<?php

$result = mysqli_query($conn,"SELECT * FROM loginform");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Retrieve data</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
 </head>
 <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    margin-top: 2%;
    margin-left:2%;
    margin-right:2%;
    
}
th{ 
    border: 1px solid #dddddd;
    padding: 8px;
    width: 31%;
    background-color: gray;
    color:white;
}

td {
    border: 1px solid #dddddd;
    padding: 8px;
    width: 30%;

}

tr:nth-child(even) {
    background-color: white;
}
body{
    font-family: Arial, Helvetica, sans-serif;
        background-color: beige;
}
#create_id{
    height: 50px;
    width:100px;
    background-color:blue   ;
    color:white;
    margin-top: 1%;
    margin-left: 2%;
    
}
#create_id:hover{
    color:orange;
}
#edit:hover{
   color:red;
 }
 /* #edit{
  background-color:#1BAB3B;
 } */
 #delete{
   
   
   border-radius:13%;
   border:0px;
   padding:8px;
 }
a{
  color:white;
}
a:hover {
    color:red;
}

/* modal css */

.modal-footer{
    background-color: peachpuff;
  }
 .modal-header{
   background-color: peachpuff;
 }
  #exampleModalLongTitle{
    text-align: center;
  }
 input{
   height: 35px;
 }
 #exampleModalLabel{
   font-size:30px;
 }
 </style>

<body>
    
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table>
 <a href="./login.html"><button id="create_id">Create New</button></a>
  <tr>
    <th>USERNAME</th>
    <th>PASSWORD</th>
    <th>STATUS</th>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["userName"]; ?></td>
    <td><?php echo $row["password"]; ?></td>
    <td><?php echo $row["status"]; ?></td>
    <td>
      <a href="update.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">
       Edit
      </a>

    </td>
    <td>
      <a href="delete.php?userid=<?php echo $row["id"]; ?>" id = "delete" class="btn btn-danger">Delete</a>
    </td>
    
    
    
</tr>

<?php
$i++;
}
?>
</table>
 <?php
}
else{ 
  header("location:login.html");
}
?>

 </body>
</html>