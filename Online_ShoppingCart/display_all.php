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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css link file -->
  <link rel="stylesheet" href="style.css">
</head>
<style>
  body {
    overflow-x: hidden;
  }

  .DisplayCardSec {
    width: 100%;
    height: 280px;
    position: relative;
    overflow: hidden;
  }

  .DisplayCardSec img {
    width: 100%;
    height: 280px;
    border: 5px solid transparent;
    border-image: linear-gradient(-45deg, #00ff9d, #000);
    border-image-slice: 1;
  }

  .DisplayCardSec:hover .card-body {
    right: 0;
  }

  .card-body {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    right: -100%;
    background: #1f3d4738;
    backdrop-filter: blur(5px);
    color: #fff;
    transition: 2s;
  }

  .card-body .card-title {
    font-weight: bolder;
    padding: 10px;
    font-size: 20px;
    color: white;
  }

  .card-body .card-info {
    font-weight: bolder;
    padding: 10px;
    font-size: 15px;
  }

  /* =================  */
  .useFor {
    width: 100%;
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%, 5%);
    box-shadow: 0px 10px 20px rgb(40, 40, 40);
  }

  .lookText {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    opacity: 0;
    transition: opacity 0.4s ease-in-out;
    background: black;
    cursor: pointer;
  }

  .content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
  }

  .useFor:hover .lookText {
    opacity: 0.8;
  }

  @media screen and (min-width: 480px) {

    .mediaqueryOne {
      font-size: 15px;
    }

    #mediaQuery {
      width: 10%;
    }
  }

  /* ================== */
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
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup style="background-color: red; color: white; border-radius: 50%; padding: 1px 3px 1px 1px; font-weight: bolder; text-align: center;">
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
            <input class="form-control me-2 bg-light text-dark fw-bold" type="search" placeholder="Search" aria-label="Search" name="search_data">
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



    <!-- Intro Some Stuff -->
    <div style="width: 100%; height: 30%; background: linear-gradient(166deg, rgba(0, 255, 187, 1) 0%, rgba(0, 0, 0, 1) 100%); display: flex; justify-content: center; align-items: center;">
      <img src="sFor.png" id="mediaQuery">
      <h1 style="background-color: transparent; font-size: 100px; font-weight: bolder; -webkit-text-stroke-width: 5px;
      -webkit-text-stroke-color: white; color: transparent;" class="mediaQuery_2">SLOBIZ </h1>
    </div>

    <!-- ======================== -->
    <!-- dolls section -->

    <div class="useFor">
      <img src="./displayImg/dolls banner.png" width="100%">
      <div class="lookText">
        <div class="content">
          <h1>Dolls</h1>
          <p class="mediaqueryOne">Our enchanting dolls are more than playthings—they’re companions that spark
            imagination. Crafted with love, they’re perfect for collectors and kids alike.</p>
        </div>
      </div>
    </div>

    <!-- -------------- -->
    <!-- ======================= -->



    <div class="row bg-light p-5">
      <h1 class="text-center p-5" style="font-weight: bolder; text-transform: uppercase;">Welcome to our Store</h1>
      <div class="col-md-6">
        <h1 class="fs-3 text-uppercase fw-bold">Some Short info </h1>
        <hr style="width: 20%; color: green; border-width: 5px; border-radius: 10px;">
        <p>Our curated collection awaits you. From trendy fashion to artisanal crafts, we’ve handpicked items that
          resonate with style, quality, and uniqueness. Explore and find something that speaks to your heart as a
          token of our appreciation, keep an eye out for exclusive discounts, early access to new arrivals, and surprise
          treats. Because you deserve a little extra sparkle in your shopping journey Your satisfaction is our
          priority. Expect swift deliveries and hassle-free returns. If you’re not delighted, we’ll make it right</p>
      </div>
      <div class="col-md-6">
        <h1 class="fs-3 text-uppercase fw-bold">Discover Unique Treasures</h1>
        <hr style="width: 20%; color: green; border-width: 5px; border-radius: 10px;">
        <p>At our ecommerce haven, shopping is more than just a transaction—it’s an experience. Whether you’re a
          seasoned online shopper or a first-timer, we’ve curated a delightful collection of products that cater to your
          needs and desires <br> Navigating our website is as smooth as silk. Browse effortlessly, add to your cart, and
          check out with ease. We’ve designed it all with you in mind <br> Join our vibrant community of shoppers,
          creators, and dreamers. Connect with like-minded individuals, share your experiences, and be part of something
          bigger</p>
      </div>
    </div>

    <!-- =====================  -->
    <!-- our Products -->
    <div class="container bg-light">

      <h1 class=" text-center fw-bold text-uppercase">Our Products</h1>
      <div class="row p-2">

        <div class="col-md-4">
          <div class="DisplayCardSec">
            <img src="./displayImg/greetingCardImg.png">
            <!-- card body -->
            <div class="card-body">
              <h1 class="card-title">Greeting Cards</h1>
              <p class="card-info">Send heartfelt wishes with our exquisite collection of artsy greeting cards. From
                birthdays to anniversaries, each card is a canvas of emotions.</p>
            </div>

          </div>
        </div>

        <div class="col-md-4">
          <div class="DisplayCardSec">
            <img src="./displayImg/arts.png">
            <!-- card body -->
            <div class="card-body">
              <h1 class="card-title">Arts & Crafts</h1>
              <p class="card-info">Elevate your space with our high-quality arts and crafts. Handcrafted by talented
                artists, these pieces add a touch of creativity to any room.</p>
            </div>

          </div>
        </div>

        <div class="col-md-4">
          <div class="DisplayCardSec">
            <img src="./displayImg/Gift_articles.jfif">
            <!-- card body -->
            <div class="card-body">
              <h1 class="card-title">Gift Articles</h1>
              <p class="card-info">Discover elegance in every detail with our curated show pieces. These statement decor
                items blend artistry and sophistication seamlessly.</p>
            </div>

          </div>

        </div>
      </div>
      <!-- ------------ -->

      <!-- ======================== -->
      <!-- =====================  -->
      <!-- our Products -->
      <div class="container bg-light">

        <div class="row p-2">

          <div class="col-md-6">
            <div class="DisplayCardSec">
              <img src="./displayImg/beauty_items.jpg">
              <!-- card body -->
              <div class="card-body">
                <h1 class="card-title">Beauty Items [Kits]</h1>
                <p class="card-info">Makeup Kits Beauty Items Cosmetics Items we have available in very good and very
                  reasonable price</p>
              </div>

            </div>
          </div>

          <div class="col-md-6">
            <div class="DisplayCardSec">
              <img src="./displayImg/file_wallet.jpg">
              <!-- card body -->
              <div class="card-body">
                <h1 class="card-title">Files and Wallets</h1>
                <p class="card-info">Leather Wallets and Best quality work files notes files office files and types
                  we have
                  have available what stuff you want.</p>
              </div>

            </div>
          </div>

        </div>
      </div>
      <!-- ------------ -->

      <!-- ===================  -->
      <!-- OUR SERVICES SECTIOn -->
      <h1 class="text-center fw-bold" style="margin-top: 10px;">Our Services</h1>
      <div class="container bg-dark text-white rounded my-4">
        <div class="row container">

          <div class="col-md-4 py-5">
            <h3 class="text-center fs-5">Fast Delivery</h3>
            <p class="text-center">Fast delivery and a great platform aren't enough. A very fast delivery arm gave
              his
              variations of speed and length added potency. He saw high-profile book releases as a chance not to
              make
              money but to show off the company's fast delivery.</p>
            <h4 style="text-align: center; font-size: 70px; -webkit-text-stroke-width: 1px;
          -webkit-text-stroke-color: white; color: transparent;"><i class="fa-solid fa-truck-fast"></i></h1>
          </div>

          <div class="col-md-4 py-5">
            <h3 class="text-center fs-5">Best Payment Methods</h3>
            <p class="text-center">A payment method refers to the various options available for customers to make
              payments
              when purchasing a product or service. Whether in a physical or online store, payment methods cover a
              range
              of choices. Commonly accepted payment methods include cash, credit cards, debit cards, gift cards,
              and
              mobile payments.</p>
            <h4 style="text-align: center; font-size: 70px; -webkit-text-stroke-width: 1px;
          -webkit-text-stroke-color: white; color: transparent;"><i class="fa-brands fa-amazon-pay"></i></h1>
          </div>

          <div class="col-md-4 py-5">
            <h3 class="text-center fs-5">Best Products</h3>
            <p class="text-center">We can Provide you best and amazing quality products like once you buy the
              product from
              slobiz ecommerce store then we wish you will be satisfied with our product and again in future you
              will be
              buy the products from our store.</p>
            <h4 style="text-align: center; font-size: 70px; -webkit-text-stroke-width: 1px;
          -webkit-text-stroke-color: white; color: transparent;"><i class="fa-solid fa-box-open"></i></h1>
          </div>

          <div class="col-md-4 py-5">
            <h3 class="text-center fs-5">Profile Access</h3>
            <p class="text-center">Our company will provide you complete profile control if you want to delete
              your
              account you can do or you want to do edit some stuff in your profile you can do it easily.</p>
            <h4 style="text-align: center; font-size: 70px; -webkit-text-stroke-width: 1px;
          -webkit-text-stroke-color: white; color: transparent;"><i class="fa-solid fa-address-card"></i></h1>
          </div>

          <div class="col-md-4 py-5">
            <h3 class="text-center fs-5">Giving Warranty</h3>
            <p class="text-center">We are providing you warranty card whenever you received the order with the
              order you
              will also be received warranty card in case if your product that you recieved not good condition
              then you
              can contact to our help center and take the another product.</p>
            <h4 style="text-align: center; font-size: 70px; -webkit-text-stroke-width: 1px;
          -webkit-text-stroke-color: white; color: transparent;"><i class="fa-solid fa-award"></i></h1>
          </div>

          <div class="col-md-4 py-5">
            <h3 class="text-center fs-5">Brand Products</h3>
            <p class="text-center">All the products that you buy from our store are branded so be patient and
              satisfied we
              will provide best branded products in affordable prices.</p>
            <h4 style="text-align: center; font-size: 70px; -webkit-text-stroke-width: 1px;
          -webkit-text-stroke-color: white; color: transparent;"><i class="fa-brands fa-stack-overflow"></i></h1>
          </div>

        </div>
      </div>
      <!-- -------------------- -->
      <!-- ===================== -->
      <!-- FAQ SECTIOn ============= -->


      <div class="accordion" id="accordionExample">
        <h1 class="text-center fw-bold">Frequently Ask Questions</h1>
        <div class="accordion-item ">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button fw-bold bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Are you providing checking Warranty ?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>Yes we are providing checking warranty</strong>If you are not satisfied then on the delivery time or checking time you can declined order
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button fw-bold collapsed bg-success text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Is your store providing card payment ?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>Yes we have also card payment</strong> we have debit / credit card your local easypaisa card all card payments we allow.
            </div>
          </div>
        </div>
        <div class="accordion-item ">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button fw-bold collapsed bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Are you selling branded items in your outlet ?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>Yes we have</strong> branded Items in out outlet if you are satisfied you think our products are not branded good stuff so you don't need to buy because that's all your choice.
            </div>
          </div>
        </div>
      </div>
      <!-- ========================= -->
      <br>
      <!-- last child -->
    </div>
    <?php include("./includes/footer.php") ?>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>