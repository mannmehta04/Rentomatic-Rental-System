<!-- house.php -->
<?php
        $sql = "SELECT * FROM place";
        $result = $conn->query($sql);
    ?>

    <div class="houses-container">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="house-card">
            <img src="<?php echo $row['image_url']; ?>" alt="house" />
            <h2><?php echo $row['name']; ?></h2>
            <p><?php echo $row['description']; ?></p>
            <p>Price: <?php echo $row['price']; ?></p>
            <a href="#">More Details</a>
            </div>
        <?php endwhile; ?>
    </div>


    <h2>House 1</h2>
      <img src="house1.jpg">

      <ul>
        <li>Location: New York, NY</li>
        <li>Number of Bedrooms: 3</li>
        <li>Number of Bathrooms: 2</li>
        <li>Price: $500,000</li>
        <li>Description: This beautiful 3-bedroom house is located in the heart of New York City. It features spacious living areas, a modern kitchen, and a large backyard perfect for entertaining. Don't miss out on this amazing opportunity to own a piece of the city!</li>
      </ul>

      <button>Buy Now</button>


    <div class="houses-container">
      <div class="house-card">
        <img src="../images/home.jpg" alt="house" />
        <h2>House 1</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio
            iste neque dolores saepe molestiae explicabo voluptas velit
            laudantium sint corrupti.
        </p>
        <p>Price: $1000</p>
        <a href="#">More Details</a>
      </div>
      <div class="house-card">
        <img src="../images/home2.jpg" alt="house" />
        <h2>House 2</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio
            iste neque dolores saepe molestiae explicabo voluptas velit
            laudantium sint corrupti.
        </p>
        <p>Price: $1500</p>
        <a href="#">More Details</a>
      </div>
      <div class="house-card">
        <img src="../images/home3.jpg" alt="house" />
        <h2>House 3</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio
            iste neque dolores saepe molestiae explicabo voluptas velit
            laudantium sint corrupti.
        </p>
        <p>Price: $2000</p>
        <a href="#">More Details</a>
      </div>
      <div class="house-card">
        <img src="../images/home3.jpg" alt="house" />
        <h2>House 3</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio
            iste neque dolores saepe molestiae explicabo voluptas velit
            laudantium sint corrupti.
        </p>
        <p>Price: $2000</p>
        <a href="#">More Details</a>
      </div>
      <div class="house-card">
        <img src="../images/home3.jpg" alt="house" />
        <h2>House 3</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio
            iste neque dolores saepe molestiae explicabo voluptas velit
            laudantium sint corrupti.
        </p>
        <p>Price: $2000</p>
        <a href="#">More Details</a>
      </div>
    </div>







<?
    $bookingQuery = "SELECT checkInDate, checkOutDate, totalDays, totalCost FROM booking WHERE place_id = $id";
      $bookingRun = mysqli_query($con, $bookingQuery);

      $total_days=0;
      $total_cost=0;
      $cost_per_day=$row["price"];
      if (mysqli_num_rows($bookingRun) > 0) {
        $row = mysqli_fetch_assoc($bookingRun);

        $total_days=$row['totalDays'];
        $total_cost=$row['totalCost'];

        $diff = abs(strtotime($row['checkOutDate']) - strtotime($row['checkInDate']));
        $total_days = floor($diff / (60*60*24));
        $total_cost = $total_days + $cost_per_day;
      }