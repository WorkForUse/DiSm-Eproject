<style>
  @import url('https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap');

  @import url('https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&display=swap');
</style>


<?php

// getting products
function getproducts()
{
  global $con;

  // condition to check isset or not
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
      $select_query = "SELECT * FROM `products` order by rand() limit 0,3";
      // $select_query = "SELECT * FROM `products` order by rand()";
      // $select_query = "SELECT * FROM `products` order by product_title";
      $result_query = mysqli_query($con, $select_query);
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4'>
              <div class='card p-2' style='height: 100%; background-color: #e2dfdb;'>
            <img src='./admin/product_images/$product_image1' alt='$product_title' width='100%' height='250px' class='rounded'>
            <div class='card-body'>
              <h2 class='card-title' style='font-family: Protest Riot;'>$product_title</h2>
              <p class='card-text' style='font-family: Advent Pro;'>$product_description</p>
              <p class='card-text fw-bold'>Price : $product_price /-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart <i class='fa-solid fa-cart-shopping'></i></a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View More <i class='fa-solid fa-eye'></i></a>
            </div>
          </div>
            </div>";
      }
    }
  }
}

// getting all products
function get_all_products()
{
  global $con;

  // condition to check isset or not
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
      $select_query = "SELECT * FROM `products`";
      $result_query = mysqli_query($con, $select_query);
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4 my-1'>
              <div class='card p-3 m-1' style='height: 100%; background-color: #e2dfdb;'>
            <img src='./admin/product_images/$product_image1' alt='$product_title' width='100%' height='250px' class='rounded'>
            <div class='card-body'>
              <h5 class='card-title' style='font-family: Protest Riot;'>$product_title</h5>
              <p class='card-text' style='font-family: Advent Pro;'>$product_description</p>
              <p class='card-text fw-bold'>Price : $product_price /-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View More <i class='fa-solid fa-eye'></i></a>
            </div>
          </div>
            </div>";
      }
    }
  }
}

// getting unique categories

function get_unique_categories()
{
  global $con;

  // condition to check isset or not
  if (isset($_GET['category'])) {
    $category_id = $_GET['category'];
    $select_query = "SELECT * FROM `products` where category_id = $category_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='text-danger fw-bold' style='padding: 150px; margin-left: 150px;'>No Stock Found for this Category &#128230;</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-3'>
              <div class='card p-3 m-1' style='height: 50%; background-color: #e2dfdb;'>
            <img src='./admin/product_images/$product_image1' alt='$product_title' width='100%' height='250px' class='rounded'>
            <div class='card-body'>
              <h5 class='card-title' style='font-family: Protest Riot;'>$product_title</h5>
              <p class='card-text' style='font-family: Advent Pro;'>$product_description</p>
              <p class='card-text fw-bold'>Price : $product_price /-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View More <i class='fa-solid fa-eye'></i></a>
            </div>
          </div>
            </div>";
    }
  }
}



function get_unique_brands()
{
  global $con;

  // condition to check isset or not
  if (isset($_GET['brands'])) {
    $brand_id = $_GET['brands'];
    $select_query = "SELECT * FROM `products` where brand_id = $brand_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='text-center text-danger fw-bold text-uppercase'>This Brand Not Found for this Service</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-3'>
                <div class='card'>
              <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price : $product_price /-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More <i class='fa-solid fa-eye'></i></a>
              </div>
            </div>
              </div>";
    }
  }
}




// displaying brands inside nav 
function getbrands()
{
  global $con;
  $select_brands = "SELECT * FROM `brands`";
  $result_brands = mysqli_query($con, $select_brands);
  while ($row_data = mysqli_fetch_assoc($result_brands)) {
    $brand_title = $row_data['brand_title'];
    $brand_id = $row_data['brand_id'];
    echo "<div style='display: inline-block; padding: 10px;'>
                      <a href='index.php?brand=$brand_id' class='nav-link text-white'>$brand_title</a>
                    </div>";
  }
}

// displaying categories in sidenav
function getcategories()
{
  global $con;
  $select_categories = "SELECT * FROM `categories`";
  $result_categories = mysqli_query($con, $select_categories);
  while ($row_data = mysqli_fetch_assoc($result_categories)) {
    $category_title = $row_data['category_title'];
    $category_id = $row_data['category_id'];
    echo "<div class='container-fluid fw-bold m-2 p-3 bg-light'> <a href='index.php?category=$category_id' class='nav-link'>$category_title</a> </div>";
  }
}

// Searching Products Function
function search_product()
{
  global $con;
  if (isset($_GET['search_data_product'])) {
    $search_data_value = $_GET['search_data'];
    $search_query = "SELECT * FROM `products` where product_keywords LIKE '%$search_data_value%'";
    $result_query = mysqli_query($con, $search_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<div style='padding: 50px;'>
        <h2 class='text-center fs-2 fw-bold'>No Result Match product <sup><i class='fa-solid fa-dolly fs-1'></i></sup> Found for this Category </h2>
      </div>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class='col-md-4 mb-3'>
            <div class='card' style='background-color: #e2dfdb;'>
          <img src='./admin/product_images/$product_image1' alt='$product_title' width='100%' height='250px'>
          <div class='card-body'>
            <h5 class='card-title' style='font-family: Protest Riot;'>$product_title</h5>
            <p class='card-text' style='font-family: Advent Pro;'>$product_description</p>
            <p class='card-text fw-bold'>Price : $product_price /-</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View More <i class='fa-solid fa-eye'></i></a>
          </div>
        </div>
          </div>";
    }
  }
}

// View Details Function
function view_details()
{
  global $con;

  // condition to check isset or not
  if (isset($_GET['product_id'])) {
    if (!isset($_GET['category'])) {
      if (!isset($_GET['brand'])) {
        $product_id = $_GET['product_id'];
        $select_query = "SELECT * FROM `products` where product_id = $product_id";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_image2 = $row['product_image2'];
          $product_image3 = $row['product_image3'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];
          echo "
          <div style='position: relative;'>
            <div class='col-md-6'>
              <div class='card' style='background-color: #e2dfdb;'>
            <img src='./admin/product_images/$product_image1' alt='$product_title' width='100%' height='500px' class='rounded'>
            <div class='card-body'>
              <h1 class='card-title' style='font-family: Protest Riot; font-size: 50px;'>$product_title</h1>
              <p class='card-text' style='font-family: Advent Pro; font-size: 15px; font-weight: bolder;'>$product_description</p>
              <p class='card-text fw-bold fs-1'>Price : $product_price /-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-success' style='padding: 20px 50px; font-size: 20px; font-weight: bolder;'>Add to Cart</a>
              <a href='index.php' class='btn btn-dark' style='padding: 20px 50px; font-size: 20px; font-weight: bolder;'><i class='fa-solid fa-rotate-left'></i> Go Back </a>
            </div>
          </div>
          <!-- related -->
            <div class='col-md-6' style='position: absolute; left: 50%; top: 0%; display: flex; flex-direction: column; margin: 10px;'>
              <img src='./admin/product_images/$product_image2' alt='$product_title' width='15%'>
              <img src='./admin/product_images/$product_image3' alt='$product_title' width='15%'>
                  </div>
          </div>
        </div>

            ";
        }
      }
    }
  }
}

// get ip address function
function getIPAddress()
{
  // whether ip is from the share internet
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  // whether ip is from proxy
  elseif (!empty($_SERVER['HTTP_X_FORWARD_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARD_FOR'];
  }
  // whether ip is from the remote address
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
// $ip = getIPAddress();
// echo 'User Real Ip Address - ' . $ip;

// cart function
function cart()
{
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id = $_GET['add_to_cart'];

    $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add' AND product_id = $get_product_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows > 0) {
      echo "<script>alert('This item is already present inside cart')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    } else {

      $insert_query = "INSERT INTO `cart_details` (product_id,ip_address, quantity) VALUES ($get_product_id,'$get_ip_add',0)";
      $result_query = mysqli_query($con, $insert_query);
      echo "<script>alert('Item is added to cart')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    }
  }
}

// function to get cart item numbers
function cart_item()
{
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $get_ip_add = getIPAddress();
    $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
    $result_query = mysqli_query($con, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);
  } else {
    global $con;
    $get_ip_add = getIPAddress();
    $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
    $result_query = mysqli_query($con, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);
  }
  echo $count_cart_items;
}

// total price function
function total_cart_price()
{
  global $con;
  $get_ip_add = getIPAddress();
  $total_price = 0;
  $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
  $result = mysqli_query($con, $cart_query);
  while ($row = mysqli_fetch_array($result)) {
    $product_id = $row['product_id'];
    $select_products = "SELECT * FROM `products` WHERE product_id = '$product_id'";
    $result_products = mysqli_query($con, $select_products);
    while ($row_product_price = mysqli_fetch_array($result_products)) {
      $product_price = array($row_product_price['product_price']);
      $product_values = array_sum($product_price);
      $total_price += $product_values;
    }
  }
  echo $total_price;
}

// get user order details
function get_user_order_details()
{
  global $con;
  $username = $_SESSION['username'];
  $get_details = "Select * from `user_table` where username = '$username'";
  $result_query = mysqli_query($con, $get_details);
  while ($row_query = mysqli_fetch_array($result_query)) {
    $user_id = $row_query['user_id'];
    if (!isset($_GET['edit_account'])) {
      if (!isset($_GET['my_orders'])) {
        if (!isset($_GET['delete_account'])) {
          $get_orders = "Select * from `user_orders` where user_id = $user_id and order_status = 'pending'";
          $result_orders_query = mysqli_query($con, $get_orders);
          $row_count = mysqli_num_rows($result_orders_query);
          if ($row_count > 0) {
            echo "<h3 class='text-center mt-3 fw-bold'>You have <span class='text-info'>$row_count</span>pending orders</h3>
                  <p class='text-center'><a class='text-dark text-decoration-none fw-bold' href='profile.php?my_orders'>Order Details</a></p>";
          } else {
            echo "<h3 class='text-center mt-3 fw-bold'>You have Zero pending orders</h3>
                  <p class='text-center'><a class='text-dark text-decoration-none fw-bold' href='../index.php'>Explore products</a></p>";
          }
        }
      }
    }
  }
}
