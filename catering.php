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
        <table>
        <?php 
        $min = $_GET['min'];
        $max = $_GET['max'];
        
        for ($i = $min - 5; $i <= $max; $i += 5){
            if ($i < $min) {
                echo "<tr><th>cost per person →<br>↓ party size</th>";
                for ($j = 2; $j <= 6; $j++){
                    echo "<th>".array_values($_GET)[$j]."</th>";
                }
                echo "</tr>";
            }
            $output = "<tr><td>".$i."</td>";
            for ($j = 2; $j <= 6; $j++){
                $output .= "<td>".$i*array_values($_GET)[$j]."</td>";
            }
            $output .= "</tr>";
            echo $output;
        }
        ?>
        </table>
    </body>
</html>