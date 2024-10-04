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
include 'connetdb.php';

if(isset($_POST['add_publication'])){
    $sid = $_POST["sid"];
    $title = $_POST["title"];
    $pub_date = $_POST["pub_date"];
    $sql = "INSERT INTO `publication` (`sid`, `title`,`pub_date`) VALUES('$sid', '$title', '$pub_date')";
    $result = mysqli_query($data, $sql);
    if($result)
    {
        echo "<script type= 'text/javascript'>
        alert('data uploaded sucessfully');
        </script>";
    }
    else{
        echo " data uploaded failed";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sdash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> SCHOLAR DASHBOARD</title>

</head>
<body>
	<?php
		include 'scholar_sidebar.php';
	?>
	<!-- <div class="content">
		<center>
		<h1>Add Publication</h1>
        <div>
            <form action="" method="POST">
                <div>
    			    <label for="sid">Scholar ID:</label>
                    <input type="textws" name="sid" id="sid" min="1" value="<?php echo $_SESSION['sid'];?>">
                </div>
                <div>
			        <label for="title">Title:</label>
			        <input type="text" name="title" id="title">
                </div>
                <div>
	                <label for="pub_date">Publication Date:</label>
			        <input type="date" name="pub_date" id="pub_date">
                </div>
                <div>
			        <input type="submit" class="btn btn-primary" name="add_publication" value = "Add Publication">
                </div>
            </form>
        </div>
        </center>
	</div> -->
    <div class="container1">
        <div class="title">ADD PUBLICATION</div>
        <form action="#" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Scholar ID:</span>
                    <input type="text" name="sid" id="sid" min="1" required value="<?php echo $_SESSION['sid'];?>">
                </div>
                <div class="input-box">
                    <span class="details">Title:</span>
                    <input type="text" name="title" id="title" required placeholder="enter Title">
                </div>
                <div class="input-box">
                    <span class="details">Publication Date:</span>
                    <input type="date" name="pub_date" id="pub_date" required placeholder="enter Publication Date">
                </div>

            </div>
            <div class="button">
                <input type="submit" value="Add Publication" name="add_publication">
            </div>
        </form>
    </div>
</body>
</html>