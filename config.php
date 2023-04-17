<?php
$connect = mysqli_connect('localhost', 'root', '', 'express_db');

if(!$connect)
{
    die("something went wrong" . mysqli_connect_error());
}
?>