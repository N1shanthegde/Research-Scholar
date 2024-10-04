<?php
error_reporting(0);
include 'connetdb.php';
if($_GET['id']){
    $guideid = $_GET['id'];
    $sql = "DELETE FROM guide where guide_id='$guideid'";
    $result = mysqli_query($data, $sql);
    if($result){
        header("location:view_guide.php");
    }
}
?>