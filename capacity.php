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
            $min = $_GET['minCapacity'];
            $max = $_GET['maxCapacity'];
            if (is_int($min) and is_int($max) and $min<=$max) {
                echo "<table><tr><th>Name</th><th>Weekend Price</th><th>Weekday Price</th></tr>";
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
                
                $sql = "SELECT name, weekend_price, weekday_price FROM venue WHERE licensed = 1 AND capacity <= $max AND capacity >= $min";
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
                echo "Invalid data";
                exit();
            }
            ?>
    </body>
</html>