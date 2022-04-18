<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Wedding Booking</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-center">
          <h1 class="nav-header text-white">F130368</h1>
      </div>
    </div>
  	</header>
	<main class="m-5 justify-content-center">
		<form class="w-25 container-sm mb-5" onsubmit="wedding.php">
			<div class="row mb-3">
				<div class="mb-3">
					<label for="date" class="form-label">Example label</label>
					<input name="date" class="form-control" id="date" type="date">
				</div>
				<div class="mb-3">
					<label for="size" class="form-label">Party size</label> 
					<input name="size" class="form-control" id="size" type="number">
				</div>
				<div class="mb-3">
					<label for="catering" class="form-label">Catering grade</label>
					<select name="catering" class="form-select" id="catering">
						<option selected>Choose catering grade</option>
						<option value="1">Grade 1</option>
						<option value="2">Grade 2</option>
						<option value="3">Grade 3</option>
						<option value="4">Grade 4</option>
						<option value="5">Grade 5</option>
					</select>
				</div>
				<div class="d-grid gap-2 col-6 mx-auto">
					<button class="btn btn-primary" type="submit">Submit</button>
				</div>
			</div>
		</form>
		<?php
		if (!empty($_GET)) {
			$servername ="sci-mysql";//or "sci‐project". For coursework: "sci‐mysql"
            $username = "coa123wuser";
            $password = "grt64dkh!@2FD";
            $dbname = "coa123wdb";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
			$date = $_GET['date'];
			$size = $_GET['size'];
			$cgrade = $_GET['catering'];
			if ((date('N', strtotime($date)) >= 6)) {
				$type = "weekend";
			} else {
				$type = "weekday";
			}
            $sql = "SELECT venue.name, venue.capacity, if(venue.licensed, 'Yes', 'No'), catering.cost, venue.weekend_price, 
			(SELECT COUNT(venue_booking.venue_id) FROM venue_booking WHERE venue_booking.venue_id = venue.venue_id) 
			FROM venue, catering
			WHERE venue.venue_id = catering.venue_id 
			AND catering.grade = $cgrade
			AND venue.capacity > $size
			AND NOT EXISTS (SELECT * FROM venue_booking WHERE booking_date = $date)
			ORDER BY (SELECT COUNT(venue_booking.venue_id) FROM venue_booking WHERE venue_booking.venue_id = venue.venue_id) DESC;";
            $result = mysqli_query($conn, $sql);
			echo "<table class=\"table\">";
			echo "<tr><th>Name</th><th>Capacity</th><th>Licensed</th><th>Catering cost / person</th><th>Price</th><th>Number of bookings</th></tr>";
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $output = "<tr>";
                foreach($row as $key => $value){
                	$output .= "<td>$value</td>";
                }
                $output .= "</tr>";
                echo "$output";
            }
			echo "</table>";
			
		}
		?>
	</main>
</body>
</html>