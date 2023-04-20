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

    <link rel="stylesheet" href="../css/adminPanel.css">

</head>
<body>
    <?php
        if(!isset($_SESSION['a_email'])) {
            header('Location: ./signIn.php');
            // echo "<script>alert('Wrong Redirect!');</script>";
        }
    ?>
    <div id="blob"></div>

    <div id="menu">
        <ul class="ul_list">
            <li id="homeLink"><a href="../pages/adminPanel.php">Home</a></li>
            <li><a href="../pages/adminAdd.php">Add Housings</a></li>
            <li><a href="../pages/adminDelete.php">Remove Housings</a></li>
            <li id="outLink"><a href="../pages/signOut.php">Log Out</a></li>
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
            Rent-O-Matic Admin Panel, for Professionals. <br><br> Helping to Manage Data Easily
        </div>
    </div>
    <script src="../js/new.js"></script>
</body>
</html>