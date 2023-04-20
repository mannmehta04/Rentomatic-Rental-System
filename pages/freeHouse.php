<?php include "connect.php";
    session_start();
    $id=$_REQUEST['iid'];
    // echo $id;

    $unList="UPDATE place SET isListed = 1 WHERE place_id = $id;";
    $unListId="UPDATE place SET traveler_id = 0 WHERE place_id = $id;";
    $removeBooking = "DELETE FROM booking WHERE place_id = $id;";

    if(mysqli_query($con, $unList) && mysqli_query($con, $unListId) && mysqli_query($con, $removeBooking)){
        header('Location: ./ownedPlaces.php');
    }
    else {
        echo "<script>alert('Error');</script>";
    }
?>