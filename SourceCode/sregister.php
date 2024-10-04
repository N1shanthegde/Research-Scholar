<?php
error_reporting(0);
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connetdb.php';
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $sid = $_POST["sid"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists=false;
    if(($password == $cpassword) && $exists==false){
        $sql = "INSERT INTO `scholar` (`name`, `email`, `phone`, `sid`, `password`, `date`) VALUES ('$name', '$email', '$phone','$sid', '$password', current_timestamp())";
        $result = mysqli_query($data, $sql);
        if ($result){
            $showAlert = true;
        }
    }
    else{
        $showError = "Passwords do not match";
    }
}
    
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholar Register</title>
    <link rel="stylesheet" href="SCHOLORREG.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
  <body>
  
    <?php
    if($showAlert){
       echo '<script type="text/javascript">
        alert("SUCCESS! Your account is now created and you can LOGIN.");
        </script>';
        
    }
    if($showError){
        echo "<script type= 'text/javascript'>
        alert('ERROR!.$showError.');
        </script>";
    }
    ?>
    <div class="container">
        <div class="form-box">
            <form action="#" method="post">
                    <h2>SCHOLAR REGISTER</h2>
                    <div class="input-box">
                        <input type="text" id="name" name="name" required>
                        <label for="name">NAME</label>
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="email" id="email" name="email" required>
                        <label for="email">EMAIL ID</label>
                        <i class='bx bx-envelope' ></i>
                    </div>
                    <div class="input-box">
                        <input type="number" id="phone" name="phone" required>
                        <label for="phone">PHONE NO.</label>
                        <i class='bx bxs-contact' ></i>
                    </div>
                    <div class="input-box">
                        <input type="text" id="sid" name="sid" required>
                        <label for="sid">SCHOLAR ID</label>
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" id="password" name="password" required>
                        <label for="password">PASSWORD</label>
                        <i class='bx bxs-lock-alt' ></i>
                    </div>
                    <div class="input-box">
                        <input type="password" id="cpassword" name="cpassword" required>
                        <label for="cpassword">CONFIRM PASSWORD</label>
                        <i class='bx bxs-lock-alt' ></i>
                    </div>
                   
                    <button type="submit" class="btn">SIGN UP</button>
                    <div class="account-creation">
                        <span>ALREADY HAVE AN ACCOUNT ?  <a href="slogin.php">  LOGIN NOW</a></span>
                    </div>
                    <div class="account-creation">
                         <a href="index.php"> HOME PAGE</a>
                    </div>
                    
            </form>
        </div>
   </div>
  </body>
</html>
