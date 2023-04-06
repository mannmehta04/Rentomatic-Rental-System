<?php

    // module.exports = {
    //     php: "/usr/bin/php"
    // }

    // $con=mysqli_connect("localhost", "root", "mannmehta04", "mann04") or die ("Could not connect! <br> Error returned by MySQL server:".mysqli_connect_error());
    // if($con){
    //     echo "Connection is Succesful!";
    // }
    // mysql_close($con);
    
    $con = mysqli_connect("localhost", "root", "", "rento"); 
    if($con){
        // echo "<script>alert('Connection is Succesful!')</script>";
    }
    else{
        // echo "<script>alert('Chal chal hve')</script>";
    }

// $sql = "select * from auth_permission";
// $out = mysqli_query($con, $sql);
// while($data = mysqli_fetch_assoc($out)){
//     echo $data['name']."<br>";
// }
// print_r($data);
// $row = mysqli_fetch_array($out);
// print_r($row);

    // mysql_close($con);
?>