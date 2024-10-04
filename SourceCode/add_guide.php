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

if(isset($_POST['add_guide'])){
    $guide_id = $_POST["guide_id"];
    $guide_name = $_POST["guide_name"];
    $institution = $_POST["institution"];
    $post = $_POST["post"];
    $sid = $_POST['sid'];
    // $usertype = "scholar";
    $check = "SELECT * FROM guide WHERE guide_id='$guide_id'";
    $check_guide = mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_guide);
    if($row_count == 1){
        echo "<script type= 'text/javascript'>
        alert('Guide id already exist. Continue with add scholar ');
        </script>";
    }
    else{        
    
    $sql = "INSERT INTO `guide` (`guide_id`, `guide_name`, `institution`, `post`, `sid`) VALUES ('$guide_id', '$guide_name', '$institution', '$post', '$sid')";
    $result = mysqli_query($data, $sql);
    if($result)
    {
        echo "<script type= 'text/javascript'>
        alert('RECORD INSERTED SUCCESSFULLY.');
        </script>";
    }
    else{
        echo '<div class="alert alert-danger my-3" role="alert">
        <h4 class="alert-heading">Error!</h4>
        <p>Can\'t Insert the record.</p>
        <hr>
        <p class="mb-0">' . mysqli_error($data) . '</p>
      </div>';
    }
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
		<h1>Add Guide</h1>
        <div>
            <form action="" method="POST">
                <div>
    			    <label for="guide_id">Guide ID:</label>
                    <input type="textw" name="guide_id" id="guide_id" min="1">
                </div>
                <div>
		    	    <label for="guide_name">Guide Name:</label>
			        <input type="text" name="guide_name" id="guide_name">
                </div>
                <div>
			        <label for="institution">Institution</label>
			        <input type="text" name="institution" id="institution">
                </div>
                <div>
	                <label for="post">Post:</label>
			        <input type="text" name="post" id="post">
                </div>
                <div>
	                <label for="sid">Scholar ID:</label>
			        <input type="text" name="sid" id="sid" value="<?php echo $_SESSION['sid'];?>">
                </div>
                <div>
			        <input type="submit" class="btn btn-primary" name="add_guide" value = "Add Guide">
                </div>
            </form>
        </div>
        </center>
	</div> -->
    <div class="container1">
        <div class="title">ADD Guide</div>
        <form action="#" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <!-- <span class="guide_id" for="guide_id">Guide ID:</span> --><label for="guide_id">Guide ID:</label>
                    <input type="text" name="guide_id" id="guide_id" placeholder="enter Your Guide ID" required>
                </div>
                <div class="input-box">
                    <span class="guide_name"  for="guide_name">Guide Name:</span>
                    <input type="text" name="guide_name" id="guide_name" required placeholder="enter guide name">
                </div>
                <div class="input-box">
                    <span class="details" for="institution">Institution:</span>
                    <input type="text" name="institution" id="institution" required placeholder="enter Institution">
                </div>
                <div class="input-box">
                    <span class="details" for="post">Designation:</span>
                    <input type="text" name="post" id="post"  required placeholder="enter designation">
                </div>
                <div class="input-box">
                    <span class="details" for="sid">Scholar ID:</span>
                    <input type="text" name="sid"  id="sid" required  value="<?php echo $_SESSION['sid'];?>">
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Add Guide" name="add_guide">
            </div>
        </form>
    </div>
</body>
</html>