<html>
    <head>
        <style>
            table{
                font-size: 24px;
                text-align: center;
                width: 60%;
                margin-left: auto;
                margin-right: auto;
                border: 5px solid black;
            }
        </style>
    </head>
    <body>
        <?php
        $month = $_GET['month'];
        if (0 < $month  and $month < 13){
            echo "<table><tr><th>Name</th><th>Number of bookings</th></tr>";
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
            $sql = "SELECT venue.name, COUNT(venue_booking.booking_date) 
            FROM `venue_booking`, `venue` 
            WHERE venue.venue_id = venue_booking.venue_id 
            AND $month = MONTH(venue_booking.booking_date) 
            GROUP BY venue_booking.venue_id
            ORDER BY COUNT(venue_booking.booking_date) DESC";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $output = "<tr>";
                foreach($row as $key => $value){
                    $output .= "<td>$value</td>";
                }
                $output .= "</tr>";
                echo "$output";
            }
            echo "</table>";
        } else {
            echo "Month out of range";
            exit();
        }
        ?>
    </body>
</html>