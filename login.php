<?php
require 'conn.php';

session_start();

$username ="";
$password = "";


if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    $result = mysqli_query($conn,"SELECT * FROM data_admin WHERE username = '$username'");
  
    if($username == "" or $password == ""){
      $null = true;
    }else {
      if(mysqli_num_rows($result) === 1 ){
        $row = mysqli_fetch_assoc($result);
        if( $row['username'] == $username and $row['password'] == $password){
          //set session
          $_SESSION['username'] = $username;
  
          header("location:admin/hal-admin.php");
          exit();
        }
      }
      $error = true;
    }
  
  
  } else if (isset($_SESSION['username'])){
    header("location:admin/hal-admin.php");
    exit;
  } else if(isset($_POST['kembali'])){
    header("location:index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Telkom</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="logo">
      <img src="./img/logo.png" alt="Telkom" />
    </div>
    <div class="form-input">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="username" class="form-label">Username :</label>
          <input type="text" class="form-control" id="username" name="username" require/>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password :</label>
          <input type="password" class="form-control" id="password" name="password" require/>
          <label for="show" class="form-label">Show Password</label>
          <input type="checkbox" name="" onclick="myFunction()">
        </div>

        <div class="mb-3">
          <input type="submit" name="login" value="Login" class="btn btn-danger" />
          <input type="submit" name="kembali" value="Kembali" class="btn btn-primary" />
        </div>
      </form>
    <script type="text/javascript">
      function myFunction(){
        var show = document.getElementById('password');
        if (show.type=='password'){
          show.type ='text';
        } else {
          show.type='password';
        }
      }
    </script>
  </body>
</html>
