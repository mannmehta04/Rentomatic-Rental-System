<?php

    // module.exports = {
    //     php: "/usr/bin/php"
    // }

    $con=mysqli_connect("localhost", "root", "mannmehta04", "mann04") or die ("Could not connect! <br> Error returned by MySQL server:".mysqli_connect_error());
    if($con){
        echo "Connection is Succesful!";
    }
    mysql_close($con);
?>