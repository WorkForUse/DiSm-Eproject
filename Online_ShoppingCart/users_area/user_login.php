<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    .userForm {
        padding: 100px;
        margin-top: 50px;
    }

    .userForm label {
        font-size: 30px;
        color: white;
        font-weight: bolder;
    }
</style>

<body>
    <div class="container-fluid" style="background-color: black; color: white; padding: 100px; background-image: url('./bg_two.png'); background-repeat: no-repeat; background-position: center;">
        <div class="row p-5" style="backdrop-filter: blur(5px);">
            <div class="col-md-4">
                <img src="./user_login_bg.png" width="100%">
            </div>
            <div class="col-md-8">
                <form action="" method="post" entype="multipart/form-data" class="userForm">
                    <!-- username -->
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" />
                    <!-- password -->
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" />
                    <!-- submit btn -->
                    <input type="submit" value="Login" class="bg-warning py-2 px-3 border-0 rounded text-dark" name="user_login" style="margin-top: 10px;">
                    <!-- If Already Exist User -->
                    <p class="small fw-bold mt-2 pt-1">Don't have an account ? <a href="user_registration.php" class="text-danger"> Register </a></p>

            </div>
            </form>
            <button style="position: absolute; width: 20%; top: 65%; left: 45%; border: none; border-radius: 10px; padding: 10px 20px;"><a style="text-decoration: none; font-weight: bolder; color: black;" href="../admin/admin_login.php">Go
                    to Admin
                    Login</a></button>
        </div>
    </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM `user_table` WHERE username = '$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    //cart item
    $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);
    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            // echo "<script>alert('Login Successfully')</script>";
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successfully')</script>";
                echo "<script>window.open('../index.php', '_self')</script>";
            } else {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successfully')</script>";
                echo "<script>window.open('profile.php', '_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script> ";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

?>