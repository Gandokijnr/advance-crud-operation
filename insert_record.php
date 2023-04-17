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
                            }
                        }

                        mysqli_close($connect);
                    ?>

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


            <div class="container">
                <table class="table text-light bg-dark">
            <thead>
                <tr>
                <th scope="col">SENDER ID</th>
                <th scope="col">SENDER PHONER NUMBER</th>
                <th scope="col">RECEIVER ID</th>
                <th scope="col">RECIEVER PHONE NUMBER</th>
                <th scope="col">SENDER ADDRESS</th>
                <th scope="col">RECEIVER ADDRESS</th>
                <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
           

            <?php
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
                    <th scope='row'>$sender_id</th>
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

                
                       
            
            ?>

            </tbody>
            </table>
            </div>


                


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>