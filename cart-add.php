<?php
session_start();
require_once('connect.php');

// ตรวจสอบว่ามีข้อมูลสินค้าที่ร้องขอเพิ่มเข้าตะกร้าหรือไม่
if(isset($_POST['id']) && isset($_POST['quantity'])) {
    // สร้าง query เพื่อดึงข้อมูลสินค้าจากฐานข้อมูลโดยใช้ ID ที่ส่งมาจากหน้า product.php
    $sql = "SELECT * FROM products WHERE id_pro = '".mysqli_real_escape_string($conn, $_POST['id'])."' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // ตรวจสอบว่ามีข้อมูลสินค้าหรือไม่
    if($row) {
        // สร้าง array ของรายการสินค้าใหม่
        $new_item = array(
            'id' => $_POST['id'],
            'image' => $row['img'], // เพิ่มภาพสินค้า
            'name' => $row['name'], // เพิ่มชื่อสินค้า
            'price' => $row['price'],
            'quantity' => $_POST['quantity']
        );

        // ตรวจสอบว่ามีการส่งข้อมูลไซส์มาหรือไม่
        if(isset($_POST['size'])) {
            // เพิ่มข้อมูลไซส์เข้าไปในรายการสินค้า
            $new_item['size'] = $_POST['size'];
        }

        // ตรวจสอบว่ามีสินค้าที่เหมือนกันในตะกร้าหรือไม่
        $item_found = false;
        if(isset($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as &$item) {
                if($item['id'] == $new_item['id'] && $item['size'] == $new_item['size']) {
                    // เพิ่มจำนวนสินค้าในตะกร้า
                    $item['quantity'] += $new_item['quantity'];
                    $item_found = true;
                    break;
                }
            }
        }

        // ถ้าไม่มีสินค้าที่เหมือนกันในตะกร้าให้เพิ่มสินค้าใหม่เข้าไป
        if(!$item_found) {
            // ถ้ายังไม่มีตะกร้าสินค้า ให้สร้างตะกร้าขึ้นมา
            if(!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            // เพิ่มรายการสินค้าใหม่เข้าไปในตะกร้า
            $_SESSION['cart'][] = $new_item;
        }

        // Redirect กลับไปยังหน้าสินค้าหลังจากเพิ่มสินค้าลงในตะกร้า
        header("Location: cart.php");
        exit();
    } else {
        // หากไม่พบสินค้า ให้ redirect กลับไปยังหน้าสินค้า
        echo '<script> 
                alert("Error: Product not found!  ' . mysqli_error($conn) . '");
                window.location.href = "product.php";
                </script>';
        exit();
    }
} else {
    // หากไม่มีข้อมูลสินค้า ให้ redirect กลับไปยังหน้าสินค้า
    echo '<script> 
                alert("Error: Missing product data!  ' . mysqli_error($conn) . '");
                window.location.href = "product.php";
                </script>';
    exit();
}
?>
