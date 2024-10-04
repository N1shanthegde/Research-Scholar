<?php
    error_reporting(0);
    $login = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'connetdb.php';
        $sid = $_POST["sid"];
        $password = $_POST["password"]; 
        
        
        $sql = "SELECT * from scholar where sid='$sid' AND password='$password'";
        
        $result = mysqli_query($data, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sid'] = $sid;
        
            header("location: scholar_home.php");

        } 
        else{
            $showError = "Invalid Credentials";
        }
    }
        
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="LOGIN.CSS">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
  <body>
    <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo "<script type= 'text/javascript'>
        alert('ERROR!.$showError.');
        </script>";
    }
    ?>

<div class="container">
        <div class="form-box">
            <form action="slogin.php" method="post">
                    <h2>SCHOLAR LOGIN</h2>
                    <div class="input-box">
                        <input type="'text" id="sid" name="sid" required>
                        <label for="sid">SCHOLAR ID</label>
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <label for="password">PASSWORD</label>
                        <i class='bx bxs-lock-alt' ></i>
                    </div>
                    <div class="forget-section">
                     
                        <!-- <a href="#">FORGOT PASSWORD?</a> -->
                    </div>
                    <button type="submit" class="btn">LOGIN</button>
                    
                    <div class="account-creation">
                        <span>DONT HAVE AN ACCOUNT ?  <a href="sregister.php">  REGISTER NOW</a></span>
                    </div>
                    <div class="account-creation">
                         <a href="index.php"> HOME PAGE</a>
                    </div>
            </form>
        </div>
   </div>
  </body>
</html>
 