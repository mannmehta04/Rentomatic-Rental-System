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
    <link rel="stylesheet" href="../css/adminDelete.css">

    <!-- <link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.4/dist/simplebar.min.css" />
    <script src="https://unpkg.com/simplebar@5.3.4/dist/simplebar.min.js"></script> -->

</head>
<body data-simplebar>

    <div id="menu">
        <ul class="ul_list">
            <li id="homeLink"><a href="../pages/adminPanel.php">Home</a></li>
            <li><a href="../pages/adminAdd.php">Add Housings</a></li>
            <li><a href="../pages/adminDelete.php">Remove Housings</a></li>
            <li id="outLink"><a href="../pages/signOut.php">Log Out</a></li>
        </ul>
    </div>
    
    <h1>Smooth and simple - removing places is no trouble at all.</h1>

    <!-- Some PHP Code -->

    <div class="houses-container">
        <?php
            $query = "select * from place";
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
                        <?php echo '<a class="buttons" href="deleteHouse.php?iid=' .$id. '">Remove Place</a>'; ?>      
                    </div>
        <?php }
            } else {
                echo "<script>alert('Currently no Houses are available!');</script>";
                echo "<script>window.location.href='adminPanel.php'</script>";
            }
        ?>
    </div>


    
</body>
</html>