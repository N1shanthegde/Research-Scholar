<?php

error_reporting(0);
session_start();
session_destroy();
if($_SESSION['message']){
	$message = $_SESSION['message'];
	echo "<script type='text/javascript'>
	alert('$message');
	</script>";
}

include 'connetdb.php';

$sql = "SELECT distinct(s.sid), s.s_name, g.guide_name, s.research_title, pr.status, s.center, s.designation FROM research_scholar s, guide g, progress_report pr, publication p, conference c 
WHERE s.sid = pr.sid AND s.guide_id = g.guide_id " ;
$result = mysqli_query($data, $sql);
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="page1.css">
</head>
<body>

	<header>
        <h2 class="logo" >RESEARCH SCHOLAR</h2>
        <nav class="navbar">
            <a href="#" class="active">HOME</a>
            <a href="#our_scholar">OUR SCHOLARS</a>
            <a href="#contact_form">CONTACT US</a>
            <a href="login.php">ADMIN LOGIN</a>
            <a href="slogin.php">SCHOLOR LOGIN</a>
            <a href="about-us.html">ABOUT US</a>
        </nav>
    </header>
	<section class="paralax">
        <img src="p10.jpg" id="hill1">
        <h2 id="text">Welcome to Research Scholar Portal</h2>
    </section>
	<section class="sec">
        <h2 id="our_scholar">OUR SCHOLARS</h2>
        <div class="table">
            <div class="tabrow" id="tablehead">
			<div class="tabcell"><p1>SCHOLAR ID</p1></div>
            <div class="tabcell"><p1>SCHOLAR NAME</p1></div>
            <div class="tabcell"><p1>SUPREVISOR</p1></div>
            <div class="tabcell"><p1>RESEARCH TITLE</p1></div>
            <div class="tabcell"><p1>PRESENT STATUS</p1></div>
            <div class="tabcell"><p1>CENTER</p1></div>
            <div class="tabcell"><p1>SCHOLAR DESIGNATION</p1></div>
            </div>
	

                <?php
                while($info = $result->fetch_assoc())
                {
                ?>
            <div class="tabrow">
                <div class="tabcell"><p1><?php echo"{$info['sid']}";?></p1></div>
                <div class="tabcell"><p1><?php echo"{$info['s_name']}";?></p1></div>
                <div class="tabcell"><p1><?php echo"{$info['guide_name']}";?></p1></div>
                <div class="tabcell"><p1><?php echo"{$info['research_title']}";?></p1></div>
                <div class="tabcell"><p1><?php echo"{$info['status']}";?></p1></div>
                <div class="tabcell"><p1><?php echo"{$info['center']}";?></p1></div>
                <div class="tabcell"><p1><?php echo"{$info['designation']}";?></p1></div>
            </div>
                <?php
                }
                ?>
        </div>
    </section>
		

	<section class="contactus">
    <h3>CONTACT US</h3>
    <div id="contact">
        <div class="container">
            <div class="row">
                </div>
                <div class="contact-right" id='contact_form'>
                    <form action="data_check.php" method="POST">
                        <input type="text" name="name" placeholder="Your Name" required>
                        <input type="email" name="email" placeholder="Your Email" required>
                        <input type="" name="phone" placeholder="Your Phone Number" required>
                        <textarea name="message" rows="6" placeholder="Your Message"></textarea>
                        <button type="submit" class="btn btn2" name="apply">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
        <div class="copyright">
            <p>All Copyrights reserved &copy; 2024</p>
        </div>
    </div>


</body>
</html>
