<?php include "connect.php";
    session_start();
    $id=$_REQUEST['iid'];

    $query = "DELETE FROM place WHERE place_id = $id;";
    
    if(mysqli_query($con, $query)){
        header('Location: ./adminDelete.php');
    }
    else {
        echo "<script>alert('Error');</script>";
    }
?>