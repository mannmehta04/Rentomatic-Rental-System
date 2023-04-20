<?php include "connect.php";
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>
    <div class="signupForm">      
        <form action="" class="form" method="post">
          <h1 class="title">Let's get Started.</h1>

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
            <div class="dateInput">
              <input type="date" name="bdate" class="input" placeholder="" required>
              <label for="" class="label">Birth Date</label>
            </div>
          </div>
        </td>
      </tr>

      <tr>
        <td><div class="inputContainer">
          <input type="password" name="pass" class="input" placeholder="" required>
          <label for="" class="label">Password</label>
        </div>
        </td>
        <td>
          <div class="inputContainer">
            <input type="text" name="addr" class="input" placeholder="" required>
            <label for="" class="label">Address</label>
          </div>
        </td>
      </tr>

      <tr>
        <td><div class="inputContainer">
          <input type="text" name="fname" class="input" placeholder="" required>
          <label for="" class="label">First Name</label>
        </div>
        </td>
        <td>
          <div class="inputContainer" style="margin-bottom: 20px;">
            <input type="text" name="city" class="input" placeholder="" required>
            <label for="" class="label">City</label>
          </div>
        </td>
      </tr>

      <tr>
        <td><div class="inputContainer">
          <input type="text" name="lname" class="input" placeholder="" required>
          <label for="" class="label">Last Name</label>
        </div>
        </td>
        <td>
          <div class="inputContainer">
            <input type="text" name="state" class="input" placeholder="" required>
            <label for="" class="label">State</label>
          </div>
        </td>
      </tr>

      <tr>
        <td>
          <div class="inputContainer">
          <select class="input" name="gender" style="width: 113%; color: grey;" required>
            <option disabled>--Select Gender--</option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>
        </td>
        <td>
          <div class="inputContainer">
            <input type="number" name="pincode" pattern="[0-9]{6}" class="input" placeholder="" required>
            <label for="" class="label">Pincode</label>
          </div>
        </td>
      </tr>

    </table>
  
  </div>

  <input type="button" onclick="location.href = '../pages/new.php';" class="homeBtn" value="Home">
  <input type="reset" class="homeBtn" value="Clear All" style="margin-left: 120px;">
  <input type="submit" name="sendData" class="submitBtn">
  </form>
  </div>
  <!-- <script>
    function checkData(){
      const email = document.getElementById("email").value;
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        location.href = '../pages/signup.php';
      }
    }
  </script> -->
</body>
</html>

<?php
if(isset($_POST['sendData'])){
  
  // echo var_dump($_POST);

  $email = $_POST["email"];
  $pass = $_POST["pass"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $gender = $_POST["gender"];
  $bDate = $_POST["bdate"];
  $addr = $_POST["addr"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $pincode = $_POST["pincode"];

  $userExist = 0;
  $sql = "SELECT email FROM traveler";
  $result = mysqli_query($con, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $fetchedEmail = $row['email'];
    if ($email == $fetchedEmail) {
      $userExist = 1;
      break;
    }
  }

  if($userExist == 0){
    
    $query = "INSERT INTO traveler (place_id, email, pass, first_name, last_name, gender, bdate, address, city, state, pincode) VALUES (0, '$email', '$pass', '$fname', '$lname', '$gender', '$bDate', '$addr', '$city', '$state', $pincode)";
     echo $query;
  
    if(mysqli_query($con, $query)){
      header('Location: ./signin.php');
      // echo "Data inserted successfully";
    }
    else {
      echo "<script>alert('Error while Inserting Data');</script>";
    }
  }
  else{
    echo "<script>alert('This Email Id Exists, Please Login with another Email Id.');</script>";
  }
  
  // $findMail="select traveler_id from traveler where email = '$email'";
  // $run = mysqli_query($con, $findMail);

  // if(mysqli_query($con, $findMail)){
  //   echo "<script>alert('This Email Id Exists, Please Login with another Email Id.');</script>";
  // }
  
}
?>