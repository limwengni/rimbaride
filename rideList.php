<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$page_title = "Rimba Ride";

include "config.php";
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="rideList.css">
        <title><?php echo $page_title ?></title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center;
                background-color: #fff;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="title">
            <h3><?php echo $page_title ?></h3>
            </div>

            <?php
            $sql = "SELECT ride_id, location, destination, pax, date, time, vehicle_number from ride";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();

            $self = $_SERVER['PHP_SELF'];
            ?>


            <?php
            $c0 = 'ride_id';
            $c1 = 'location';
            $c2 = 'destination';
            $c3 = 'pax';
            $c4 = 'date';
            $c5 = 'time';
            $c6 = 'vehicle_number';
            ?>

            <!--            <form action="search.php" method="get">
                            <div class="input-group mb-3" style="width: 40%;">
                                <input type="text" name="query" class="form-control" placeholder="Search using name" aria-describedby="button-addon2">
                                <button class="btn btn-info" type="submit" value="Search" id="button-addon2" style="z-index: 0;">Search</button>
                            </div>
                        </form>-->

            <?php
            if ($result->num_rows > 0) {
                echo "<table id='ride'>"
                . "<tr>"
                . "<th>Ride ID</th>"
                . "<th>Starting Location</th>"
                . "<th>Destination</th>"
                . "<th>Pax</th>"
                . "<th>Date</th>"
                . "<th>Time</th>"
                . "<th>Vehicle Number</th>"
                . "</tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>$row[$c0]</td><td>$row[$c1]</td><td>$row[$c2]</td><td>$row[$c3]</td><td>$row[$c4]</td><td>$row[$c5]</td><td>$row[$c6]</td><td style='border:none'></td>";
                }
                echo "<tr><td colspan=12 style='text-align: left;'>$result->num_rows record(s) returned.";
            } else {
                echo "0 result";
            }

            echo "</tr>";
            echo "</table>";
            ?>
        </div>
        <a href="ride.php">Add another listing.</a>
    </body>
</html>
