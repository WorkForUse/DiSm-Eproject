<?php
include('../includes/connect.php');
session_start();
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    // echo $order_id;
    $select_data = "SELECT * FROM `user_orders` WHERE order_id=$order_id";
    $result = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "INSERT INTO `user_payments` (order_id,invoice_number,amount,payment_mode) VALUES ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result = mysqli_query($con, $insert_query);
    if ($result) {
        echo "<h3 class='text-center'>Successfully Completed the process of the payment</h3>";
        echo "<script>window.open('profile.php?my_orders', '_self')</script>";
    }
    $update_orders = "UPDATE `user_orders` SET order_status = 'Complete' WHERE order_id = $order_id";
    $result_orders = mysqli_query($con, $update_orders);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- -------=-=-=------======== -->
</head>
<style>
    .mainDomm {
        /* background-color: sandybrown; */
        padding: 50px;
    }

    /* ============= */
    .leftSec {
        padding: 50px;
    }

    .leftSec h1 {
        text-align: left;
        font-weight: bolder;
        font-style: italic;
    }

    .leftSec input {
        padding: 10px;
        width: 100%;
        border: 5px solid black;
        color: green;
        font-weight: bold;
        text-align: center;
        font-size: 20px;
    }

    .leftSec .sl {
        padding: 10px;
        width: 100%;
        border: 5px solid black;
        color: whitesmoke;
        font-weight: bold;
        text-align: center;
        font-size: 20px;
        width: 100%;
        background-color: black;
    }

    .leftSec .submission {
        margin-top: 100px;
    }

    /* ============ */
    .rightSec {
        padding: 50px;
        margin-top: 50px;
        border-left: 2px solid black;
    }

    .rightSec label {
        text-align: left;
        font-weight: bolder;
        font-style: italic;
        font-size: 30px;
    }

    .rightSec input {
        padding: 2px 5px;
        width: 100%;
        border: 1px solid black;
        color: green;
        font-weight: bold;
        text-align: center;
        font-size: 20px;
        margin-top: 20px;
    }
</style>

<body>



    <div class="row mainDomm" style="display: grid; place-items: center;">
        <h1 class=" text-center fw-bold">Confirm Payment</h1>
        <div class="col-md-6">
            <!-- LEFT SECTION -->
            <form action="" method="post" class="leftSec">
                <div class="form-outline my-4 text-center">
                    <h1>Order id</h1>
                    <input type="text" class="form-control" name="invoice_number" value="<?php echo $invoice_number ?>">
                </div>
                <div class="form-outline my-4 text-center">
                    <h1>Amount Due</h1>
                    <input type="text" class="form-control" name="amount" value="<?php echo $amount_due ?>">
                </div>
                <div class="form-outline my-5 text-center">
                    <select name="payment_mode" class="form-select sl" require=required>
                        <option>Select Payment Method</option>
                        <option>Cash on Delivery</option>
                        <option name="netbanking">Online NetBanking</option>

                    </select>
                </div>
                <!-- CARD NUMBER -->

                <label for="cc-number" class="control-label">CARD NUMBER</label>
                <input type="tel" id="cc-number" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder=".... .... .... ...." name="" require=required>
                <!-- CARD EXPIRY DATE -->
                <label for="cc-exp" class="control-label">CARD EXPIRY DATE</label>
                <input type="tel" id="cc-exp" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder=".. / .." name="" require=required>
                <!-- CARD CVC -->
                <label for="cc-cvc" class="control-label">CARD CVC</label>
                <input type="tel" id="cc-cvc" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="...." name="" require=required>
                <!-- CARD HOLDER NAME -->
                <label for="numberic" class="control-label">CARD HOLDER NAME</label>
                <input type="text" class="input-lg form-control" require=required>

                <div class="form-outline text-center submission">
                    <input type="submit" class="bg-success text-light fw-bold fs-5 py-2 px-3 border-0 rounded text-uppercase" value="Confirm" name="confirm_payment" require>
                </div>
            </form>
            <!-- ------ -->
        </div>


    </div>

</body>

</html>

<?php

// ... existing code ...

if (isset($_POST['confirm_payment'])) {
    // ... existing code ...

    // Card validation
    $card_number = $_POST['cc-number'];
    $card_expiry_date = $_POST['cc-exp'];
    $card_cvc = $_POST['cc-cvc'];
    $card_holder_name = $_POST['numberic'];

    $card_valid = true; // Assume valid initially

    // Validate card number using Luhn algorithm
    if (!luhn_check($card_number)) {
        $card_valid = false;
        $error_message .= "Invalid card number.<br>";
    }

    // Validate expiry date (e.g., check format and expiration)
    if (!validate_expiry_date($card_expiry_date)) {
        $card_valid = false;
        $error_message .= "Invalid card expiry date.<br>";
    }

    // Validate CVC length
    if (strlen($card_cvc) !== 3) {
        $card_valid = false;
        $error_message .= "Invalid card CVC.<br>";
    }

    // Validate cardholder name (e.g., alphanumeric characters only)
    if (!preg_match("/^[a-zA-Z0-9 ]+$/", $card_holder_name)) {
        $card_valid = false;
        $error_message .= "Invalid cardholder name.<br>";
    }

    if ($card_valid) {
        // Process payment if card details are valid
        // ... existing payment processing code ...
    } else {
        // Display error messages
        echo "<div class='alert alert-danger'>$error_message</div>";
    }
}

// ... existing code ...

// Luhn algorithm function
function luhn_check($number)
{
    settype($number, 'string');
    $sumTable = array(
        array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9),
        array(0, 2, 4, 6, 8, 1, 3, 5, 7, 9)
    );
    $sum = 0;
    $flip = 0;
    for ($i = strlen($number) - 1; $i >= 0; $i--) {
        $sum += $sumTable[$flip++ & 0x1][$number[$i]];
    }
    return $sum % 10 === 0;
}

// Expiry date validation function
function validate_expiry_date($expiry_date)
{
    // Split the expiry date into month and year
    $parts = explode("/", $expiry_date);

    if (count($parts) !== 2) {
        return false; // Invalid format (should be MM/YY)
    }

    // Extract month and year values
    $month = (int) $parts[0];
    $year = (int) $parts[1];

    // Validate month (1-12)
    if ($month < 1 || $month > 12) {
        return false;
    }

    // Validate year (future date)
    $current_year = date("Y", time());
    $current_month = date("m", time());

    if ($year < $current_year || ($year === $current_year && $month < $current_month)) {
        return false; // Expired date
    }

    return true; // Valid expiry date
}


?>