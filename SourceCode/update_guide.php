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
$guide_id = $_GET['guide_id'];
$sql = "SELECT * FROM guide WHERE guide_id ='$guide_id'";
$result = mysqli_query($data, $sql);
$info = $result->fetch_assoc();

if(isset($_POST['update_guide']))
{
    $guide_id = $_POST['guide_id'];
    $guide_name = $_POST['guide_name'];
    $institution = $_POST['institution'];
    $post = $_POST['post'];
    $sid = $_POST['sid'];
    $query = "UPDATE guide SET  guide_name='$guide_name', institution='$institution', post= '$post' WHERE guide_id='$guide_id'";
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
        <div class="title">UPDATE Guide</div>
        <form action="#" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Guide ID:</span>
                    <input type="text" name="guide_id" id="guide_id" value="<?php echo "{$info['guide_id']}";?>" required>
                </div>
                <div class="input-box">
                    <span class="details">Guide Name:</span>
                    <input type="text" name="guide_name"  required value="<?php echo "{$info['guide_name']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Institution:</span>
                    <input type="text" name="institution"  required value="<?php echo "{$info['institution']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Designation:</span>
                    <input type="text" name="post"  required value="<?php echo "{$info['post']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Scholar ID:</span>
                    <input type="text" name="sid"  value="<?php echo "{$info['sid']}";?>" required>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Update Guide" name="update_guide">
            </div>
        </form>
    </div>
</body>
</html>