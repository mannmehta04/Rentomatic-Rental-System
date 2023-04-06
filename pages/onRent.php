<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rentals</title>
</head>
<body>
    <?php
    // Connect to database
    $db_host = "localhost";
    $db_name = "houses_db";
    $db_user = "root";
    $db_pass = "";
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    // Retrieve house data from database
    $query = "SELECT * FROM houses";
    $result = mysqli_query($conn, $query);
    $houses = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Close database connection
    mysqli_close($conn);
    ?>
    
	<h1>Houses for Sale</h1>
	<?php foreach($houses as $house): ?>
		<div class="house">
			<h2><?php echo $house['name']; ?></h2>
			<p>Address: <?php echo $house['address']; ?></p>
			<p>Price: <?php echo $house['price']; ?></p>
			<p>Description: <?php echo $house['description']; ?></p>
		</div>
	<?php endforeach; ?>

</body>
</html>