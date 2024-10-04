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
$sql = "SELECT * FROM progress_report WHERE sid='$sid'";
$result = mysqli_query($data, $sql);
$info = $result->fetch_assoc();

if(isset($_POST['update_report']))
{
    $sid = $_POST['sid'];
    $status = $_POST['status'];
    $details = $_POST['details'];
    $report_date = $_POST['report_date'];
    
    $query = "UPDATE progress_report SET status='$status', details= '$details', report_date= '$report_date' WHERE sid='$sid'";
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
	<!-- <div class="content">
		<center>
		<h1>Update Progress Report</h1>
        <div>
            <form action="" method="POST">
                <div>
    			    <label for="sid">Scholar ID:</label>
                    <input type="text" name="sid" id="sid" min="1" value="<?php echo "{$info['sid']}";?>">
                </div>
                <div>
		    	    <label for="status">Status:</label>
			        <input type="text" name="status" id="status" value="<?php echo "{$info['status']}";?>">
                </div>
                <div>
                    <label for="details">Details:</label>
                    <input type="text" name="details" id="details" value="<?php echo "{$info['details']}";?>">
                </div>
                <div>
		    	    <label for="report_date">Report Date:</label>
			        <input type="date" name="report_date" id="report_date" value="<?php echo "{$info['report_date']}";?>">
                </div>
                <div>
			        <input type="submit" class="btn btn-primary" name="update_report" value = "Update Progress">
                </div>
            </form>
        </div>
        </center>
	</div> -->
    <div class="container1">
        <div class="title">UPDATE PROGRESS REPORT</div>
        <form action="#" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Scholar ID:</span>
                    <input type="text" name="sid" id="sid" min="1"  required value="<?php echo $_SESSION['sid'];?>">
                </div>
                <div class="input-box">
                    <span class="details">Status:</span>
                    <input type="text" name="status" id="status" required value="<?php echo "{$info['status']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Details:</span>
                    <input type="text" name="details" id="details" required value="<?php echo "{$info['details']}";?>">
                </div>
                <div class="input-box">
                    <span class="details">Report Date:</span>
                    <input type="date" name="report_date" id="report_date" required value="<?php echo "{$info['report_date']}";?>">
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Update Progress" name="update_report">
            </div>
        </form>
    </div>
</body>
</html>