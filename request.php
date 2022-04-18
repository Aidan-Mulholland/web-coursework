<?php
if (!empty($_POST)) {
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
    $date = $_POST['date'];
    $size = $_POST['size'];
    $cgrade = $_POST['grade'];
    if ((date('N', strtotime($date)) >= 6)) {
        $type = "weekend";
    } else {
        $type = "weekday";
    }
    $sql = "SELECT venue.name, venue.capacity, if(venue.licensed, 'Yes', 'No'), catering.cost, venue.".$type."_price, 
    (SELECT COUNT(venue_booking.venue_id) FROM venue_booking WHERE venue_booking.venue_id = venue.venue_id) 
    FROM venue, catering
    WHERE venue.venue_id = catering.venue_id 
    AND catering.grade = $cgrade
    AND venue.capacity > $size
    AND NOT EXISTS (SELECT * FROM venue_booking WHERE booking_date = $date)
    ORDER BY (SELECT COUNT(venue_booking.venue_id) FROM venue_booking WHERE venue_booking.venue_id = venue.venue_id) DESC;";
    $result = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $output = "<tr>";
        foreach($row as $key => $value){
            $output .= "<td>$value</td>";
        }
        $output .= "</tr>";
        echo "$output";
    }
}
?>