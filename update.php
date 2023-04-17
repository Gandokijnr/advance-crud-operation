<?php

$sender_id =  $sender_number = $receiver_id = $receiver_number = $sender_address  = $receiver_address = "";

require 'config.php';

$update_id = $_GET["update_id"];
if(isset($_POST["update"]))
{
    $sender_id          = $_POST["sender_id"];
    $sender_number      = $_POST["sender_number"];
    $receiver_id        = $_POST["receiver_id"];
    $receiver_number    = $_POST["receiver_number"];
    $sender_address     = $_POST["sender_address"];
    $receiver_address   = $_POST["receiver_address"];

    $update = "UPDATE  express_data  SET  SENDER_ID ='$sender_id',`SENDER_NUMBER`='$sender_number',
    RECEIVER_ID ='$receiver_id', RECEIVER_NUMBER ='$receiver_number', SENDER_ADDRESS ='$sender_address', RECEIVER_ADDRESS ='$receiver_address' WHERE SENDER_ID = '$update_id'";

    $update_result = mysqli_query($connect, $update);

    if($update_result)
    {
        echo "<script>alert('Data updated successfully')</script>";
        header("location: insert_record.php");

    }else{
        echo "<script>alert('something went wrong, try again in a minute')</script>";

    }
}



mysqli_close($connect);
?>



<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>

                <!-- bootstrap cdn  -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
                <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
            </head>
            <body class="bg-dark">

            <div class="container-fluid bg-primary">

            <header>
                    <nav>
                        <ul class="d-flex justify-content-between align-items-center my-3 p-3">
                            <div class="brand d-flex align-items-center">
                                    <h2 class="text-light"><a href="insert_record.php" class="text-light text-decoration-none">PT</h2><span class="text-danger fw-bolder">EXPRESS</span></a><i class="bi bi-send text-light"></i>
                            </div>

                            <div class="brand">
                                    <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
               INSERT RECORD
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">ADD NEW POST DATA</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                 
                    <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                               
                                <div class="mb-3 my-4">
                                    <input type="number" required name="sender_id" value="<?php echo rand(100000, 500000) ?>" placeholder="SENDER ID" class="form-control" id="" aria-describedby="">
                                </div>
                        
                                <div class="mb-3 my-4">
                                    <input type="text" required name="sender_number" placeholder="SENDER PHONE NUMBER" class="form-control" id="" aria-describedby="">
                                </div>

                                <div class="mb-3 my-4">
                                    <input type="text" required name="receiver_id" maxlength="6" placeholder="ENTER RECIEVER ID" class="form-control" id="" aria-describedby="">
                                </div>

                                <div class="mb-3 my-4">
                                    <input type="number" required name="receiver_number" placeholder="RECEIVER'S PHONE NUMBER" class="form-control" id="" aria-describedby="">
                                </div>

                                <div class="mb-3 my-4">
                                    <textarea required name="sender_address" placeholder="SENDER'S ADDRESS" class="form-control" id="" aria-describedby=""></textarea>
                                </div>

                                <div class="mb-3 mb-5">
                                    <textarea required name="receiver_address"  placeholder="RECEIVER'S ADDRESS" class="form-control" id="" aria-describedby=""></textarea>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary w-100 fw-bolder p-3 fs-5">Submit</button>
                        </form>                       
                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
                    <a href="search.php" class=" mx-3 p-2 rounded text-light text-decoration-none">SEARCH RECORD</a>
                    </div>
                            
                        </ul>
                    </nav>
                </header>
            </div>

            <hr class="text-info my-5">

            <?php
                require 'config.php';

                $fetch = "SELECT * FROM express_data WHERE SENDER_ID = '$update_id'";
                $result = mysqli_query($connect, $fetch);

                while ($row = mysqli_fetch_assoc($result)) {
                    $sender_id = $row["SENDER_ID"];
                    $sender_number = $row["SENDER_NUMBER"];
                    $receiver_id = $row["RECEIVER_ID"];
                    $receiver_number = $row["RECEIVER_NUMBER"];
                    $sender_address = $row["SENDER_ADDRESS"];
                    $receiver_address = $row["RECEIVER_ADDRESS"];
                }
                    ?>

            <div class="card" style="width: 30%; margin-left: 35%">
                        <div class="card-body">
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                               
                                <div class="mb-3 my-4">
                                    <label for=""></label>
                                    <input type="number" required name="sender_id" value="<?php echo $sender_id ?>" placeholder="SENDER ID" class="form-control" id="" aria-describedby="">
                                </div>
                        
                                <div class="mb-3 my-4">
                                    <input type="text" required name="sender_number" value="<?php echo $sender_number ?>" placeholder="SENDER PHONE NUMBER" class="form-control" id="" aria-describedby="">
                                </div>

                                <div class="mb-3 my-4">
                                    <input type="text" required name="receiver_id" value="<?php echo $receiver_id ?>" maxlength="6" placeholder="ENTER RECIEVER ID" class="form-control" id="" aria-describedby="">
                                </div>

                                <div class="mb-3 my-4">
                                    <input type="number" required name="receiver_number" value="<?php echo $receiver_number ?>" placeholder="RECEIVER'S PHONE NUMBER" class="form-control" id="" aria-describedby="">
                                </div>

                                <div class="mb-3 my-4">
                                    <textarea required name="sender_address" value="<?php echo $sender_address ?>" placeholder="SENDER'S ADDRESS" class="form-control" id="" aria-describedby=""><?php echo $sender_address ?></textarea>
                                </div>

                                <div class="mb-3 mb-5">
                                    <textarea required name="receiver_address" value=""  placeholder="RECEIVER'S ADDRESS" class="form-control" id="" aria-describedby=""><?php echo $receiver_address ?></textarea>
                                </div>

                                <button type="submit" name="update" class="btn btn-primary w-100 fw-bolder p-3 fs-5">UPDATE SETTINGS</button>
                        </form>                       
                    </div>
                        </div>

            </tbody>
            </table>
            </div>


                


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>