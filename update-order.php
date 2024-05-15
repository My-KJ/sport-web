<?php 
require_once('connect.php');
session_start();

if (isset($_POST['submit'])) {
    
        // ถ้าไม่มีการอัปโหลดรูปภาพใหม่ ก็อัปเดตข้อมูลปกติ
        $sql = "UPDATE orders SET 
            order_status = '".$_POST['order_status']."',
            tracking_num = '".$_POST['Tnum']."'
            WHERE id_order = '".mysqli_real_escape_string($conn, $_POST['id'])."' ";

        if (mysqli_query($conn, $sql)) {
            echo '<script> alert("Success!")</script>';
            header('Refresh:0; order.php');
        } else {
            echo '<script> alert("Failed!")</script>';
            echo "Error: " . mysqli_error($conn);
            header('edit-order.php');
        }
    }

mysqli_close($conn);
?>
