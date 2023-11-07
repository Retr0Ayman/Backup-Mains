<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 433px;
    }
    #btn{}
    </style>

</head>

<body>
    <?php include '_header.php';?> <!-- Generates the header  -->
    <?php include '_dbconnect.php';?> <!-- Connects to the database -->
    <?php if (isset($user)): ?> <!--  -->
        
        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
        
        <p><a href="logout.php">Log Out</a></p> <!-- Links to the logout button -->
        
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">Sign Up</a></p> <!-- Gives the prompt for the user to either Log in, or Sign Up. -->
        
    <?php endif; ?>
    

    <!--Slider starts here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100 h-100" src="img/slider-1.jpg" alt="First slide">

            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-100" src="img/slider-2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100 h-100" src="img/slider-3.jpg" alt="Third slide">
	        
            <!-- Lines above and below refering 'Carousel' are the images on display for the 3 sliding images -->
                
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span> <!-- The arrow on the carousel that lets you manually go back to the previous image -->
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span> <!-- The arrow on the carousel that lets you manually go forward to the next image-->
        </a>
    </div>

    <!-- Container here -->
<div id="welcomebackground">
    <div class="container my-3">
        <h2 class="text-center my-3">Welcome to Bean & Brew <!-- The title for Bean & Brew at the home page-->
            <div class="row my-3">
              <!-- Fetch all the categories  -->
              <!-- Use a loop to iterate through categoriess -->
                <?php 
                $sql = "SELECT * FROM `categories`"; 
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    // echo $row['category_id'];
                    //echo $row['category_name'];
                    $cat = $row['category_name']; 
                    $desc = $row['category_description'];
                    echo '<div class="col-md-4 my-2">
                    
                        <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/400x300/?' . $cat . ',cafe," class="card my-2-img-top" alt..."> 
                        <img src="https://source.unsplash.com/400x300/?' . $cat . ',caffeine," class="card my-2-img-top" alt..."> 
                        
                        <div class="card-body">
                            <h5 class="card-title">' . $cat . '</h4> 
                            <p class="card-text">' .substr($desc, 0, 200). '</p>
                            <a href="shop.php" class="btn btn-primary">View More</a>
                        </div>
                    </div> 
                </div>';
         }
        ?>
              

                </div>
</div>



 <!-- BOOSTRAPN -->
            </div>
    </div> 
    <?php include '_footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>





    
    
    
    
    
    
    
    
    
    
    