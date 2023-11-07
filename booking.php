<?php
    $local =  "localhost"; // Host Name
    $user  =  "root"; // Host Username
    $pass  =  ""; // Host Password
    $db    =  "room_reservation"; // Database Name

    // Establish connection to the database
    $con = new mysqli($local, $user, $pass, $db);
    // if there is a problem, show error message
    if ($con->connect_errno) {
        echo "Failed to connect to MySQL: " . $con->connect_error;
        exit();
    }

    if(isset($_POST["btnReserve"])) {
        #grab * from reservations
        #check if that is the same as the data your about to enter
        #if it is just dont
        #otherwise continue as normal 



        $name = trim($con->real_escape_string($_POST["txtName"]));
        $email = trim($con->real_escape_string($_POST["txtEmail"]));
        $room = trim($con->real_escape_string($_POST["txtRoom"]));
        $date = trim($con->real_escape_string($_POST["txtDate"]));
        $time = trim($con->real_escape_string($_POST["txtTime"]));

        if ($stmt = $con->prepare("INSERT INTO `reservations`(`name`, `email`, `room`, `date_reserved`,`time`) VALUES (?, ?, ?, ?, ?)")) {
            $stmt->bind_param("sssss", $name,$email, $room, $date, $time);
            $stmt->execute();
            $stmt->close();
            header("location: index.php");
        } else {
            die('prepare() failed: ' . htmlspecialchars($con->error));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
</body>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking at Bean & Brew</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/c82e9a37b7.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="style.css"> 
  

    
    
    
</head>
<body>
<section id="booking">
 <section id="booking">
            <div class="row">
            <div class="offset-2 col-8 font-size-xl">
                <div class="bg-secondary text-light rounded  text-center p-3">
                    <h2 class="font-weight-bold">Bean &amp; Brew </h2>
                    <h5>» Booking a Table «</h5>

        
                </div>
                <form action="" method="post" class="my-5">
                    <div class="form-group">
                        <label for="txtName">Name:</label>
                        <input type="text" class="form-control" name="txtName" required="">
                    </div>

                    
                    <div class="form-group">
                        <label for="txtEmail">Email:</label>
                        <input type="text" class="form-control" name="txtEmail" required="">

                    <div class="form-group">
                        <label for="txtRoom">Branch Location:</label>
                        <select class="form-control" name="txtRoom" required="">
                            <option value="Harrogate">Harrogate</option>
                            <option value="Leeds">Leeds</option>
                            <option value="Knaresborough Castle">Knaresborough Castle</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtDate">Date:</label>
                        <input type="text" class="form-control datepicker" name="txtDate" id="txtDate" required="">
                    </div>

                    <div class="form-group">
                        <label for="txtTime">Time:</label>
                        <input type="text" class="form-control timepicker" name="txtTime" id="txtTime" required="">
                    </div>

                    <button type="submit" class="btn btn-dark" name="btnReserve">Reserve Now!</button>
                
            </div></form>
        </div>
    </div></section>




    

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> 
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
                startDate: 'today',
            });

            $('#datatable').DataTable();

            $('#txtDate').keypress(function(e) {
                e.preventDefault();
            });
        });
    </script>
</body>
</html>

