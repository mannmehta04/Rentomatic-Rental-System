<?php include "connect.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="../css/new.css">

</head>
<body>
    <div id="blob"></div>

    <div id="menu">
        <ul class="ul_list">
            <li><a href="../pages/new.php">Home</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Contact Us</a></li>
            <li id="inLink"><a href="../pages/signin.php">Sign In</a></li>
            <!-- <li><a href="../pages/signup.html" class="signup">First Time? Register Now!</a></li> -->
        </ul>
        <ul class="signup">
            <li id="upLink"><a href="../pages/signup.php" class="signup">First Time? Register Now!</a></li>
        </ul>
    </div>

    <div class="titleText">
        RENTOMATIC
    </div>
    <div class="infoText">
        "Renting in Vallabh Vidhyanagar made 'rent-telligently' simple with us!"
    </div>

    <div class="emptyBlock1">
        <div class="dataBlock">
            Ready to find your perfect rental home?
        </div>
        <button class="btn1" onclick="location.href = '../pages/new.php';">
            Find rentals!
        </button>
    </div>
    <div class="emptyBlock2">
        <div class="dataBlock">
            Earn passive income from your property with our rental services!
        </div>
        <button class="btn2" onclick="location.href = '../pages/new.php';">
            Rent your property!
        </button>
    </div>

    <script src="../js/new.js"></script>
    <?php
        if(isset($_SESSION["mail"])){
            $mail = $_SESSION["mail"];
            if(!$mail == NULL){
                // echo "$mail";
                
                $query = "select fname from Users where email = '$mail'";
                $run = mysqli_query($con, $query);
                $data = mysqli_fetch_array($run, MYSQLI_NUM)[0];
                
                if($data){
                    // echo $data;
    ?>
                <script>
                    var link1 = document.getElementById('inLink');
                    var link2 = document.getElementById('upLink');
                    link1.style.display = 'none';
                    link2.style.display = 'none';
                </script>
    <?php
                }
            }
        }
        // else
        // echo "seh lenge thoda";
    ?>
</body>
</html>