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
<style>
  @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Sacramento&display=swap');

  body {
    overflow-x: hidden;
  }
</style>

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
              <a class="nav-link" href="contact.php">Contact</a>
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


    <!-- -------- Banner ---------  -->
    <div class="bg-light d-flex justify-content-center align-items-center">
      <img src="bannerMain.png" style="position: relative;">
      <h1 style="font-size: 100px; color: white; position: absolute;"> <span style="font-size: 200px; font-weight: lighter; -webkit-text-stroke-width: 1px;
          -webkit-text-stroke-color: white; color: transparent;"> ميراج
        </span> <sup style="font-style: italic; font-weight: lighter;">E</sup> <span style='font-family: Lobster;'>
          Shabaan </span>
      </h1>
      <img src="forBannerGradient.png"
        style="position: absolute; right: 10%; top: 8%; width: 25%; filter: hue-rotate(148deg);">
    </div>
    <!-- ----------------------------  -->

    <!-- ================----ALL BRANDS SECTIOn------================== -->

    <div class="py-3 px-5 text-uppercase bg-dark" style='border: 5px solid transparent;
    border-image: linear-gradient(0deg, #00ff9d, #000);
    border-image-slice: 1; 
    font-size: 25px; font-family: "Lobster", sans-serif;'>
      <span style="display: flex; justify-content: center; align-items: center;">
        <?php getbrands(); ?>
      </span>
    </div>
    <!-- =============================================================== -->

    <!-- ========================== -->
    <!-- Intro Some Stuff -->
    <div
      style="width: 100%; height: 30%; background: linear-gradient(166deg, rgba(0, 255, 187, 1) 0%, rgba(0, 0, 0, 1) 100%); display: flex; justify-content: center; align-items: center;">
      <img src="sFor.png">
      <h1 style="background-color: transparent; font-size: 100px; font-weight: bolder; -webkit-text-stroke-width: 5px;
      -webkit-text-stroke-color: white; color: transparent;">FLAT 30% OFF </h1>
    </div>
    <!-- =========================== -->

    <!-- calling cart function -->
    <?php
    cart();
    ?>
    <!-- --------  -->
    <!-- Fetching products -->
    <br>
    <!-- ================----ALL CATEGORY SECTIOn------================== -->
    <div class="d-flex  text-uppercase bg-black text-center">
      <?php getcategories(); ?>
    </div>
    <!-- =============================================================== -->
    <br>
    <div
      style="width: 100%; height: 15%; background: linear-gradient(226deg, #ff3300 0%, #050505fd 100%); display: flex; justify-content: center; align-items: center;">
      <img src="./thumb.png" width="10%">
      <h1 style="background-color: transparent; font-size: 50px; font-weight: bolder; -webkit-text-stroke-width: 3px;
      -webkit-text-stroke-color: white; color: transparent;">TOP SELLING
        PRODUCTS </h1>
    </div>

    <div style="display: flex; flex-wrap: wrap;" class="bg-light">
      <div class="row p-4">
        <?php
        getproducts();
        get_unique_categories();
        get_unique_brands();
        ?>
      </div>
    </div>

    <h1 style='font-family: Sacramento; text-align: center; font-weight: bolder; font-size: 100px;'>Our New Arrivals
    </h1>
    <div style="display: flex; flex-wrap: wrap;" class="p-3">
      <?php get_all_products(); ?>
    </div>

    <div class="bg-dark text-white p-5">
      <div class="row">
        <div class="col-md-4">
          <h1 style="font-size: 20px; font-weight: bolder;">How Slobiz Transformed Online Shopping in Pakistan</h1>
          <p style="font-size: 10px;">Slobiz first made waves in Pakistan’s e-commerce market after its introduction in
            2012. We have since grown to become Pakistan’s largest platform for online shopping with a network spread
            across Asia in Pakistan, Bangladesh, Sri Lanka, Myanmar, and slobiz.com.np. Our vision was to provide a
            safe, efficient online marketplace platform for vendors and customers across the country to come together.
            We started off exclusively as an online fashion retail platform and over the years expanded to become a
            complete one-stop solution for all your buying needs. slobiz prides itself on not being just another
            ecommerce venture in Asia. We work tirelessly to make sure that we provide users with the best online online
            shopping experience and value for their purchases. Whether you shop online through our website or our online
            shopping mobile App, you can expect easy navigation, customized recommendations, and a smooth online
            shopping experience guaranteed.</p>
        </div>
        <div class="col-md-4">
          <p style="font-size: 10px;">Select from the Largest Online Marketplace in Pakistan
            With over 15 million products to select from, slobiz offers its customers the most comprehensive listing of
            products in the country. Whether you’re looking for electronics, apparel, appliances, or groceries – there
            is something for everyone.</p>
          <p style="font-size: 10px;">Online shopping with slobiz means you get the chance to avail exclusive
            online-only promotional packages as well as discount vouchers from our vendors when you shop from their
            pages. Our flash sales give you customized product offers all curated with the help of our advanced AI
            technology so you always have deals you’ll actually be interested in!</p>
          <p style="font-size: 10px;">slobiz does not just cater online shopping in Pakistan but also aims to simplify
            the way you give back to society. With charities spanning across sectors of education, health care,
            environmental preservation, and shelters, you can choose to make a big difference with a few, simple clicks.
          </p>
        </div>
        <div class="col-md-4">
          <p style="font-size: 10px;">Online shopping with slobiz means you get the chance to avail exclusive
            online-only promotional packages as well as discount vouchers from our vendors when you shop from their
            pages. Our flash sales give you customized product offers all curated with the help of our advanced AI
            technology so you always have deals you’ll actually be interested in!</p>
          <p style="font-size: 10px;">International sellers and local convenience come together with Slobiz Global
            collection. Get the chance to shop online from vendors around the world without leaving the Slobiz website.
            Featuring thousands of novelty gadgets and accessories, Slobiz Global Collection offers you a selection of
            products that you won’t find anywhere else when you’re online shopping in Pakistan.</p>
        </div>
      </div>
    </div>

    <!-- last child -->
    <!-- include footer -->
    <?php include("./includes/footer.php") ?>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
</body>

</html>