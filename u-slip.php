<?php 
require_once('connect.php');
session_start();

// ตรวจสอบการส่งค่า id ผ่าน URL parameter
if(isset($_GET['id'])) {
    $id_order = $_GET['id'];
} else {
    echo "ไม่ได้ระบุรหัสคำสั่งซื้อ (id_order)";
    exit();
}

if (isset($_POST['submit'])) {
    // ตรวจสอบการอัปโหลดรูปภาพใหม่
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK && !empty($_FILES['image']['name'])) {
        // ตรวจสอบประเภทของไฟล์
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/JPG', 'image/PNG', 'image/JPEG'];
        if (in_array($_FILES['image']['type'], $allowedTypes)) {
            $uploadPath = 'slip/';
            $newFileName = uniqid() . '_' . $_FILES['image']['name'];
            $fullPath = $uploadPath . $newFileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $fullPath)) {
                // อัปเดตฐานข้อมูล
                $sql = "UPDATE orders SET payment_doc = '".$fullPath."' WHERE id_order = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id_order);

                if ($stmt->execute()) {
                    echo '<script> alert("อัปโหลดรูปภาพสำเร็จ!");
                    window.location.href="order-view.php";
                    </script>';
                    exit();
                } else {
                    echo '<script> alert("เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ!")</script>';
                }
            } else {
                echo 'ไม่สามารถอัปโหลดไฟล์ได้';
            }
        } else {
            echo 'ประเภทของไฟล์ไม่ถูกต้อง';
        }
    }
}

mysqli_close($conn);
?>
