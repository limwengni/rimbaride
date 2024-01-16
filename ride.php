<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$page_title = "Rimba Ride";

//database
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $location = trim($_POST['location']);
    $destination = trim($_POST['destination']);
    $pax = trim($_POST['pax']);
    $date = trim($_POST['date']);
    $time = trim($_POST['time']);
    $vehicle_number = $_POST['vehicle_number'];

    //error(check time and date)
    date_default_timezone_set('Asia/Kuala_Lumpur');
//    $currentDate = date("m/d/Y");
//    $currentTime = date("h:ia");

    $format = 'Y-m-d H:i';
    $datetime = DateTime::createFromFormat($format, $date . ' ' . $time);

    if (new DateTime() > $datetime) {
        //current date time has passed $date_var
        echo "Invalid time, please reenter the time/date!";
    } else {
        //current date time has NOT passed $date_var
        $sql = "INSERT INTO ride(location, destination, pax, date, time, vehicle_number) VALUES (?,?,?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssissi', $location, $destination, $pax, $date, $time, $vehicle_number);
        $stmt->execute();
        echo "Success!";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Register - Rimba Ride</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="form.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <div class="title">List your ride here *FOR DRIVER*</div>
            <div class="content">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Starting location</span>
                            <input type="text" id="location" placeholder="e.g. Kuala Lumpur" name="location" class="form-control" required <?php echo isset($location) ? "value=$location" : null ?>>
                        </div>
                        <div class="input-box">
                            <span class="details">Destination</span>
                            <input type="text" id="destination" placeholder="e.g. Penang" name="destination" class="form-control" required <?php echo isset($destination) ? "value=$destination" : null ?>>
                        </div>
                        <div class="input-box">
                            <span class="details">Pax</span>
                            <input type="number" id="pax" name="pax" placeholder="e.g. 3" class="form-control" required <?php echo isset($pax) ? "value=$pax" : null ?>>
                        </div>
                        <div class="input-box">
                            <span class="details">Date</span>
                            <input type="date" id="date" name="date" class="form-control" required <?php echo isset($date) ? "value=$date" : null ?>>
                        </div>
                        <div class="input-box">
                            <span class="details">Time</span>
                            <input type="time" id="time" name="time" class="form-control" required <?php echo isset($time) ? "value=$time" : null ?>>
                        </div>
                        <div class="input-box">
                            <span class="details">Vehicle Number</span>
                            <input type='hidden' id="vehicle_number" name="vehicle_number" value="<?= $vehicle_number ?>">
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Register">
                    </div>
                    <div class="register-link">See all your listings <a href="rideList.php">here.<a href="logout.php"> Logout here.</a></div>
                </form>
            </div>
        </div>

    </body>
</html>