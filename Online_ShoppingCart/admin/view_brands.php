<h3 class="text-center text-dark fw-bold">All Brands</h3>
<table class="table table-bordered mt-5 text-center">
  <thead class="bg-dark text-white">
    <tr>
      <th style="background-color: grey; color: white;">Sl No</th>
      <th style="background-color: grey; color: white;">Brand Title</th>
      <th style="background-color: grey; color: white;">Edit</th>
      <th style="background-color: grey; color: white;">Delete</th>
    </tr>
  </thead>
  <tbody class="bg-light text-dark">
    <?php
    $select_cat = "SELECT * FROM `brands`";
    $result = mysqli_query($con, $select_cat);
    $number = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      $brand_id = $row['brand_id'];
      $brand_title = $row['brand_title'];
      $number++;
    ?>
      <tr>
        <td><?php echo $number; ?></td>
        <td><?php echo $brand_title; ?></td>
        <td><a href='index.php?edit_brands=<?php echo $brand_id ?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_brands=<?php echo $brand_id ?>' type="button" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<!-- ------ b ------ -->

<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this ?</h4>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary"><a class="text-decoration-none" href='index.php?delete_brands=<?php echo $brand_id ?>'>Yes</a></button>

        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands" class="text-white text-decoration-none">No</a></button>

      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>