<?php include "connect.php";
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>

    <link rel="stylesheet" href="../css/purchase.css">
</head>
<body>
    <!-- <div id="menu">
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
        </ul>
    </div> -->
    <div class="house-details">
        <?php
            $id=$_REQUEST['iid'];

            $query = "SELECT placeName, placeType, price, startingDate, lastDate, image FROM place WHERE place_id = $id";
            $run = mysqli_query($con, $query);

            if (mysqli_num_rows($run) > 0) {
                $row = mysqli_fetch_assoc($run);
                $img=$row['image'];

                $total_days = 0;
                $diff = abs(strtotime($row['lastDate']) - strtotime($row['startingDate']));
                $total_days = floor($diff / (60*60*24));
                $total_cost = $total_days * $row["price"];

                echo "<h2>Purchase Details</h2>";
                echo "<ul>";
                echo "<img src='../images/$img' alt='house' />";
                echo "<li>Place Name: " . $row["placeName"] . "</li>";
                echo "<li>Place Type: " . $row["placeType"] . "</li>";

                $bookingQuery = "SELECT checkInDate, checkOutDate, totalDays, totalCost FROM booking WHERE place_id = $id";
                $bookingRun = mysqli_query($con, $bookingQuery);

                if (mysqli_num_rows($bookingRun) > 0) {
                    $row = mysqli_fetch_assoc($bookingRun);

                    echo "<li>Check In Date: " . $row["checkInDate"] . "</li>";
                    echo "<li>Check Out Date: " . $row["checkOutDate"] . "</li>";
                    echo "<li>Total Staying Days: " . $row["totalDays"] . "</li>";
                    echo "<li>Total Payment: ₹" . $row["totalCost"] . "</li>";
                }

                echo "</ul>";

                echo '                    
                    <h2>Credit Card Details</h2><br>
                    
                    <form action="" method="post" class="form">

                    <table>
                        <tr>
                            <td>
                                <div class="inputContainer">
                                    <input type="text" class="input" placeholder="test" id="card-number" name="card-number" pattern="[0-9]{16}" required>
                                    <label for="card-number" class="label">Card Number</label>
                                </div>
                            </td>

                            <td>
                                <div class="inputContainer">
                                    <input type="month" class="input" placeholder="a" id="card-expiry" name="card-expiry" required>
                                    <label for="card-expiry" class="label">Expiration Date</label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="inputContainer">
                                    <input type="password" class="input" placeholder="a" id="card-cvv" name="card-cvv" pattern="[0-9]{3,4}" required>
                                    <label for="card-cvv" class="label">CVV</label>
                                </div>
                            </td>

                            <td>
                                <div class="inputContainer">
                                    <input type="text" class="input" placeholder="a" id="card-name" name="card-name" required>
                                    <label for="card-name" class="label">Cardholder Name</label>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <input class="buttons" onclick="location.href = `../pages/cancelProcess.php?iid=' .$id. '` ;" type="button" value="Go Back">
                    <input class="buttons" onclick="location.href = `../pages/userOrHost.php?iid=' .$id. '` ;" type="submit" name="confirmPurchase" value="Confirm">
                    </form>
                    ';

                // echo '<a class="buttons" href="x.php">Confirm</a>';
            } else {
                echo "<script>alert('Error while Completing Transaction');</script>";
            }

            // if(isset($_POST['confirmPurchase'])){
            //     $query="UPDATE place SET isListed = '0' WHERE place_id = $id;";
            //     if(mysqli_query($con, $query)){
            //         // header('Location: ./listings.php');
            //         // echo "Data inserted successfully";
            //         echo "<script>alert('Purchase Completed');</script>";
            //       }
            //       else {
            //         echo "<script>alert('Error');</script>";
            //     }
            // }
        ?>
    </div>
</body>
</html>