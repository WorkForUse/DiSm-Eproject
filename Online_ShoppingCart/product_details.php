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
  <title>Shopping Cart</title>
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css link file -->
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- Navbar -->

  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3">
      <div class="container-fluid border-0 rounded"
        style="background-color: #fff; font-size: 15px; font-weight: bolder;">
        <a class="navbar-brand logo" href="index.php">
          <h1> <i class="fa-brands fa-squarespace"></i> </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <?php
            if (isset($_SESSION['username'])) {
              echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/profile.php'>My Account</a>
            </li>";
            } else {
              echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
            </li>";
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup
                  style="background-color: red; color: white; border-radius: 50%; padding: 1px 3px 1px 1px; font-weight: bolder; text-align: center;">
                  <?php cart_item(); ?>
                </sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price:
                <?php total_cart_price() ?> /-
              </a>
            </li>
          </ul>
          <form class="d-flex" role="search" action="search_product.php" method="get">
            <input class="form-control me-2 bg-light text-dark fw-bold" type="search" placeholder="Search"
              aria-label="Search" name="search_data">
            <input type="submit" value="Search" class="btn text-white bg-dark" name="search_data_product">
          </form>


          <!-- pass work -->
          <ul class="ml-2 navbar-nav">
            <?php

            if (!isset($_SESSION['username'])) {
              echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest </a>
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
          <!-- ------- -->

        </div>
      </div>



    </nav>

    <!-- calling cart function -->
    <?php
    cart();
    ?>


    <!-- ------------ -->

    <div
      style="width: 100%; height: 30%; background: linear-gradient(166deg, rgba(0, 255, 187, 1) 0%, rgba(0, 0, 0, 1) 100%); display: flex; justify-content: center; align-items: center;">
      <img src="sFor.png">
      <h1 style="background-color: transparent; font-size: 100px; font-weight: bolder; -webkit-text-stroke-width: 5px;
      -webkit-text-stroke-color: white; color: transparent;">SLOBIZ </h1>

    </div>

    <!-- ------VIEW MORE------ -->
    <div class="p-5">
      <!-- Fetching products -->
      <?php
      // calling function
      view_details();
      ?>

    </div>
    <!-- ========================= -->
    <!-- last child -->
    <!-- include footer -->
    <?php include("./includes/footer.php") ?>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
</body>

</html>