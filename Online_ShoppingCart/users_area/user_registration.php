<?php include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Registration</title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    #main_devReg {
        /* background-image: url('./bg.png'); */
        background-image: url('./bg_two.png');
        background-position: center;
        background-repeat: no-repeat;
    }

    #dev_RegSecond {
        backdrop-filter: blur(5px);
    }

    #formReg label {
        color: white;
        font-weight: bolder;
        border-radius: 10px;
        padding: 10px;
    }
</style>

<body style="background-color: black;">

    <div id="main_devReg">
        <h1 class="text-center mt-5 text-white fw-bold text-uppercase">Registration</h1>
        <div class="container-fluid d-flex justify-content-center aligns-item-center p-5 mt-2" id="dev_RegSecond">
            <form action="" method="post" entype="multipart/form-data" id="formReg">
                <!-- username -->
                <label for="user_username" class="form-label">Username</label>
                <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" />
                <!-- email -->
                <label for="user_email" class="form-label">Email</label>
                <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" />
                <!-- image -->
                <label for="user_image" class="form-label">User image</label>
                <input type="file" name="user_image" id="user_image" class="form-control" required="required" />
                <!-- password -->
                <label for="user_password" class="form-label">Password</label>
                <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" />
                <!-- confirm password -->
                <label for="conf_user_password" class="form-label">Confirm password</label>
                <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" placeholder="Enter your confirm password" autocomplete="off" required="required" />
                <!-- Address -->
                <label for="user_address" class="form-label">Address</label>
                <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" />
                <!-- Contact Number -->
                <label for="user_contact" class="form-label">Contact</label>
                <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter your contact number" autocomplete="off" required="required" />
                <!-- submit btn -->
                <input type="submit" value="Register" style="padding: 10px 20px; background-color: black; color: white; font-weight: bolder; width: 350px; border-radius: 10px; margin-top: 10px;" name="user_register">
                <!-- If Already Exist User -->
                <p class="small fw-bold mt-2 pt-1 text-white">Already have an account ? <a href="user_login.php" class="text-danger"> Login </a></p>
            </form>
        </div>
    </div>
</body>

</html>

<!-- p_C -->

<?php

if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $conf_user_password = $_POST['conf_user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    // Select Query

    $select_query = "SELECT * FROM `user_table` WHERE username = '$user_username' OR user_email = '$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Username and Email already exist')</script>";
    } else if ($user_password != $conf_user_password) {
        echo "<script>alert('Password don't match')</script>";
    } else {
        // insert_query
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query = "INSERT INTO `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
        $sql_execute = mysqli_query($con, $insert_query);
    }

    //selecting cart items
    $select_cart_items = "SELECT * from `cart_details` WHERE ip_address = '$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $rows_count = mysqli_num_rows($result_cart);
    if ($rows_count > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php', '_self')</script>";
    } else {
        echo "<script>window.open('user_login.php', '_self')</script>";
    }
}

?>