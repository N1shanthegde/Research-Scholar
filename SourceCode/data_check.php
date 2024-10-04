<?php
error_reporting(0);
session_start();
include 'connetdb.php';
if($data === false){
     die("connection error!!");
}
if(isset($_POST['apply'])){
    $data_name = $_POST['name'];
    $data_email = $_POST['email'];
    $data_phone = $_POST['phone'];
    $data_message = $_POST['message'];

    $sql = "INSERT INTO contact_us(name, email, phone, message) VALUES('$data_name', '$data_email', '$data_phone', '$data_message')";

    $result = mysqli_query($data, $sql);

    if($result){
        $_SESSION['message'] = "Your applicaion sent successful";
        header("location:index.php");
    }
    else{
        $_SESSION['message'] = "Error in sending your application!";
        header("location:index.php");
    }
 }
?>