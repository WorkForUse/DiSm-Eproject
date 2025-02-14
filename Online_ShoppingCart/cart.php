<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shopping Cart - Cart Details</title>
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css link file -->
  <link rel="stylesheet" href="style.css">
</head>
<style>
  .cart_img {
    width: 50px;
    aspect-ratio: 1;
  }
</style>

<body>

  <!-- Navbar -->

  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3">
      <div class="container-fluid border-0 rounded" style="background-color: #fff; font-size: 15px; font-weight: bolder;">
        <a class="navbar-brand logo" href="index.php">
          <h1> <i class="fa-brands fa-squarespace"></i> </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./users_area/user_registration.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup style="background-color: red; color: white; border-radius: 50%; padding: 1px 3px 1px 1px; font-weight: bolder; text-align: center;"> <?php cart_item(); ?> </sup></a>
            </li>
          </ul>


          <!-- --------------+-------------  -->
          <ul class="navbar-nav  cart_nav">
            <?php

            if (!isset($_SESSION['username'])) {
              echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
            } else {
              echo "<li class='nav-item'>
          <a class='nav-link' href='#'> Welcome " . $_SESSION['username'] . "</a>
        </li>";
            }

            if (!isset($_SESSION['username'])) {
              echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/user_login.php'> Login </a>
          </li>";
            } else {
              echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/logout.php'> Logout </a>
          </li>";
            }
            ?>

          </ul>
          <!-- ----------------------------- -->


        </div>
      </div>
    </nav>

    <!-- calling cart function -->
    <?php
    cart();
    ?>

    <!-- Second Nav Section -->

    <!-- <nav class="navbar navbar-expand-lg px-3 py-3">
        
    </nav> -->

    <!-- Third Section -->

    <!-- <div class="bg-light">
        <h3 class="text-center">Shopping Cart Ecommerce Store</h3>
        <p class="text-center">Communications is at the heart of e-commerce and community</p>
    </div> -->

    <!-- Fourth Child Section TABLE -->
    <div class="container">
      <div class="row">
        <table class="table table-bordered text-center">
          <form action="" method="post">

            <!--  php code to display dynamic data  -->

            <?php
            $get_ip_add = getIPAddress();
            $total_price = 0;
            $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
            $result = mysqli_query($con, $cart_query);
            $result_count = mysqli_num_rows($result);
            if ($result_count > 0) {
              echo "<thead>
                              <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                              </tr>
                                </thead>
                                  <tbody>";

              while ($row = mysqli_fetch_array($result)) {
                $product_id = $row['product_id'];
                $select_products = "SELECT * FROM `products` WHERE product_id = '$product_id'";
                $result_products = mysqli_query($con, $select_products);
                while ($row_product_price = mysqli_fetch_array($result_products)) {
                  $product_price = array($row_product_price['product_price']);
                  $price_table = $row_product_price['product_price'];
                  $product_title = $row_product_price['product_title'];
                  $product_image1 = $row_product_price['product_image1'];
                  $product_values = array_sum($product_price);
                  $total_price += $product_values;

            ?>

                  <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin/product_images/<?php echo $product_image1 ?>" class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php

                    $get_ip_add = getIPAddress();
                    if (isset($_POST['update_cart'])) {
                      $quantities = $_POST['qty'];
                      $update_cart = "UPDATE `cart_details` SET quantity = $quantities WHERE ip_address = '$get_ip_add'";
                      $result_products_quantity = mysqli_query($con, $update_cart);
                      $total_price = $total_price * $quantities;
                    }

                    ?>
                    <td><?php echo $price_table ?> /-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td>
                      <!-- <input type="submit" value=""> -->
                      <input type="submit" value="Update Cart" class="bg-success text-white px-3 py-2 border-0 rounded" name="update_cart">
                      <input type="submit" value="Remove Cart" class="bg-dark text-white px-3 py-2 mt-2 border-0 rounded" name="remove_cart">

                    </td>
                  </tr>
            <?php }
              }
            } else {
              echo "
                          <div class='container text-center'><img src='./empty_cart.png'></div>
                          <h2 class='text-center text-uppercase'> Cart Is Empty </h2>
                          ";
            }

            ?>
            </tbody>
        </table>
        <div class="d-flex mb-4">
          <!-- subtotal -->
          <?php
          $get_ip_add = getIPAddress();
          $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
          $result = mysqli_query($con, $cart_query);
          $result_count = mysqli_num_rows($result);
          if ($result_count > 0) {
            echo " <h4 class='px-3'>Subtotal : <strong class='text-success'> $total_price </strong></h4>
                        
                        <input type='submit' value='Continue Shopping' class='bg-success text-white px-3 py-2 mx-2 border-0 rounded' name='continue_shopping'>

                        <button class='bg-black fw-bold rounded px-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-white text-decoration-none'>Checkout</a></button>";
          } else {
            echo "<input type='submit' value='Continue Shopping' class='bg-success text-white fw-bold px-3 py-2 border-0 rounded' name='continue_shopping'>";
          }
          if (isset($_POST['continue_shopping'])) {
            echo "<script>window.open('index.php','_self')</script>";
          }
          ?>

        </div>
      </div>
    </div>
    </form>
    <!-- function to remove item -->
    <?php

    function remove_cart_item()
    {
      global $con;
      if (isset($_POST['remove_cart'])) {
        foreach ($_POST['removeitem'] as $remove_id) {
          echo $remove_id;
          $delete_query = "DELETE from `cart_details` where product_id = $remove_id";
          $run_delete = mysqli_query($con, $delete_query);
          if ($run_delete) {
            echo "<script>window.open('cart.php','_self')</script>";
          }
        }
      }
    }
    echo $remove_item = remove_cart_item();

    ?>


    <!-- Last Child Section -->
    <!-- include footer -->
  </div>
  <?php include("./includes/footer.php") ?>

  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>