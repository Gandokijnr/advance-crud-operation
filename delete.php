<?php
require 'config.php';


$delete_id = $_GET["delete_id"];

$DELETE = "DELETE FROM express_data WHERE SENDER_ID = $delete_id";

$delete_result = mysqli_query($connect, $DELETE);

if($delete_result)
{
    echo "<script>alert('Data inserted successfully')</script>";
    header("location: insert_record.php");

}

?>