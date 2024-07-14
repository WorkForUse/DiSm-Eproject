<?php include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- p code  -->
    <?php
    $user_ip = getIPAddress();
    $get_user = "SELECT * FROM `user_table` WHERE user_ip = '$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
    ?>
    <div class="container-fluid p-5 text-left bg-light">

        <div class="row">

            <div class="col-md-6">
                <h5>Click Here below to Proceed your request to pay <i class="fa-solid fa-code-pull-request"></i></h5>
                <h3 class="fw-bold">Note</h3>
                <p>Our Company will provide you warranty card for your satisfaction and in case if you received bad
                    product from
                    our side then you can contact easily in the terms and rules of our company</p>

                <p>If you are received product in good condition then you can't use warranty card</p>
                <p>If we providing you warranty card then that's not mean you do mis commitment.</p>
                <p>After one month completed you can't use warranty</p>
                <p>For the warranty card your total price amount at least five thousand</p>
                <a href="order.php?user_id=<?php echo $user_id ?>" style="text-decoration: none;">
                    <button class="btn btn-dark">Order Submission Request <i class="fa-solid fa-check"></i></button>
                </a>
            </div>

            <div class="col-md-6">
                <img src="WarrantyCard.PNG">
            </div>

        </div>

    </div>


</body>

</html>