<style>
    .product_img {
        width: 30%;
        object-fit: contain;
    }
</style>

<h1 class="text-center text-white fw-bold">ALL PRODUCTS</h1>
<!-- table -->
<table class="table table-bordered border-dark mt-5 text-center">
    <thead class="bg-dark text-white fw-bold">
        <tr>
            <th style="background-color: grey; color: white;">Product ID</th>
            <th style="background-color: grey; color: white;">Product Title</th>
            <th style="background-color: grey; color: white;">Product Image</th>
            <th style="background-color: grey; color: white;">Product Price</th>
            <th style="background-color: grey; color: white;">Total Sold</th>
            <th style="background-color: grey; color: white;">Status</th>
            <th style="background-color: grey; color: white;">Edit</th>
            <th style="background-color: grey; color: white;">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_products = "SELECT * FROM `products`";
        $result = mysqli_query($con, $get_products);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $status = $row['status'];
            $number++;
        ?>
            <tr class="text-center">
                <td>
                    <?php echo $number; ?>
                </td>
                <td>
                    <?php echo $product_title; ?>
                </td>
                <td><img scr='./product_images/<?php echo $product_image1; ?>' class='product_img' /></td>
                <td>
                    <?php echo $product_price; ?>/-
                </td>

                <td>
                    <?php
                    $get_count = "SELECT * from `orders_pending` WHERE product_id = $product_id";
                    $result_count = mysqli_query($con, $get_count);
                    $rows_count = mysqli_num_rows($result_count);
                    echo $rows_count;
                    ?>
                </td>
                <td>
                    <?php echo $status; ?>
                </td>
                <td><a href='index.php?edit_products=<?php echo $product_id ?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_product=<?php echo $product_id ?>'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>