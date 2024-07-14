<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome
    <?php echo $_SESSION['username'] ?>
  </title>
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
<style>
  body {
    overflow-x: hidden;
  }

  .profile_img {
    width: 80%;
    aspect-ratio: 1;
    margin: auto;
    display: block;
    border-radius: 50%;
  }

  .edit_image {
    width: 100%;
    aspect-ratio: 1;
  }
</style>

<body>

  <!-- Navbar -->

  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3">
      <div class="container-fluid border-0 rounded"
        style="background-color: #fff; font-size: 15px; font-weight: bolder;">
        <a class="navbar-brand logo" href="../index.php">
          <h1> <i class="fa-brands fa-squarespace"></i> </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">My Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../contact.php">Contact</a>
            </li>
            <!-- <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup> <?php cart_item(); ?> </sup></a>
        </li> -->
            <!-- <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price() ?> /-</a>
        </li> -->
          </ul>
          <!-- <form class="d-flex" role="search" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-success text-dark" name="search_data_product">
      </form> -->

          <!-- ---------------------  -->
          <ul class="navbar-nav">
            <?php

            if (!isset($_SESSION['username'])) {
              echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
            } else {
              echo "<li class='nav-item'>
          <a class='nav-link' href='./logout.php'> Welcome " . $_SESSION['username'] . "</a>
        </li>";
            }

            if (!isset($_SESSION['username'])) {
              echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/user_login.php'> Login </a>
          </li>";
            } else {
              echo "<li class='nav-item'>
            <a class='nav-link' href='../users_area/logout.php'> Logout </a>
          </li>";
            }
            ?>
          </ul>
          <!-- -------+-------=====--- -->

        </div>
      </div>
    </nav>



    <!-- calling cart function -->
    <?php
    cart();
    ?>

    <!-- Second Nav Section -->
    <!-- 
    <nav class="navbar navbar-expand-lg px-3 py-3">
        
    </nav> -->

    <!-- fourth child -->

    <div class="row">
      <div class="col-md-2">
        <!-- <ul class="navbar-nav bg-warning-subtle text-center" style="height: 100vh;"> -->
        <ul class="navbar-nav text-center bg-secondary text-white">
          <li class="nav-item rounded-top">
            <a class="nav-link bg-dark text-white fs-4 fw-bold text-uppercase" href="#"> Your profile </a>
          </li>
          <?php
          $username = $_SESSION['username'];
          $user_image = "Select * from `user_table` where username = '$username'";
          $user_image = mysqli_query($con, $user_image);
          $row_image = mysqli_fetch_array($user_image);
          $user_image = $row_image['user_image'];
          echo "<li class='nav-item'>
                        <img src='./user_images/$user_image' class='profile_img my_4' alt='profile_img'>
                      </li>";
          ?>

          <li class="nav-item pt-2">
            <a class="nav-link" href="profile.php">Pending Orders <i class="fa-regular fa-clock"></i></a>
          </li>
          <li class="nav-item pt-2">
            <a class="nav-link" href="profile.php?edit_account">Edit account <i class="fa-solid fa-user-pen"></i></a>
          </li>
          <li class="nav-item pt-2">
            <a class="nav-link" href="profile.php?my_orders">My Orders <i class="fa-solid fa-box"></i></a>
          </li>
          <li class="nav-item pt-2">
            <a class="nav-link" href="profile.php?delete_account">Delete Account <i
                class="fa-solid fa-trash-can"></i></a>
          </li>
          <li class="nav-item pt-2">
            <a class="nav-link" href="logout.php">Logout <i class="fa-solid fa-power-off"></i></a>
          </li>
        </ul>
      </div>
      <div class="col-md-10 mt-2">
        <?php get_user_order_details();
        if (isset($_GET['edit_account'])) {
          include('edit_account.php');
        }
        if (isset($_GET['my_orders'])) {
          include('user_orders.php');
        }
        if (isset($_GET['delete_account'])) {
          include('delete_account.php');
        }
        ?>
      </div>
    </div>

    <!-- last child -->
    <!-- include footer -->
  </div>
  <?php include("../includes/footer.php") ?>

  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>