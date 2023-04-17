<!-------------------------------- insert data php script ----------------------------------------->


<?php

$sender_id =  $sender_number = $receiver_id = $receiver_number = $sender_address  = $receiver_address = "";

require 'config.php';

if(isset($_POST["submit"]))
{
    $sender_id          = $_POST["sender_id"];
    $sender_number      = $_POST["sender_number"];
    $receiver_id        = $_POST["receiver_id"];
    $receiver_number    = $_POST["receiver_number"];
    $sender_address     = $_POST["sender_address"];
    $receiver_address   = $_POST["receiver_address"];

    $insert = "INSERT INTO express_data(SENDER_ID, SENDER_NUMBER, RECEIVER_ID, RECEIVER_NUMBER, SENDER_ADDRESS, RECEIVER_ADDRESS) 
                VALUES ('$sender_id','$sender_number','$receiver_id','$receiver_number','$sender_address','$receiver_address')";


    $result = mysqli_query($connect, $insert);

    if($result)
    {
        echo "<script>alert('Data inserted successfully')</script>";
        header("location: insert_record.php");
    }
}

mysqli_close($connect);
?>



<!------------------------------------------ display data php function ----------------------------------->

                <?php

               
                function insertdata()
                
                {
                require 'config.php';

                    $fetch = "SELECT * FROM express_data";
                    $result = mysqli_query($connect, $fetch);
    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sender_id = $row["SENDER_ID"];
                        $sender_number = $row["SENDER_NUMBER"];
                        $receiver_id = $row["RECEIVER_ID"];
                        $receiver_number = $row["RECEIVER_NUMBER"];
                        $sender_address = $row["SENDER_ADDRESS"];
                        $receiver_address = $row["RECEIVER_ADDRESS"];
    
    
                        echo "<tr>
                        <th scope='row'>$sender_id.</th>
                        <td>$sender_number</td>
                        <td>$receiver_id</td>
                        <td>$receiver_number</td>
                        <td>$sender_address</td>
                        <td>$receiver_address</td>
                        <td>
                        <a href='update.php?update_id=$sender_id'><i class='bi bi-pencil-square'></i></a>
                        <a href='delete.php?delete_id=$sender_id'><i class='bi bi-trash3-fill text-danger'></i></a>
                        </td>
                        </tr>";
                        }
                    }
                ?>


<!--------------------------------- update data record php script ------------------------------------>

               

               
