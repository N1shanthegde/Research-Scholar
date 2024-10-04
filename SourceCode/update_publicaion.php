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
$sql = "SELECT * FROM publication WHERE sid='$sid'";
$result = mysqli_query($data, $sql);
$info = $result->fetch_assoc();

if(isset($_POST['update_publication']))
{
    
    $sid = $_POST['sid'];
    $title = $_POST['title'];
    $pub_date = $_POST['pub_date'];
    
    $query = "UPDATE publication SET title='$title', pub_date= '$pub_date' WHERE sid='$sid'";
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
        <div class="title">UPDATE PUBLICATION</div>
        <form action="#" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Scholar ID:</span>
                    <input type="text" name="sid" id="sid" min="1" required value="<?php echo "{$info['sid']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Title:</span>
                    <input type="text" name="title" id="title" required value="<?php echo "{$info['title']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Publication Date:</span>
                    <input type="date" name="pub_date" id="pub_date" required value="<?php echo "{$info['pub_date']}";?>">
                </div>

            </div>
            <div class="button">
                <input type="submit" value="Update Publication" name="update_publication">
            </div>
        </form>
    </div>
</body>
</html>