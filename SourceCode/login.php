<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="adm.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="container">

				<h4>
					<?php 

					error_reporting(0);
					session_start();
					session_destroy();
					echo $_SESSION["loginMessage"];
					?>
				</h4>

			<div class="form-box">
            <form action="login_check.php" method="POST">
                    <h2>ADMIN LOGIN</h2>
                    <div class="input-box">
                        <input type="text" name="username" required>
                        <label>USERNAME</label>
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" required>
                        <label>PASSWORD</label>
                        <i class='bx bxs-lock-alt' ></i>
                    </div>
                    <button class="btn">LOGIN</button>
					<div class="account-creation">
                         <a href="index.php"> HOME PAGE</a>
                    </div>
            </form>
		</div>
	</div>

</body>
</html>