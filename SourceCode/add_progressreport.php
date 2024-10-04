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

    if(isset($_POST['add_report'])){
        $sid = $_POST["sid"];
        $status = $_POST["status"];
        $details = $_POST["details"];
        $report_date = $_POST["report_date"];
        $sql = "INSERT INTO `progress_report` (`sid`, `status`, `details`, `report_date`) VALUES('$sid', '$status', '$details', '$report_date')";
        $insert = mysqli_query($data, $sql);
        if($insert)
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
		<h1>Add Progress Report</h1>
        <div>
            <form action="" method="POST">
                <div>
    			    <label for="sid">Scholar ID:</label>
                    <input type="text" name="sid" id="sid" min="1" value="<?php echo $_SESSION['sid'];?>">
                </div>
                <div>
		    	    <label for="status">Status:</label>
			        <input type="text" name="status" id="status">
                </div>
                <div>
                    <label for="details">Details:</label>
                    <input type="text" name="details" id="details">
                </div>
                <div>
		    	    <label for="report_date">Report Date:</label>
			        <input type="date" name="report_date" id="report_date">
                </div>
                <div>
			        <input type="submit" class="btn btn-primary" name="add_report" value = "Add Progress">
                </div>
            </form>
        </div>
        </center>
	</div> -->
    <div class="container1">
        <div class="title">ADD PROGRESS REPORT</div>
        <form action="#" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Scholar ID:</span>
                    <input type="text" name="sid" id="sid" min="1" required value="<?php echo $_SESSION['sid'];?>">
                </div>
                <div class="input-box">
                    <span class="details">Status:</span>
                    <input type="text" name="status" id="status" required placeholder="enter Status">
                </div>
                <div class="input-box">
                    <span class="details">Details:</span>
                    <input type="text" name="details" id="details" required placeholder="enter Details">
                </div>
                <div class="input-box">
                    <span class="details">Report Date:</span>
                    <input type="date" name="report_date" id="report_date" required placeholder="enter Report Date">
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Add Progress" name="add_report">
            </div>
        </form>
    </div>
</body>
</html> 