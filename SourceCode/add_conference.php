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

if(isset($_POST['add_conference'])){
    $sid = $_POST["sid"];
    $conference_name = $_POST["conference_name"];
    $c_place = $_POST["c_place"];
    $c_date = $_POST["c_date"];
    $sql = "INSERT INTO `conference` (`sid`, `conference_name`, `c_place`, `c_date`) VALUES('$sid', '$conference_name', '$c_place', '$c_date')";
    $insert = mysqli_query($data, $sql);
    if($insert)
    {
        echo "<script type= 'text/javascript'>
        alert('data uploaded sucessfully');
        </script>";
    }
    else{
        echo "<script type= 'text/javascript'>
        alert('data uploaded failed');
        </script>";
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
	<div class="container1">
        <div class="title">ADD CONFERENCE</div>
            <form action="#" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Scholar ID:</span>
                        <input type="text" name="sid" id="sid" required value="<?php echo $_SESSION['sid'];?>">
                    </div>
                    <div class="input-box">
                        <span class="details">Conference Name:</span>
                        <input type="text" name="conference_name" id="conference_name" required placeholder="enter conference name">
                    </div>
                    <div class="input-box">
                        <span class="details">Place:</span>
                        <input type="text" name="c_place" id="c_place" required placeholder="enter conference place">
                    </div>
                    <div class="input-box">
                        <span class="details">Conference Date:</span>
                        <input type="date" name="c_date" id="c_date" required >
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Add Conference" name="add_conference">
                </div>
            </form>
        </div>
    </div>

</body>
</html>