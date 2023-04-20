<?php include "connect.php";
  session_start();
  if(!isset($_SESSION["t_email"])){
    echo "<script>alert('Please Login for more Details! Also, make sure you\'re not Host!');</script>";
    echo "<script>window.location.href='houses.php'</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>House Details</title>
  <link rel="stylesheet" href="../css/particularHouse.css">
</head>
<body>
  <div id="menu">
        <ul class="ul_list">
            <li id="homeLink"><a href="../pages/new.php">Home</a></li>
            <li><a href="../pages/houses.php">Gallery</a></li>
            <li><a href="../pages/feedback.php">Contact Us</a></li>
            <?php 
                if((!isset($_SESSION['t_email'])) && (!isset($_SESSION['h_email']))){
            ?>
                <li id="inLink"><a href="../pages/signin.php">Sign In</a></li>
                <li id="upLink"><a href="../pages/signup.php" style="float: right;">First Time? Register Now!</a></li>
            <?php
                }
            ?>
            <?php
                if(isset($_SESSION["h_email"]) || isset($_SESSION["t_email"])){
            ?>
                <li id="outLink"><a href="../pages/signOut.php">Log Out</a></li>
            <?php
                }
            ?>
        </ul>
  </div>

  <?php
    $id=$_REQUEST['iid'];

    $query = "select place_id, placeName, placeType, address, city, state, pincode, maxGuest, bedCount, bedroomCount, bathroomCount, price, startingDate, lastDate, description, image from place where place_id = '$id'";
    $run = mysqli_query($con, $query);
    $data = mysqli_num_rows($run);
  ?>
  <div class="house-details">
  <?php
    if (mysqli_num_rows($run) > 0) {
          $row = mysqli_fetch_assoc($run);
          $id=$row['place_id'];
          $img=$row['image'];

          $startDate = $row["startingDate"];
		      $lastDate = $row["lastDate"];
		      // $startDate = date("d-m-Y", strtotime($row["startingDate"]));
		      // $lastDate = date("d-m-Y", strtotime($row["lastDate"]));
          // echo $lastDate;

          echo "<h2>" . $row["placeName"] . "</h2>";
          echo "<img src='../images/$img' alt='house' />";
          echo "<ul>";
          echo "<li>Place Type: " . $row["placeType"] . "</li>";
          echo "<li>Address: " . $row["address"] . "</li>";
          echo "<li>City: " . $row["city"] . "</li>";
          echo "<li>State: " . $row["state"] . "</li>";
          echo "<li>Pincode: " . $row["pincode"] . "</li>";
          echo "<li>Max Guests: " . $row["maxGuest"] . "</li>";
          echo "<li>Bed Count: " . $row["bedCount"] . "</li>";
          echo "<li>Bedroom Count: " . $row["bedroomCount"] . "</li>";
          echo "<li>Bathroom Count: " . $row["bathroomCount"] . "</li>";
          echo "<li>Price per day: ₹" . $row["price"] . "</li>";
          echo "<li>Starting Date: " . $row["startingDate"] . "</li>";
          echo "<li>Last Date: " . $row["lastDate"] . "</li>";
          echo "<li>Description: " . $row["description"] . "</li>";
          echo "</ul>";
          echo '
            <form action="" method="post" class="form">
              <h2>Stay Details</h2><br>
                  <table>
                    <tr>
                        <td>
                            <div class="inputContainer">';
                            ?>
                              <input type="date" class="input" min="<?= $startDate ?>" max="<?= $lastDate ?>" id="userStartDate" name="userStartDate" required>
                            <?php
                            echo'
								                <label for="userStartDate" class="label">Starting Date:</label>
                            </div>
                        </td>

                        <td>
                            <div class="inputContainer">';
                            ?>
                              <input type="date" class="input" min="<?= $startDate ?>" max="<?= $lastDate ?>" id="userLastDate" name="userLastDate" required>
                            <?php
                            echo '
                                <label for="userLastDate" class="label">Last Date:</label>
                            </div>
                        </td>
                    </tr>
                  </table>
				        <a class="buttons" href="houses.php">Go Back</a>
              	<input class="buttons" type="submit" name="confirmPurchase" value="Confirm">
            </form>
          ';

		if(isset($_POST["confirmPurchase"])){
			$id=$_REQUEST['iid'];
			$userStartDate = $_POST['userStartDate'];
			$userLastDate = $_POST['userLastDate'];

      // $bookingQuery = "SELECT checkInDate, checkOutDate, totalDays, totalCost FROM booking WHERE place_id = $id";
      // $bookingRun = mysqli_query($con, $bookingQuery);
      $cost_per_day=$row["price"];

      // if (mysqli_num_rows($bookingRun) > 0) {
        // $row = mysqli_fetch_assoc($bookingRun);

        $total_days = 0;
        $diff = abs(strtotime($userLastDate) - strtotime($userStartDate));
        $total_days = floor($diff / (60*60*24));
        if($total_days==0){
          $total_days += 1;
        }
        $total_cost = $total_days * $cost_per_day;

        $query="INSERT INTO booking (place_id, checkInDate, checkOutDate, totalDays, totalCost) VALUES ($id, '$userStartDate', '$userLastDate', $total_days, $total_cost);";
      // }

			// $total_days = 0;
      // $diff = abs(strtotime($row['lastDate']) - strtotime($row['startingDate']));
    	// $total_days = floor($diff / (60*60*24));
      // $total_cost = $total_days * $row["price"];
			
			

			if(mysqli_query($con, $query)){
				header('Location: ./purchase.php?iid=' .$id. '');
				// echo "Data inserted successfully";
			}
			else{
				echo "<script>alert('seh lenge thodasa');</script>";
			}
		}

        //   echo '<a class="buttons" style="float: right;" href="purchase.php?iid=' .$id. '">Rent now!</a>';
    }
  ?>

  <script>
    const startDateInput = document.getElementById('userStartDate');
    const endDateInput = document.getElementById('userLastDate');

    startDateInput.addEventListener('change', () => {
      const startDate = new Date(startDateInput.value);
      const endDate = new Date(endDateInput.value);

      if (startDate.getTime() > endDate.getTime()) {
        alert('Start date cannot be greater than end date');
        startDateInput.value = '';
      }
    });

    endDateInput.addEventListener('change', () => {
      const startDate = new Date(startDateInput.value);
      const endDate = new Date(endDateInput.value);

      if (startDate.getTime() > endDate.getTime()) {
        alert('Start date cannot be greater than end date');
        endDateInput.value = '';
      }
    });
  </script>

  </div>
</body>
</html>


<?php
$id=$_REQUEST['iid'];
echo $id;
?>