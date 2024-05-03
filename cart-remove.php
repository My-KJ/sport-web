<?php
session_start();

// ตรวจสอบว่ามีข้อมูลสินค้าที่ต้องการลบออกจากตะกร้าหรือไม่
if(isset($_GET['id'])) {
    $id_to_remove = $_GET['id'];

    // ตรวจสอบว่าตะกร้าสินค้าไม่ว่าง
    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        // ลูปเพื่อหาสินค้าที่ต้องการลบ
        foreach($_SESSION['cart'] as $key => $item) {
            if($item['id'] == $id_to_remove) {
                // ตรวจสอบว่าสินค้านั้นมี qty มากกว่า 1 หรือไม่
                if($item['quantity'] > 1) {
                    // ลด qty ลง 1
                    $_SESSION['cart'][$key]['quantity'] -= 1;
                } else {
                    // ถ้า qty เท่ากับ 1 ให้ลบสินค้านั้นออกจากตะกร้า
                    unset($_SESSION['cart'][$key]);
                }
                // Redirect กลับไปยังหน้าตะกร้า
                header("Location: cart.php");
                exit();
            }
        }
    }
}

// ถ้าไม่มีข้อมูลสินค้าที่ต้องการลบ หรือตะกร้าว่าง ให้ Redirect กลับไปยังหน้าตะกร้า
header("Location: cart.php");
exit();
?>
