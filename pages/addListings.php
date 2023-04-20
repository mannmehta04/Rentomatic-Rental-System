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

    <link rel="stylesheet" href="../css/addListings.css">
</head>
<body>
  <?php
    if(!isset($_SESSION['h_email'])) {
      echo "Error while fetching Host Id";
    }
    else{
      $fetchedMail=$_SESSION['h_email'];
      $fetchHostQuery=" Select host_id from host where email='$fetchedMail'; ";
      $run = mysqli_query($con, $fetchHostQuery);
      $data = mysqli_fetch_array($run, MYSQLI_NUM)[0];

      if(mysqli_query($con, $fetchHostQuery)){
        $hostId = $data;
        // echo "<script>alert('Your Data has been inserted.');</script>";
      }
      else {
        echo "Error!";
      }
    }
  ?>
    <div class="signupForm">      
        <form action="" class="form" method="post" enctype="multipart/form-data">
          <script>
            window.onload=function(){
              var today = new Date().toISOString().split('T')[0];
              document.getElementsByName("startingDate")[0].setAttribute('min', today);
              document.getElementsByName("lastDate")[0].setAttribute('min', today);
            }
          </script>
          <h1 class="title">Ready to be a landlord? Let's add your home to our rental list.</h1>

        <!-- <div class="leftData"> -->
          <div>
    <table>
      <tr>
        <td><div class="inputContainer">
          <input type="text" name="pName" class="input" placeholder="" required>
          <label for="" class="label">Place Name</label>
        </div></td>
        <td>
          <div class="inputContainer">
            <div class="dateInput">
              <input type="text" name="pType" class="input" placeholder="" required>
              <label for="" class="label">Place Type</label>
            </div>
          </div>
        </td>
      </tr>

      <tr>
        <td><div class="inputContainer">
          <input type="text" name="address" class="input" placeholder="" required>
          <label for="" class="label">Address</label>
        </div>
        </td>
        <td>
          <div class="inputContainer">
            <input type="text" name="city" class="input" placeholder="" required>
            <label for="" class="label">City</label>
          </div>
        </td>
      </tr>

      <tr>
        <td><div class="inputContainer">
          <input type="text" name="state" class="input" placeholder="" required>
          <label for="" class="label">State</label>
        </div>
        </td>
        <td>
          <div class="inputContainer" style="margin-bottom: 20px;">
            <input type="number" name="pincode" class="input" placeholder="" required>
            <label for="" class="label">Pincode</label>
          </div>
        </td>
      </tr>

      <tr>
        <td><div class="inputContainer">
          <input type="number" name="maxGuest" class="input" placeholder="" required>
          <label for="" class="label">Max Guest</label>
        </div>
        </td>
        <td>
          <div class="inputContainer">
            <input type="number" name="bedCount" class="input" placeholder="" required>
            <label for="" class="label">Bed Count</label>
          </div>
        </td>
      </tr>

      <tr>
        <td><div class="inputContainer">
          <input type="number" name="bedroomCount" class="input" placeholder="" required>
          <label for="" class="label">Bedroom Count</label>
        </div>
        </td>
        <td>
          <div class="inputContainer">
            <input type="number" name="bathroomCount" class="input" placeholder="" required>
            <label for="" class="label">Bathroom Count</label>
          </div>
        </td>
      </tr>

      <tr>
        <td><div class="inputContainer">
          <input type="number" name="price" class="input" placeholder="" required>
          <label for="" class="label">Price</label>
        </div>
        </td>
        <td>
          <div class="inputContainer">
            <input type="text" name="description" class="input" placeholder="" required>
            <label for="" class="label">Description</label>
          </div>
        </td>
      </tr>

      <tr>
        <td><div class="inputContainer">
          <input type="date" name="startingDate" class="input" placeholder="" required>
          <label for="" class="label">Starting Date</label>
        </div>
        </td>
        <td>
          <div class="inputContainer">
            <input type="date" name="lastDate" class="input" placeholder="" required>
            <label for="" class="label">Last Date</label>
          </div>
        </td>
      </tr>
    </table>

  </div>

  <label class="custom-file-upload">
    <input type="file" name="abc" required/>
    Upload Image
  </label>

  <input type="button" onclick="location.href = '../pages/new.php';" class="homeBtn" value="Home">
  <input type="reset" class="homeBtn" value="Clear All" style="margin-left: 120px;">
  <input type="submit" name="sendData" class="submitBtn">

  </form>
  </div>
</body>
</html>

<?php
if(isset($_POST['sendData'])){
  
  // echo var_dump($_POST);
  
  $pName = $_POST["pName"];
  $pType = $_POST["pType"];
  $address = $_POST["address"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $pincode = $_POST["pincode"];
  $maxGuest = $_POST["maxGuest"];
  $bedCount = $_POST["bedCount"];
  $bedroomCount = $_POST["bedroomCount"];
  $bathroomCount = $_POST["bathroomCount"];
  $price = $_POST["price"];
  $lastDate = $_POST["lastDate"];
  $startingDate = $_POST["startingDate"];
  $description = $_POST["description"];

  //if(isset($name) and !empty($name)){
    $filename = $_FILES["abc"]["name"];
    $tempname = $_FILES["abc"]["tmp_name"];
    $folder = "../images/".$filename;
  //}
  //else

//  echo "<script>alert($filename);</script>";
 if(move_uploaded_file($tempname, $folder)){
    $query = "INSERT INTO place (host_id, traveler_id, placeName, placeType, address, city, state, pincode, maxGuest, bedCount, bedroomCount, bathroomCount, price, startingDate, lastDate, description, isListed,image) VALUES ($hostId, 0, '$pName', '$pType', '$address', '$city', '$state', $pincode, $maxGuest, $bedCount, $bedroomCount, $bathroomCount, $price, '$startingDate', '$lastDate', '$description', 1, '$filename')";
 
    // '$filename'
    // echo $query;

    if(mysqli_query($con, $query)){
      // header('Location: ./listings.php');
      // echo "Data inserted successfully";
      echo "<script>alert('Your House has been added to our Listings!');</script>";
    }
    else {
      echo "Error!";
    }
  }
  }
else{
  // echo "seh lenge thoda";
}
?>