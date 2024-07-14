<?php

if (isset($_GET['orders_pending'])) {
    $delete_id = $_GET['order_id'];

    $delete_order = "DELETE from `products` WHERE order_id = $delete_id";
    $result_product = mysqli_query($con, $delete_order);
    // if ($result_product) {
    //     echo "<script>window.open('./index.php','_self')</script>";
    // }
}
