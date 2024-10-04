<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username'])){
	header("location:login.php");
}
elseif($_SESSION['usertype'] == 'scholar')
{
	header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> ADMIN DASHBOARD</title>

</head>
<body>
	<?php
		include 'admin_sidebar.php';
	?>
	<div class="content">
		
		<h1 style="font-size:50px; margin:15px">Admin Dashboard</h1>

		<p style="font-size:20px; margin:15px">Here you can manage all the Scholars and Guides.</p>
	</div>

</body>
</html>