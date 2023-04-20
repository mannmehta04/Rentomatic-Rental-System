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
            <li id="homeLink"><a href="../pages/new.php">Home</a></li>
            <li><a href="../pages/houses.php">Gallery</a></li>
            <li><a href="../pages/feedback.php">Contact Us</a></li>
            <!-- <script>window.location.href="new.php";</script> -->
            <?php
                if(isset($_SESSION["h_email"]) || isset($_SESSION["t_email"])){
                    // $mail = $_SESSION['mail'];
                    // $query = "select host_id from host where email = '$mail'";
                    // $run = mysqli_query($con, $query);
                    // $hostId = mysqli_fetch_array($run, MYSQLI_NUM)[0];

                    // $cookieExpirationTime = time() + (5 * 24 * 60 * 60);
                    // $encodedId = urlencode($hostId);
                    // setcookie("hostId", $encodedId, $cookieExpirationTime,"/");

                    // echo $hostId; returned 1
                    // $_SESSION["hostId"]= $hostId;
                    // echo $_SESSION["hostId"]; returned 1
                    ?>
                    <li id="outLink"><a href="../pages/signOut.php">Log Out</a></li>
                    <?php
                }
                if(isset($_SESSION['h_email'])){
            ?>
                <li id="inLink"><a href="../pages/addListings.php">Add your Listings</a></li>
            <?php
                }
            ?>
            <?php 
                if((!isset($_SESSION['t_email'])) && (!isset($_SESSION['h_email']))){
            ?>
                <li id="inLink"><a href="../pages/signin.php">Sign In</a></li>
            
            
            <!-- <li id="outLink"><a href="../pages/new.php">Log Oaaut</a></li> -->
            <!-- <li><a href="../pages/signup.html" class="signup">First Time? Register Now!</a></li> -->
        </ul>
        
        <ul class="signup">
        <?php
        }
            if(isset($_SESSION['h_email'])){
                    $fetchedMail=$_SESSION['h_email'];
                    $fetchHostQuery=" Select first_name from host where email='$fetchedMail'; ";
                    $run = mysqli_query($con, $fetchHostQuery);
                    $name = mysqli_fetch_array($run, MYSQLI_NUM)[0];
            
                    if(mysqli_query($con, $fetchHostQuery)){
            ?>
                    <li id="inLink"><a>Welcome, <?= $name?></a></li>
            <?php
                    }
                    else {
                        echo "Error!";
                    }
                }
            ?>
            <?php
                if(isset($_SESSION['t_email'])){
                    $fetchedMail=$_SESSION['t_email'];
                    $fetchHostQuery=" Select first_name from traveler where email='$fetchedMail'; ";
                    $run = mysqli_query($con, $fetchHostQuery);
                    $name = mysqli_fetch_array($run, MYSQLI_NUM)[0];
            
                    if(mysqli_query($con, $fetchHostQuery)){
            ?>
                    <li id="inLink"><a>Welcome, <?= $name?></a></li>
            <?php
                    }
                    else {
                        echo "Error!";
                    }
                }
            ?>
            <?php if((!isset($_SESSION['t_email'])) && (!isset($_SESSION['h_email']))){
            ?>
            <li id="upLink"><a href="../pages/signup.php" class="signup">First Time? Register Now!</a></li>
        </ul>
        <?php } ?>
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
        <button class="btn1" onclick="location.href = '../pages/houses.php';">
            Find rentals!
        </button>
    </div>
    <div class="emptyBlock2">
        <div class="dataBlock">
            Check out the houses you've reserved right here!
        </div>
        <button class="btn2" <?php if(!isset($_SESSION['t_email'])){ ?> onclick="alert('Only Logged in Users can View Houses. Make sure you\'re not host.');"; <?php } ?> onclick="location.href = '../pages/ownedPlaces.php';">
            Find your Houses!
        </button>
    </div>
    <script src="../js/new.js"></script>
</body>
</html>