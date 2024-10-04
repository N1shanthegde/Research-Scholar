<?php
    error_reporting(0);
    session_start();

    if(!isset($_SESSION['sid'])){
        header("location:slogin.php");
    }
    elseif($_SESSION['usertype'] == 'admin'){
        header("location:slogin.php");
    }

    include 'connetdb.php';

    $sid = $_SESSION['sid'];
    $sql = "SELECT * FROM research_scholar  where sid='$sid'";
    $result = mysqli_query($data, $sql);

    $sql1 = "SELECT g.* FROM guide g, research_scholar s where s.guide_id = g.guide_id and g.sid = '$sid'";
    $result1 = mysqli_query($data, $sql1);

    $sql2 = "SELECT * FROM progress_report pr where pr.sid = '$sid'";
    $result2 = mysqli_query($data, $sql2);

    $sql3 = "SELECT * FROM publication p where p.sid = '$sid'";
    $result3 = mysqli_query($data, $sql3);

    $sql4 = "SELECT * FROM conference c where c.sid = '$sid'";
    $result4 = mysqli_query($data, $sql4);

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vdash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> SCHOLAR DASHBOARD</title>
</head>
<body>
    <?php
		include 'scholar_sidebar.php';
	?>
<div class="container">
	<div class="container1">
        <div class="title">SCHOLAR</div>
        <form action="#" method="POST">
            <?php
                while($info = $result->fetch_assoc())
                {
            ?>
            <div class="user-details">
                
                <div class="input-box">
                    <span class="details">Scholar ID:</span>
                    <input type="text" name="sid" id="sid" min="1" value="<?php echo"{$info['sid']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Scholar Name:</span>
			        <input type="text" name="s_name" id="s_name" value="<?php echo"{$info['s_name']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Research Title:</span>
                    <input type="text" name="research_title" id="research_title" value="<?php echo"{$info['research_title']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Designation:</span>
			        <input type="text" name="designation" id="designation" value="<?php echo"{$info['designation']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Center:</span>
			        <input type="text" name="center" id="center" value="<?php echo"{$info['center']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Address:</span>
			        <input type="text" name="address" id="address" value="<?php echo"{$info['address']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Guide ID:</span>
			        <input type="text" name="guide_id" id="guide_id" value="<?php echo"{$info['guide_id']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Mobile Number:</span>
			        <input type="text" name="mobile" id="mobile" value="<?php echo"{$info['mobile']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Email ID:</span>
			        <input type="text" name="email" id="email" value="<?php echo"{$info['email']}";?>" disabled>
                </div>

            </div>
            <div class="button" id="update-btn">
                <?php echo "<a href='update_scholar.php?sid={$info['sid']}'>Update</a>";?>
            </div>
            <?php
                }
                ?>
        </form>
    </div>
	<div class="container1">
        <div class="title"> GUIDE</div>
        <form action="#" method="POST">
            <?php
                while($info1 = $result1->fetch_assoc())
                {
            ?>
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Guide ID:</span>
                    <input type="text" name="guide_id" id="guide_id" min="1" value="<?php echo"{$info1['guide_id']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Guide Name:</span>
			        <input type="text" name="guide_name" id="guide_name" value="<?php echo"{$info1['guide_name']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Institution:</span>
			        <input type="text" name="institution" id="institution" value="<?php echo"{$info1['institution']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Designation:</span>
			        <input type="text" name="post" id="post" value="<?php echo"{$info1['post']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Scholar ID:</span>
			        <input type="text" name="sid" id="sid" value="<?php echo"{$info1['sid']}";?>" disabled>
                </div>
            </div>
            <div class="button" id="update-btn">
            <?php echo "<a href='update_guide.php?guide_id={$info1['guide_id']}'>Update</a>";?>
            </div>
            <?php
                }
            ?>
        </form>
    </div>
	<div class="container1">
        <div class="title">PROGRESS REPORT</div>
        <form action="#" method="POST">
        <?php
                while($info2 = $result2->fetch_assoc())
                {
                ?>
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Scholar ID:</span>
                    <input type="text" name="sid" id="sid" min="1" value="<?php echo"{$info2['sid']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Status:</span>
			        <input type="text" name="status" id="status" value="<?php echo"{$info2['status']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Details:</span>
                    <input type="text" name="details" id="details" value="<?php echo"{$info2['details']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Report Date:</span>
			        <input type="date" name="report_date" id="report_date" value="<?php echo"{$info2['report_date']}";?>" disabled>
                </div>
            </div>
            <div class="button" id="update-btn">
            <?php echo "<a href='update_report.php?sid={$info2['sid']}'>Update</a>";?>
            </div>
            <?php
                }
                ?>
        </form>
    </div>
    <div class="container1">
        <div class="title">PUBLICATION</div>
        <form action="#" method="POST">
        <?php
                while($info3 = $result3->fetch_assoc())
                {
                
                ?>
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Scholar ID:</span>
                    <input type="textws" name="sid" id="sid" min="1" value="<?php echo"{$info3['sid']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Title:</span>
			        <input type="text" name="title" id="title" value="<?php echo"{$info3['title']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="details">Publication Date:</span>
			        <input type="date" name="pub_date" id="pub_date" value="<?php echo"{$info3['pub_date']}";?>" disabled>
                </div>

            </div>
            <div class="button" id="update-btn">
            <?php echo "<a href='update_publicaion.php?sid={$info3['sid']}'>Update</a>";?>
            </div>
            <?php
                }
                ?>
        </form>
    </div>
	<div class="container1">
        <div class="title">CONFERENCE</div>
        <form action="#" method="POST">
        <?php
                while($info4 = $result4->fetch_assoc())
                {
                ?>
            <div class="user-details">
                <div class="input-box">
                    <span class="sid">Scholar ID:</span>
                    <input type="text" name="sid" id="sid" min="1" value="<?php echo"{$info4['sid']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="conference_name">Conference Name:</span>
			        <input type="text" name="conference_name" id="conference_name" value="<?php echo"{$info4['conference_name']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="c_place">Place</span>
			        <input type="text" name="c_place" id="c_place" value="<?php echo"{$info4['c_place']}";?>" disabled>
                </div>
                <div class="input-box">
                    <span class="c_date">Conference Date:</span>
			        <input type="date" name="c_date" id="c_date" value="<?php echo"{$info4['c_date']}";?>" disabled>
                </div>
            </div>
            <div class="button" id="update-btn">
            <?php echo "<a href='update_conference.php?sid={$info4['sid']}'>Update</a>";?>
            </div>
            <?php
                }
                ?>
        </form>
    </div>
    </div>
</body>
</html>