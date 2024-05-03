<?php
    require_once('connect.php');
    session_start();

    $order_id = $_POST['order_id'];

    // อัปเดตสถานะ order_status เป็น "Success"
    $query = "UPDATE orders SET order_status = 'Success' WHERE id_order = $order_id";
    $statement = $conn->prepare($query);
    $statement->execute();

    // ส่งกลับไปยังหน้าที่แสดงรายการออร์เดอร์หลังจากอัปเดตสถานะ
    echo '<script> alert("ผู้รับได้รับของครบถ้วนดี!");
                    window.location.href="order-view.php";
                    </script>';
    exit;
?>
