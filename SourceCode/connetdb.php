<?php
$data = mysqli_connect("localhost","root","","scholardb");
if(!$data)
{
    die ("Can't connect to database because ". mysqli_connect_error());
}

?>