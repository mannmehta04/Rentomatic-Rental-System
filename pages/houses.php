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
    <link rel="stylesheet" href="../css/houses.css">

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
    
    <h1>Home is where the heart is, and we've got plenty of them.</h1>

    <!-- Some PHP Code -->

    <div class="houses-container">
        <?php
            $query = "select * from place where isListed=1";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $id=$row['place_id'];
                    // echo "<script>alert($id)</script>";
                    $img=$row['image'];
        ?>
                    <div class="house-card">
                        <img src="../images/<?php echo $img;?>" alt="house" />
                        <h2><?php echo $row['placeName']; ?></h2>
                        <p><?php echo $row['description']; ?></p>
                        <p>Type: <?php echo $row['placeType']; ?></p>
                        <p>Address: <?php echo $row['address']; ?></p>
                        <p>City: <?php echo $row['city']; ?></p>
                        <p>Price per Day: ₹<?php echo $row['price']; ?></p>
                        <?php echo '<a class="buttons" href="particularHouse.php?iid=' .$id. '">View Now!</a>'; ?>      
                    </div>
        <?php }
            } else {
                echo "<script>alert('Currently no Houses are available!');</script>";
                echo "<script>window.location.href='new.php'</script>";
            }
        ?>
    </div>


    
</body>
</html>