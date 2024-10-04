<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username'])){
	header("location:login.php");
}
elseif($_SESSION['usertype'] == 'scholar')
{
	header("location:login.php");
}
include 'connetdb.php';
$sql = "SELECT * FROM publication";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> ADMIN DASHBOARD</title>
</head>
<body>
	<?php
		include 'admin_sidebar.php';
	?>
    <div class="main">
        <div class="tabular">
            <h3 class="maintitle">PUBLICATION</h3>
            <div class="tablecontainer">
                <table>
                    <thead>
                <tr> 
                    <th>Scholar ID</th>
                    <th>Title</th>
                    <th>Publised Date</th>
                    <th>Delete</th>
                </tr>
                <?php
                while($info = $result->fetch_assoc())
                {
                ?>
                <tr>
                    <td><?php echo"{$info['sid']}";?></td>
                    <td><?php echo"{$info['title']}";?></td>
                    <td><?php echo"{$info['pub_date']}";?></td>
                    <td>
                        <?php echo"<a onClick=\"javascript:return confirm('are you sure to delete');\" href='delete_publication.php?id={$info['title']}'>Delete</a>";?>
                    </td>
                </tr>
                <?php
                }
                ?>
                               </thead>
                </table>
	        </div>
	    </div>
	</div>
</body>
</html>