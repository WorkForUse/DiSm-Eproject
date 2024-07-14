<?php

include('../includes/connect.php');
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';
    // accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    //accessing image temp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];
    // checking empty condition
    if ($product_title == '' or $description == '' or $product_keywords == '' or $product_category == '' or $product_brands == '' or $product_price == '' or $product_image1 == '' or $product_image2 == '' or $product_image3 == '') {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // insert query

        $insert_products = "INSERT INTO `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) VALUES ('$product_title','$description','$product_keywords','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";

        $result_query = mysqli_query($con, $insert_products);

        if ($result_query) {
            echo "<script>alert('Successfully inserted the products')</script>";
            echo "<script>window.open('../admin/index.php', '_self')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <!-- Bootstrap Link CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file link  -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">

    <div class="container mt-3" style="background-image: linear-gradient(148deg, rgba(128,160,118,0.9), rgba(4,184,100,0.9));">
        <h1 class="text-center fw-bold">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">

            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label fw-bold fs-5 text-white">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label fw-bold fs-5 text-white">Product description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>

            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label fw-bold fs-5 text-white">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>

            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" class="form-select">
                    <option value="">Select a category</option>
                    <?php
                    $select_query = "SELECT * FROM `categories`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" class="form-select">
                    <option value="">Select a brands</option>
                    <?php
                    $select_query = "SELECT * FROM `brands`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- image one -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label fw-bold fs-5 text-white">Product Image One</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>

            <!-- image two -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label fw-bold fs-5 text-white">Product Image Two</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>

            <!-- image three -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label fw-bold fs-5 text-white">Product Image Three</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label fw-bold fs-5 text-white">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <!-- submit btn -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-warning text-dark fw-bold mb-3 px-3" value="Insert Product">
                <span style="margin-bottom: 50px;">
                    <a href="./index.php" style="background-color: black; color: white; padding: 10px; border-radius: 10px; text-decoration: none; font-weight: bolder;">Go
                        back</a>
            </div>

        </form>

    </div>

</body>

</html>