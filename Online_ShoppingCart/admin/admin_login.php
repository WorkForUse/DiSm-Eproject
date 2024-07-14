<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap Link CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow-x: hidden;
            display: grid;
            place-items: center;
        }
    </style>
</head>

<body>
    <div class="bg-dark rounded" style="width: 50%;">
        <img src="../sFor.png" width="20%">
        <h1 class="text-white text-center fs-3">Admin Login</h1>
        <form action="" method="post" style="display: grid; place-items: center;">
            <div class="form-outline mb-4">
                <label for="username" class="form-label text-white fw-bold">Username</label>
                <input type="text" name="username" id="username" required="required" class="form-control">
            </div>

            <div class="form-outline mb-4">
                <label for="password" class="form-label text-white fw-bold">Password</label>
                <input type="password" name="password" id="password" required="required" class="form-control">
            </div>
            <input type="submit" class="bg-white text-dark fw-bold rounded border-0 py-2 px-5" name="admin_login" value="Login">
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['admin_login'])) {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    $select_query = "SELECT * FROM `admin_table` WHERE admin_username = '$admin_username'";

    // ================
    if ($select_query) {
        $_SESSION['username'] = $admin_username;
        echo "<script>window.open('../admin/index.php', '_self')</script>";
    }
}

?>
<script type="text/javascript">
    function preventBack() {
        window.history.forward()
    };
    setTimeout("preventBack()", 0);
    window.onunload = function() {
        null;
    }
</script>