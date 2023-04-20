<?php include "connect.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../css/signin.css">
    
</head>
<body>
    <div class="signinForm">   
        <form action=""  class="form" method="post">
          <h1 class="title">Welcome back !</h1>

        <!-- <div class="leftData"> -->
          <div>
            <table>
            <tr>
                <td><div class="inputContainer">
                <input type="text" name="email" class="input" placeholder="a" required>
                <label for="" class="label">Email</label>
                </div></td>
            </tr>

            <tr>
                <td><div class="inputContainer">
                <input type="password" class="input" name="pass" placeholder="a" required>
                <label for="" class="label">Password</label>
                </div>
                </td>
            </tr>
            </table>
            <!-- <a href="../pages/forgotPass.html"> Forgot Password? </a> -->

    <input type="button" onclick="location.href = '../pages/new.php';" class="homeBtn" value="Home">
    <input type="submit" name="submit" class="submitBtn" value="Login">
    </form>
    </div>
    <div class="sideImage">
        <img src="../images/gold_house.jpg" alt="">
    </div>
</body>

</html>

<?php
    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $flag = 0;
        $trQuery = "select * from traveler where email = '$email' AND pass = '$pass'";

        $run = mysqli_query($con, $trQuery);
        $trData = mysqli_num_rows($run);
        // echo $data;
        if(!$trData){
            // echo "<script>alert('in h')</script>";
            $hostQuery = "select * from host where email = '$email' AND password = '$pass'";
            $run1 = mysqli_query($con, $hostQuery);
            $hostData = mysqli_num_rows($run1);
            // echo "<script>alert('session worl')</script>";
            if($hostData != 0){
                // echo "<script>alert('session work')</script>";
                $_SESSION['h_email'] = $email;
            }
            else{
                $adminQuery = "select * from admin where email = '$email' AND password = '$pass'";
                $run2 = mysqli_query($con, $adminQuery);
                $adminData = mysqli_num_rows($run2);

                if($adminData != NULL){
                    $_SESSION['a_email'] = $email;
                }
            }
        }
        else if($trData){
            // echo "<script>alert('session work')</script>";
            $_SESSION['t_email'] = $email;
        }
        else{
            echo "<script>alert('Pass Incorrect')</script>";
        }

        
        // if(isset($_SESSION["h_email"]) || isset($_SESSION["t_email"])){
        if(isset($_SESSION['t_email']) || isset($_SESSION['h_email'])){
            // echo "<script>alert('session Work')</script>";
            header('Location: ./new.php');
        }
        else if(isset($_SESSION['a_email'])){
            header('Location: ./adminPanel.php');
        }
        else{
            echo "<script>alert('Invalid Credentials')</script>";
            // header('Location: ./signin.php');
        }
    }
?>