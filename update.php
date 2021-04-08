<?php
  
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

  if(isset($_POST['update'])){

        $id = $_POST['id'];
      
        $userN  = $_POST["thisUser"];
        
        $passW  = $_POST["thisPass"];
        
       
        $sql = "UPDATE `loginform` SET `userName`= '$userN',`password`='$passW ' WHERE id = '$id'";
        
        if ($conn->query($sql) === TRUE) {
              echo "<script>alert('Updated successfully');</script>";
              header("location:retrieve.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
       }
         
       }
// if(count($_POST)>0) {
//   mysqli_query($conn,"UPDATE loginform set id='" . $_POST['userid'] . "', username='" . $_POST['username'] . "', password='" . $_POST['password'] . "', status='" . $_POST['status'] . "'  WHERE id='" . $_GET['userid'] . "'");
//   $message = "Record Modified Successfully";
// }
// $result = mysqli_query($conn,"SELECT * FROM loginform WHERE id='" . $_GET['userid'] . "'");
// $row= mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>


<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: beige;
    }

  
    input[type=text],
    input[type=password] {
        width: 100;
        padding: 12px 20px;
        display: flex;
        border: 1px solid #ccc;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100px;
    }

    button:hover {
        opacity: 0.8;
    }


    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 13%;
        border-radius: 50%;
    }
    h2{
        text-align:center;
        margin-top: 6%;
    }
</style>

<body>

    
    <h2>Update Form</h2>
   
    <center>
        <form action="" method="post">
            <div class="imgcontainer">
                <img src="avatar.png" alt="Avatar" class="avatar">
            </div>
    
            <div class="container">
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                <label for="thisUser"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="thisUser" required >
                <br>
                <label for="thisPass"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="thisPass" required>
                <br>
             <button type="submit" name="update" >Update</button>
   
             
            </div>
        </form>
    </center>

    

</body>

</html>

