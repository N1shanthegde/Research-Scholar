<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['sid']))
{
	header("location:slogin.php");
}
elseif($_SESSION['usertype'] == 'admin')
{
	header("location:slogin.php");
}


?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> SCHOLAR DASHBOARD</title>
</head>
<body>
	<?php
		include 'scholar_sidebar.php';
	?>
	<div class="content">
		
		<h1 style="padding:20px; font-size:60px">Welcome - <?php echo $_SESSION['sid'];?></h1>

		<p style="padding:20px; font-size:30px">Here you can add and update your details.</p>
	</div>

</body>
</html>