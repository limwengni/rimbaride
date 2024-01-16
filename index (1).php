<?php
require_once "config.php";
 
$driver_name = $driver_nric = $driver_mobileNum = $vehicle_type = $vehicle_model = $vehicle_number = "";
$driver_name_err = $driver_nric_err = $driver_mobileNum_err = $vehicle_type_err = $vehicle_model_err = $vehicle_number_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["driver_name"]))){
        $driver_name_err = "Please enter your name.";
    } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["driver_name"]))){
        $driver_name_err = "Username can only contain letters.";
    } else{
        $sql = "SELECT driver_id FROM driver WHERE driver_name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_driver_name);
            
            $param_driver_name = trim($_POST["driver_name"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $driver_name_err = "This name already exists.";
                } else{
                    $driver_name = trim($_POST["driver_name"]);
                }
            } else{
                echo "Error. Please try again.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    if(empty(trim($_POST["driver_nric"]))){
      $driver_nric_err = "Please enter your NRIC.";
  } elseif(!preg_match('/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/', trim($_POST["driver_nric"]))){
      $driver_nric_err = "NRIC can only contain numbers.";
  } else{
      $sql = "SELECT driver_id FROM driver WHERE driver_nric = ?";
      
      if($stmt = mysqli_prepare($link, $sql)){
          mysqli_stmt_bind_param($stmt, "s", $param_driver_nric);
          
          $param_driver_nric = trim($_POST["driver_nric"]);
          
          if(mysqli_stmt_execute($stmt)){
              mysqli_stmt_store_result($stmt);
              
              if(mysqli_stmt_num_rows($stmt) == 1){
                  $driver_nric_err = "This NRIC already exists.";
              } else{
                  $driver_nric = trim($_POST["driver_nric"]);
              }
          } else{
              echo "Error. Please try again.";
          }

          mysqli_stmt_close($stmt);
      }
  }

  if(empty(trim($_POST["driver_mobileNum"]))){
    $driver_mobileNum_err = "Please enter your mobile number.";
} elseif(!preg_match('/^[0-9]{3}-[0-9]{7}$/', trim($_POST["driver_mobileNum"]))){
    $driver_mobileNum_err = "Mobile number can only contain numbers.";
} else{
    $sql = "SELECT driver_id FROM driver WHERE driver_mobileNum = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_driver_mobileNum);
        
        $param_driver_mobileNum = trim($_POST["driver_mobileNum"]);
        
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            
            if(mysqli_stmt_num_rows($stmt) == 1){
                $driver_mobileNum_err = "This mobile number already exists.";
            } else{
                $driver_mobileNum = trim($_POST["driver_mobileNum"]);
            }
        } else{
            echo "Error. Please try again.";
        }

        mysqli_stmt_close($stmt);
    }
}

if(empty(trim($_POST["vehicle_type"]))){
  $vehicle_type_err = "Please enter your vehicle type.";
} elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["vehicle_type"]))){
  $vehicle_type_err = "Vehicle type can only contain letters.";
} else{
  $vehicle_type = trim($_POST["vehicle_type"]);
}

if(empty(trim($_POST["vehicle_model"]))){
  $vehicle_model_err = "Please enter your vehicle model.";
} elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["vehicle_model"]))){
  $vehicle_model_err = "Vehicle model can only contain letters.";
} else{
  $vehicle_model = trim($_POST["vehicle_model"]);
}

if(empty(trim($_POST["vehicle_number"]))){
  $vehicle_number_err = "Please enter your vehicle number.";
} elseif(!preg_match('/^[a-zA-Z0-9]+$/', trim($_POST["vehicle_number"]))){
  $vehicle_number_err = "Vehicle number can only contain letters and numbers.";
} else{
  $sql = "SELECT driver_id FROM driver WHERE vehicle_number = ?";
  
  if($stmt = mysqli_prepare($link, $sql)){
      mysqli_stmt_bind_param($stmt, "s", $param_vehicle_number);
      
      $param_vehicle_number = trim($_POST["vehicle_number"]);
      
      if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);
          
          if(mysqli_stmt_num_rows($stmt) == 1){
              $vehicle_number_err = "This vehicle number already exists.";
          } else{
              $vehicle_number = trim($_POST["vehicle_number"]);
          }
      } else{
          echo "Error. Please try again.";
      }

      mysqli_stmt_close($stmt);
  }
}
    
    if(empty($driver_name_err) && empty($driver_nric_err) && empty($driver_mobileNum_err) && empty($vehicle_type_err) && empty($vehicle_model_err) && empty($vehicle_number_err)){
        
        $sql = "INSERT INTO driver (driver_name, driver_nric, driver_mobileNum, vehicle_type, vehicle_model, vehicle_number) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_driver_name, $param_driver_nric, $param_driver_mobileNum, $param_vehicle_type, $param_vehicle_model, $param_vehicle_number);
            
            $param_driver_name = $driver_name;
            $param_driver_nric = $driver_nric;
            $param_driver_mobileNum = $driver_mobileNum;
            $param_vehicle_model = $vehicle_model;
            $param_vehicle_type = $vehicle_type;
            $param_vehicle_number = $vehicle_number;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
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
    <title>Register - Rimba Ride</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Register as a Driver</div>
    <div class="content">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" placeholder="e.g. John" required class="form-control <?php echo (!empty($driver_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $driver_name; ?>">
                <span class="invalid-feedback"><?php echo $driver_name_err; ?></span>
          </div>
          <div class="input-box">
            <span class="details">NRIC</span>
            <input type="text" placeholder="e.g. XXXXXX-XX-XXXX" required class="form-control <?php echo (!empty($driver_nric_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $driver_nric; ?>">
                <span class="invalid-feedback"><?php echo $driver_nric_err; ?></span>
          </div>
          <div class="input-box">
            <span class="details">Mobile Number</span>
            <input type="text" placeholder="e.g. 012-3456789" required class="form-control <?php echo (!empty($driver_mobileNum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $driver_mobileNum; ?>">
                <span class="invalid-feedback"><?php echo $driver_mobileNum_err; ?></span>
          </div>
          <div class="input-box">
            <span class="details">Vehicle Type</span>
            <input type="text" placeholder="e.g. Van" required class="form-control <?php echo (!empty($vehicle_type_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $vehicle_type; ?>">
                <span class="invalid-feedback"><?php echo $vehicle_type_err; ?></span>
          </div>
          <div class="input-box">
            <span class="details">Vehicle Model</span>
            <input type="text" placeholder="e.g. Toyota" required class="form-control <?php echo (!empty($vehicle_model_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $vehicle_model; ?>">
                <span class="invalid-feedback"><?php echo $vehicle_model_err; ?></span>
          </div>
          <div class="input-box">
            <span class="details">Vehicle Number</span>
            <input type="text" placeholder="e.g. ABC 1234" required class="form-control <?php echo (!empty($vehicle_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $vehicle_number; ?>">
                <span class="invalid-feedback"><?php echo $vehicle_number_err; ?></span>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
        <div class="register-link">Already a registered driver? <a href="login.php">Login now</a></div>
      </form>
    </div>
  </div>

</body>
</html>