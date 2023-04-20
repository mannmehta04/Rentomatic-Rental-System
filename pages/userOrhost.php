<?php include "connect.php";
    session_start();
    $id=$_REQUEST['iid'];
    echo $id;

    // No one is logged in
    if(!isset($_SESSION['h_email']) && !isset($_SESSION['t_email'])){
        echo "<script>alert('Please Login before Continue');</script>";
        echo "<script>window.location.href='new.php'</script>";
    }
    // user is logged in
    else if(isset($_SESSION['t_email'])){

        $t_email = $_SESSION['t_email'];
        $findUser="select traveler_id from traveler where email = '$t_email'";
        $run = mysqli_query($con, $findUser);
        $traveler_id = mysqli_fetch_array($run, MYSQLI_NUM)[0];

        $isTrSet="UPDATE place SET traveler_id = $traveler_id WHERE place_id = $id;";

        $isListed="UPDATE place SET isListed = '0' WHERE place_id = $id;";
        
        if(mysqli_query($con, $isListed) && mysqli_query($con, $isTrSet)){
            echo "<script>alert('Purchase Completed');</script>";
        }
        echo "<script>window.location.href='ownedPlaces.php';</script>";
    }
    // host is logged in
    else{
        echo "<script>alert('Please Login as User to complete purchase.');</script>";
        echo "<script>window.location.href='new.php'</script>";
    }
?>
