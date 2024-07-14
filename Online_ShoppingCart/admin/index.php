<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SLOBIZ - HEART OF ECOMMERCE</title>
  <!-- Bootstrap Link CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css file link  -->
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <!-- Admin Navbar Secion -->
  <div class=" container-fluid p-5 bg-light" style="background-image: linear-gradient(200deg, #78b88be6, #1eda82e6);">
    <!-- first section -->
    <div class="row">

      <div class="col-md-2 bg-light rounded">

        <div class="container  rounded mt-2 text-white p-3 justify-content-center align-items-center"
          style="background-image: linear-gradient(green,white);">
          <span class="pt-2"><i class="fa-brands fa-squarespace"
              style="background-color: green; font-size: 40px; border-radius: 50%; color: black;"></i>
            <span class="text-uppercase fw-bold"
              style="text-shadow: 1px 2px 5px green; font-size: 12px; color: white;">Control
              Panel</span>
          </span>
        </div>


        <h5 class="p-3 text-center fw-bold" style="font-size: 15px;">Manage
          Details <i class="fa-solid fa-people-roof text-success"></i>
        </h5>

        <button class="border-0"><a href="Insert_product.php"
            class="nav-link bg-dark px-4 py-2 text-white rounded my-1 text-center">Insert
            Products <i class="fa-solid fa-file-arrow-down"></i> </a></button>
        <br>

        <button class="border-0"><a href="index.php?view_products"
            class="nav-link bg-dark px-4 py-2 text-white rounded my-1 text-center">View
            Products <i class="fa-solid fa-eye"></i> </a></button>
        <br>

        <button class="border-0"><a href="index.php?insert_category"
            class="nav-link bg-dark px-3 py-2 text-white rounded my-1 text-center">Insert
            Categories <i class="fa-solid fa-layer-group"></i> </a></button> <br>

        <button class="border-0"><a href="index.php?view_categories"
            class="nav-link bg-dark px-3 py-2 text-white rounded my-1 text-center">View
            Categories <i class="fa-solid fa-list"></i> </a></button>
        <br>

        <button class="border-0"><a href="index.php?insert_brand"
            class="nav-link bg-dark px-5 py-2 text-white rounded my-1 text-center">Insert
            Brands <i class="fa-regular fa-copyright"></i> </a></button>
        <br>

        <button class="border-0"><a href="index.php?view_brands"
            class="nav-link bg-dark px-5 py-2 text-white rounded my-1 text-center">View Brands <i
              class="fa-solid fa-qrcode"></i> </a></button>
        <br>

        <button class="border-0"><a href="index.php?list_orders"
            class="nav-link bg-dark px-5 py-2 text-white rounded my-1 text-center">All Orders <i
              class="fa-solid fa-cubes"></i> </a></button>
        <br>

        <button class="border-0"><a href="index.php?list_payments"
            class="nav-link bg-dark px-5 py-2 text-white rounded my-1 text-center">All
            Payments <i class="fa-solid fa-money-check-dollar"></i> </a></button>
        <br>

        <button class="border-0"><a href="index.php?list_users"
            class="nav-link bg-dark px-5 py-2 text-white rounded my-1 text-center">List Users <i
              class="fa-regular fa-user"></i></a></button> <br>

        <button class="border-0"><a href="../admin/admin_login.php"
            class="nav-link bg-dark px-5 py-2 text-white rounded my-1 text-center">Log
            Out <i class="fa-solid fa-power-off"></i></a></button> <br>
        <img src="" alt="">


      </div>


      <!-- fourth Child Section -->
      <div class="col-md-10">
        <a href="./index.php" class="nav-link text-dark fw-bold pt-3">Welcome
          Admin</a>
        <?php
        if (isset($_GET['insert_category'])) {
          include('Insert_categories.php');
        }
        if (isset($_GET['insert_brand'])) {
          include('Insert_brands.php');
        }
        if (isset($_GET['view_products'])) {
          include('view_products.php');
        }
        if (isset($_GET['edit_products'])) {
          include('edit_products.php');
        }
        if (isset($_GET['delete_product'])) {
          include('delete_product.php');
        }
        if (isset($_GET['view_categories'])) {
          include('view_categories.php');
        }
        if (isset($_GET['view_brands'])) {
          include('view_brands.php');
        }
        if (isset($_GET['edit_category'])) {
          include('edit_category.php');
        }
        if (isset($_GET['edit_brands'])) {
          include('edit_brands.php');
        }
        if (isset($_GET['delete_category'])) {
          include('delete_category.php');
        }
        if (isset($_GET['delete_brands'])) {
          include('delete_brands.php');
        }
        if (isset($_GET['list_orders'])) {
          include('list_orders.php');
        }
        if (isset($_GET['delete_orders'])) {
          include('delete_orders.php');
        }
        if (isset($_GET['list_payments'])) {
          include('list_payments.php');
        }
        if (isset($_GET['list_users'])) {
          include('list_users.php');
        }
        ?>
      </div>
    </div>
  </div>

  <!-- footer -->

  <!-- Bootstrap Link JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>

<script type="text/javascript">
  function preventBack() {
    window.history.forward()
  };
  setTimeout("preventBack()", 0);
  window.onunload = function () {
    null;
  }
</script>