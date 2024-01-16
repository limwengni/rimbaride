<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ride.php");
    exit;
}

require_once "config.php";

$driver_nric = $vehicle_number = "";
$driver_nric_err = $vehicle_number_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["driver_nric"]))){
        $driver_nric_err = "Please enter your NRIC.";
    } else{
        $driver_nric = trim($_POST["driver_nric"]);
    }
    
    if(empty(trim($_POST["vehicle_number"]))){
        $vehicle_number_err = "Please enter your vehicle number.";
    } else{
        $vehicle_number = trim($_POST["vehicle_number"]);
    }
    
    if(empty($driver_nric_err) && empty($vehicle_number_err)){
        $sql = "SELECT driver_id, driver_nric, vehicle_number FROM driver WHERE driver_nric = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_driver_nric);
            
            $param_driver_nric = $driver_nric;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $driver_nric, $vehicle_number);
                    if(mysqli_stmt_fetch($stmt)){
                        if(vehicle_number_verify($vehicle_number)){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["driver_id"] = $driver_id;
                            $_SESSION["driver_nric"] = $driver_nric;                            
                            
                            header("location: ride.php");
                        } else{
                            $login_err = "Invalid NRIC or vehicle number.";
                        }
                    }
                } else{
                    $login_err = "Invalid NRIC or vehicle number.";
                }
            } else{
                echo "Error. Please try again.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Login - Rimba Ride</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Login</div>
    <div class="content">

    <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">NRIC</span>
            <input type="text" placeholder="e.g. XXXXXX-XX-XXXX" required class="form-control <?php echo (!empty($driver_nric_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $driver_nric; ?>">
                <span class="invalid-feedback"><?php echo $driver_nric_err; ?></span>
          </div>
          <div class="input-box">
            <span class="details">Vehicle Number</span>
            <input type="text" placeholder="e.g. ABC 1234" required class="form-control <?php echo (!empty($vehicle_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $vehicle_number; ?>">
                <span class="invalid-feedback"><?php echo $vehicle_number_err; ?></span>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Login">
        </div>
        <div class="register-link">Not a registered driver? <a href="index.php">Register now</a></div>
      </form>
    </div>
  </div>

</body>
</html>