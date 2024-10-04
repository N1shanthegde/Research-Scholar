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
$sid = $_GET['sid'];
$sl_no = $_GET['sl_no'];
$sql = "SELECT * FROM conference WHERE sid = '$sid'";
$result = mysqli_query($data, $sql);
$info = $result->fetch_assoc();

if(isset($_POST['update_conference']))
{
    
    $sid = $_POST['sid'];
    $conference_name = $_POST['conference_name'];
    $c_place = $_POST['c_place'];
    $c_date = $_POST['c_date'];
    
    $query = "UPDATE conference SET conference_name='$conference_name', c_place= '$c_place', c_date= '$c_date' WHERE sid='$sid'";
    $result2 = mysqli_query($data, $query);
    if($result2){
        header("location:view_details.php");
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
        <div class="title">UPDATE CONFERENCE</div>
        <form action="#" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Scholar ID:</span>
                    <input type="text" name="sid" id="sid" min="1" required value="<?php echo "{$info['sid']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Conference Name:</span>
                    <input type="text" name="conference_name" id="conference_name" required value="<?php echo "{$info['conference_name']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Place</span>
                    <input type="text" name="c_place" id="c_place" required value="<?php echo "{$info['c_place']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Conference Date:</span>
                    <input type="date" name="c_date" id="c_date" required value="<?php echo "{$info['c_date']}";?>">
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Update Confference" name="update_conference">
            </div>
        </form>
    </div>
</body>
</html>