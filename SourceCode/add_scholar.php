<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['sid']))
{
	header("location:login.php");
}
elseif($_SESSION['usertype'] == 'admin')
{
	header("location:login.php");
}
include 'connetdb.php';

if(isset($_POST['add_scholar'])){
    $sid = $_POST["sid"];
    $s_name = $_POST["s_name"];
    $research_title = $_POST["research_title"];
    $designation = $_POST["designation"];
    $center = $_POST["center"];
    $address = $_POST["address"];
    $guide_id = $_POST["guide_id"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $check = "SELECT * FROM research_scholar WHERE sid='$sid'";
    $check_guide = mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_guide);
    if($row_count == 1){
        echo "<script type= 'text/javascript'>
        alert('Scholar id already exist.');
        </script>";
    }
    else{        
    
    $sql = "INSERT INTO `research_scholar` (`sid`, `s_name`, `research_title`,  `designation`, `center`, `address`, `guide_id`, `mobile`, `email`) VALUES('$sid', '$s_name', '$research_title', '$designation', '$center', '$address', '$guide_id', '$mobile', '$email')";
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
}

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Sdash.css">
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
		<h1>Add Scholar</h1>
        <div>
            <form action="" method="POST">
                <div>
    			    <label for="sid">Scholar ID:</label>
                    <input type="text" name="sid" id="sid" min="1" value="<?php echo $_SESSION['sid'];?>">
                </div>
                <div>
		    	    <label for="s_name">Scholar Name:</label>
			        <input type="text" name="s_name" id="s_name">
                </div>
                <div>
			        <label for="research_title">Research Title:</label>
			        <input type="text" name="research_title" id="research_title">
                </div>
                <div>
	                <label for="designation">Designation:</label>
			        <input type="text" name="designation" id="designation">
                </div>
                <div>
	                <label for="center">Center:</label>
			        <input type="text" name="center" id="center">
                </div>
                <div>
	                <label for="address">address:</label>
			        <input type="text" name="address" id="address">
                </div>
                <div>
	                <label for="guide_id">Guide ID:</label>
			        <input type="text" name="guide_id" id="guide_id">
                </div>
                <div>
	                <label for="mobile">Mobile Number:</label>
			        <input type="text" name="mobile" id="mobile">
                </div>
                <div>
	                <label for="email">Email ID:</label>
			        <input type="text" name="email" id="email">
                </div>
                <div>
			        <input type="submit" class="btn btn-primary" name="add_scholar" value = "Add Scholar">
                </div>
            </form>
        </div>
        </center>
	</div> -->
    <div class="container1">
        <div class="title">ADD SCHOLAR</div>
        <form action="#" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Scholar ID:</span>
                    <input type="text" name="sid" id="sid" min="1" required value="<?php echo $_SESSION['sid'];?>">
                </div>
                <div class="input-box">
                    <span class="details">Scholar Name:</span>
                    <input type="text" name="s_name" id="s_name" required placeholder="enter Scholar Name">
                </div>
                <div class="input-box">
                    <span class="details">Research Title:</span>
                    <input type="text" name="research_title" id="research_title" required placeholder="enter Research Title">
                </div>
                <div class="input-box">
                    <span class="details">Designation:</span>
                    <input type="text" name="designation" id="designation" required placeholder="enter Designation">
                </div>
                <div class="input-box">
                    <span class="details">Center:</span>
                    <input type="text" name="center" id="center" required placeholder="enter Center">
                </div>
                <div class="input-box">
                    <span class="details">Address:</span>
                    <input type="text" name="address" id="address" required placeholder="enter Address">
                </div>
                <div class="input-box">
                    <span class="details">Guide ID:</span>
                    <input type="text" name="guide_id" id="guide_id" required placeholder="enter Guide ID">
                </div>
                <div class="input-box">
                    <span class="details">Mobile Number:</span>
                    <input type="" name="mobile" id="mobile" required placeholder="enter Mobile Number">
                </div>
                <div class="input-box">
                    <span class="details">Email ID:</span>
                    <input type="email" name="email" id="email" required placeholder="enter Email ID">
                </div>

            </div>
            <div class="button">
                <input type="submit" value="Add Scholar" name="add_scholar">
            </div>
        </form>
    </div>
</body>
</html>