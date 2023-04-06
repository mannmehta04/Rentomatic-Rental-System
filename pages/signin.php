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
                <input type="text" name="email" class="input" placeholder="a">
                <label for="" class="label">Email</label>
                </div></td>
            </tr>

            <tr>
                <td><div class="inputContainer">
                <input type="password" class="input" name="pass" placeholder="a">
                <label for="" class="label">Password</label>
                </div>
                </td>
            </tr>
            </table>
            <a href="../pages/forgotPass.html"> Forgot Password? </a>

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
    $query = "select * from Users where email = '$email' and password = '$pass'";
    $run = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($run);
    
    if($data){
        echo "<script>alert('correct')</script>";
        $_SESSION["mail"] = $email;
        if($_SESSION["mail"] != NULL){
            // echo "<script>alert('session Work')</script>";
            header('Location: ./new.php');
        }
        else{
            echo "<script>alert('session NotWork')</script>";
        }
    }
    else{
        echo "<script>alert('Pass Incorrect')</script>";
    }
    }
?>