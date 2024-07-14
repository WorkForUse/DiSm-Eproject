<h3 class="text-center text-dark fw-bold">All Categories</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-dark text-white">
        <tr>
            <th style="background-color: grey; color: white;">Sl No</th>
            <th style="background-color: grey; color: white;">Category Title</th>
            <th style="background-color: grey; color: white;">Edit</th>
            <th style="background-color: grey; color: white;">Delete</th>
        </tr>
    </thead>
    <tbody class="bg-light text-dark">
        <?php
        $select_cat = "SELECT * FROM `categories`";
        $result = mysqli_query($con, $select_cat);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $number++;
        ?>
            <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $category_title; ?></td>
                <td><a href='index.php?edit_category=<?php echo $category_id ?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_category=<?php echo $category_id ?>'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>