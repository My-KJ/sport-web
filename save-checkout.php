<?php
require_once('connect.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs
    $name = mysqli_real_escape_string($conn, $_POST['receiver_name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $id_cus = mysqli_real_escape_string($conn, $_POST['id']);
    $note = isset($_POST['note']) ? mysqli_real_escape_string($conn, $_POST['note']) : '';

    if(isset($_POST['cash_payment'])) {
        $payment_method = $_POST['cash_payment'];
    } elseif(isset($_POST['bank_transfer'])) {
        $payment_method = $_POST['bank_transfer'];
    } else {
        // ถ้าไม่ได้เลือกวิธีการชำระเงินให้กลับไปหน้า Checkout ให้ลองเลือกใหม่อีกครั้ง
        echo '<script> 
        alert("Please select a payment method");
        window.location.href = "checkout.php";
        </script>';
        exit();
    }

    // Calculate total price
    $total_price = 0;
    foreach ($_SESSION['cart'] as $product) {
        $total_price += $product['price'] * $product['quantity'];
    }

        // Prepare SQL statement to insert into orders table
    $sql_order = "INSERT INTO `orders` (id_cus, total_price, note, order_status, address_ship, order_date, contact, type_payment, product, price) 
    VALUES ('$id_cus', 
    '$total_price', 
    '$note', 
    'Waiting to check', 
    '$address', 
    '" . date("Y-m-d H:i:s") . "', 
    '$tel', 
    '$payment_method', ";

    // Prepare arrays to store product details
    $products_array = array();
    $price_per_unit_array = array();

    // Prepare SQL statement to update stock in products table for each product in the cart
    foreach ($_SESSION['cart'] as $product) {
    $product_id = $product['id'];
    $product_quantity = $product['quantity'];
    $product_price = $product['price'];
    $product_name = $product['name'];

    // Retrieve current stock of the product
    $sql_current_stock = "SELECT stock FROM products WHERE id_pro = '$product_id'";
    $result_current_stock = mysqli_query($conn, $sql_current_stock);
    $row_current_stock = mysqli_fetch_assoc($result_current_stock);
    $current_stock = $row_current_stock['stock'];

    // Calculate new stock after deduction
    $new_stock = $current_stock - $product_quantity;

    // Update stock in products table
    $sql_update_stock = "UPDATE products SET stock = '$new_stock' WHERE id_pro = '$product_id'";
    mysqli_query($conn, $sql_update_stock);

    // Add product details to arrays
    $products_array[] = $product_name . " (" . $product_quantity . " ชิ้น)";
    $price_per_unit_array[] = $product_price;
    }

    // Concatenate product details arrays into strings
    $products_string = implode(", ", $products_array);
    $price_per_unit_string = implode(", ", $price_per_unit_array);

    // Append product details strings to SQL statement
    $sql_order .= "'$products_string', '$price_per_unit_string')";

    // Execute SQL query to insert into orders table
    if (mysqli_query($conn, $sql_order)) {
    // Clear the cart after successful order placement
    unset($_SESSION['cart']);

    // Redirect to a success page
    echo '<script> 
        alert("บันทึกข้อมูลสำเร็จ");
        window.location.href = "index-c.php";
    </script>';
    exit();
    } else {
    // Error handling
    echo '<script> 
        alert("Error occurred: ' . mysqli_error($conn) . '");
        window.location.href = "checkout.php";
    </script>';
    exit();
    }
}

?>