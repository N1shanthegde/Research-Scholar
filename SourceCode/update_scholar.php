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
$sql = "SELECT * FROM research_scholar WHERE sid ='$sid'";
$result = mysqli_query($data, $sql);
$info = $result->fetch_assoc();

if(isset($_POST['update_scholar']))
{
    $sid = $_POST['sid'];
    $s_name = $_POST['s_name'];
    $research_title  = $_POST['research_title'];
    $designation = $_POST['designation'];
    $center = $_POST['center'];
    $address = $_POST['address'];
    $guide_id  = $_POST['guide_id'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    
    $query = "UPDATE research_scholar SET s_name='$s_name', research_title= '$research_title', designation='$designation', center= '$center', address='$address', guide_id = '$guide_id', mobile='$mobile', email= '$email' WHERE sid='$sid'";
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
        <div class="title">UPDATE SCHOLAR</div>
        <form action="#" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Scholar ID:</span>
                    <input type="text" name="sid" id="sid" min="1" required value="<?php echo "{$info['sid']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Scholar Name:</span>
                    <input type="text" name="s_name" id="s_name" required value="<?php echo "{$info['s_name']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Research Title:</span>
                    <input type="text" name="research_title" id="research_title" required value="<?php echo "{$info['research_title']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Designation:</span>
                    <input type="text" name="designation" id="designation" required value="<?php echo "{$info['designation']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Center:</span>
                    <input type="text" name="center" id="center" required value="<?php echo "{$info['center']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Address:</span>
                    <input type="text" name="address" id="address" required value="<?php echo "{$info['address']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Guide ID:</span>
                    <input type="text" name="guide_id" id="guide_id" required value="<?php echo "{$info['guide_id']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Mobile Number:</span>
                    <input type="" name="mobile" id="mobile" required value="<?php echo "{$info['mobile']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Email ID:</span>
                    <input type="email" name="email" id="email" required value="<?php echo "{$info['email']}";?>">
                </div>

            </div>
            <div class="button">
                <input type="submit" value="Update Scholar" name="update_scholar">
            </div>
        </form>
    </div>
</body>
</html>