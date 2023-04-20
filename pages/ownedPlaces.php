<?php include "connect.php";
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Houses</title>
    <link rel="stylesheet" href="../css/ownedPlaces.css">

    <!-- <link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.4/dist/simplebar.min.css" />
    <script src="https://unpkg.com/simplebar@5.3.4/dist/simplebar.min.js"></script> -->

</head>
<body data-simplebar>
    <div id="menu">
        <ul class="ul_list">
            <li id="homeLink"><a href="../pages/new.php">Home</a></li>
            <li><a href="../pages/houses.php">Gallery</a></li>
            <li><a href="../pages/feedback.php">Contact Us</a></li>
            <?php 
                if((!isset($_SESSION['t_email'])) && (!isset($_SESSION['h_email']))){
            ?>
                <li id="inLink"><a href="../pages/signin.php">Sign In</a></li>
                <li id="upLink"><a href="../pages/signup.php" style="float: right;">First Time? Register Now!</a></li>
            <?php
                }
            ?>
            <?php
                if(isset($_SESSION["h_email"]) || isset($_SESSION["t_email"])){
            ?>
                    <li id="outLink"><a href="../pages/signOut.php">Log Out</a></li>
            <?php
                }
            ?>
            <!-- <li><a href="../pages/signup.html" class="signup">First Time? Register Now!</a></li> -->
        </ul>
        <!-- <ul class="signup">
            
        </ul> -->
    </div>
    
    <h1>Welcome to your rental property showcase - all your houses in one spot.</h1>

    <!-- Some PHP Code -->

    <div class="houses-container">
        <?php
            $t_email = $_SESSION['t_email'];
            $findUser="select traveler_id from traveler where email = '$t_email'";
            $run = mysqli_query($con, $findUser);
            $traveler_id = mysqli_fetch_array($run, MYSQLI_NUM)[0];
            // echo $traveler_id;

            $query = "select place_id, placeName, image, description, startingDate, lastDate, price from place where traveler_id = $traveler_id and isListed = 0";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $id=$row['place_id'];
                    // echo "<script>alert($id)</script>";
                    $img=$row['image'];

                    $total_days = 0;

                    $diff = abs(strtotime($row['lastDate']) - strtotime($row['startingDate']));
                    $total_days = floor($diff / (60*60*24));
                    $total_cost = $total_days * $row["price"];
        ?>
                    <div class="house-card">
                        <img src="../images/<?php echo $img;?>" alt="house" />
                        <h2><?php echo $row['placeName']; ?></h2>
                        <p><?php echo $row['description']; ?></p>

                        <?php
                            $bookingQuery = "SELECT checkInDate, checkOutDate, totalDays, totalCost FROM booking WHERE place_id = $id";
                            $bookingRun = mysqli_query($con, $bookingQuery);
            
                            if (mysqli_num_rows($bookingRun) > 0) {
                                $row = mysqli_fetch_assoc($bookingRun);
            
                                echo "<li>Check In Date: " . $row["checkInDate"] . "</li>";
                                echo "<li>Check Out Date: " . $row["checkOutDate"] . "</li>";
                                echo "<li>Total Staying Days: " . $row["totalDays"] . "</li>";
                                echo "<li>Total Payment: ₹" . $row["totalCost"] . "</li>";
                            }
                        ?>
                        <?php echo '<a class="buttons" href="freeHouse.php?iid=' .$id. '">Leave Place</a>'; ?>
                    </div>
        <?php 
                }
            } else {
                echo "<script>alert('Currently no Houses are reserved!');</script>";
                echo "<script>window.location.href='new.php'</script>";
            }
        ?>
    </div>


    
</body>
</html>