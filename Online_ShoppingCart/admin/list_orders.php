<h3 class="text-center fw-bold">All orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-light text-dark">
        <?php

        $get_orders = "SELECT * from `user_orders`";
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);


        if ($row_count == 0) {
            echo "<h2 class='text-center mt-5'>No orders yet</h2>";
        } else {
            echo "
            <tr>
            <th>Sl no</th>
            <th>Due Amount</th>
            <th>Invoice Number</th>
            <th>Total products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
            </tr>
            </thead>
            <tbody class='table-bordered'>
            ";
            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $order_id = $row_data['order_id'];
                $user_id = $row_data['user_id'];
                $amount_due = $row_data['amount_due'];
                $invoice_number = $row_data['invoice_number'];
                $total_products = $row_data['total_products'];
                $order_date = $row_data['order_date'];
                $order_status = $row_data['order_status'];
                $number++;
                echo "
                    <tr>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$invoice_number</td>
                    <td>$total_products</td>
                    <td>$order_date</td>
                    <td>$order_status</td>
                    <td><a href='index.php?delete_orders=<?php echo $order_id ?>'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
            }
        }

        ?>


        </tbody>
</table>