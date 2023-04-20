<?php include "connect.php";
  session_start();
//   if(!isset($_SESSION["t_email"])){
//     echo "<script>alert('Please Login to submit your Details!');</script>";
//     echo "<script>window.location.href='new.php'</script>";
//   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <link rel="stylesheet" href="../css/feedback.css">
</head>
<body>
    <div class="signupForm">      
        <form action="" class="form" method="post">
          <h1 class="title">Any Queries or Feedback?</h1>

        <!-- <div class="leftData"> -->
          <div>
    <table>
      <tr>
        <td><div class="inputContainer">
          <input type="email" name="email" class="input" placeholder="" required>
          <label for="" class="label">Email</label>
        </div></td>
        <td>
          <div class="inputContainer">
              <input type="number" minlength="1" maxlength="1" min="0" max="5" name="star" class="input" placeholder="" required>
              <label for="" class="label">Stars</label>
          </div>
        </td>
      </tr>
      
      <tr>
        <td>
          <div class="bigInputContainer">
                <textarea style="padding:20px;" class="input" name="description" id="description" cols="30" rows="10" required></textarea>
                <!-- <input class="input" placeholder="" required> -->
                <label for="" class="label">Description</label>
          </div>
        </td>
      </tr>
    </table>

  </div>

  <input style="float:bottom;" type="button" onclick="location.href = '../pages/new.php';" class="homeBtn" value="Home">
  <input type="reset" class="homeBtn" value="Clear All" style="margin-left: 120px;">
  <input type="submit" name="sendData" class="submitBtn">
  </form>
  </div>
</body>
</html>

<?php
if(isset($_POST['sendData'])){

    $email = $_POST["email"];
    $star = $_POST["star"];
    $desc = $_POST["description"];

    // $t_email = $_SESSION['t_email'];
    // $findUser="select traveler_id from traveler where email = '$t_email'";
    // $run = mysqli_query($con, $findUser);
    // $traveler_id = mysqli_fetch_array($run, MYSQLI_NUM)[0];
  
    $query = "INSERT INTO feedback (email, star_count, review) VALUES ('$email', $star, '$desc')";
  
    if(mysqli_query($con, $query)){
        echo "<script>alert('Thank you for your feedback!');</script>";
        // header('Location: ./new.php');
        // echo "Data inserted successfully";
    }
    else {
        echo "Error!";
    }
}
?>