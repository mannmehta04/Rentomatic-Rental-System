<?php include "connect.php";
    session_start();
    $id=$_REQUEST['iid'];
    // echo $id;

    $query = "DELETE FROM booking WHERE place_id = $id;";
    
    if(mysqli_query($con, $query)){
        header('Location: ./particularHouse.php?iid=' .$id. '');
    }
    else {
        echo "<script>alert('Error');</script>";
    }
?>