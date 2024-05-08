<?php 
require_once('connect.php');
session_start();

if (isset($_POST['submit'])) {
    // ตรวจสอบว่ามีการอัปโหลดรูปภาพใหม่หรือไม่
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK && !empty($_FILES['image']['name'])) {
        // ตรวจสอบประเภทของไฟล์
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/JPG', 'image/PNG', 'image/JPEG'];
        if (in_array($_FILES['image']['type'], $allowedTypes)) {
            $uploadPath = 'img/';
            $newFileName = uniqid() . '_' . $_FILES['image']['name'];
            $fullPath = $uploadPath . $newFileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $fullPath)) {
                // ถ้าอัปโหลดรูปภาพใหม่สำเร็จ ก็ทำการอัปเดตฐานข้อมูล
                $sql = "UPDATE products SET 
                    name = '".htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8')."',
                    price = '".$_POST['price']."', 
                    status = '".$_POST['status']."',
                    descript = '".$_POST['Dcript']."',                
                    category = '".$_POST['CGR']."', 
                    type = '".htmlspecialchars($_POST['type'], ENT_QUOTES, 'UTF-8')."',
                    brand = '".htmlspecialchars($_POST['brnd'], ENT_QUOTES, 'UTF-8')."',
                    size_s = '".htmlspecialchars($_POST['size_s'], ENT_QUOTES, 'UTF-8')."',
                    size_m = '".htmlspecialchars($_POST['size_m'], ENT_QUOTES, 'UTF-8')."',
                    size_l = '".htmlspecialchars($_POST['size_l'], ENT_QUOTES, 'UTF-8')."',
                    size_xl = '".htmlspecialchars($_POST['size_xl'], ENT_QUOTES, 'UTF-8')."',
                    size_2xl = '".htmlspecialchars($_POST['size_2xl'], ENT_QUOTES, 'UTF-8')."',
                    img = '".$fullPath."',
                    updated_date = '".date("Y-m-d H:i:s")."'
                    WHERE id_pro = '".mysqli_real_escape_string($conn, $_POST['id'])."' ";

                if (mysqli_query($conn, $sql)) {
                    echo '<script> alert("Success!")</script>';
                    header('Refresh:0; crud.php');
                } else {
                    echo '<script> alert("Failed!")</script>';
                    echo "Error: " . mysqli_error($conn);
                    header('form-update.php');
                }
            } else {
                echo 'ไม่สามารถอัปโหลดไฟล์ได้';
            }
        } else {
            echo 'ประเภทของไฟล์ไม่ถูกต้อง';
        }
    } else {
        // ถ้าไม่มีการอัปโหลดรูปภาพใหม่ ก็อัปเดตข้อมูลปกติ
        $sql = "UPDATE products SET 
            price = '".$_POST['price']."',
             status = '".$_POST['status']."',
            descript = '".$_POST['Dcript']."',                
            category = '".$_POST['CGR']."', 
            type = '".htmlspecialchars($_POST['type'], ENT_QUOTES, 'UTF-8')."',
            brand = '".htmlspecialchars($_POST['brnd'], ENT_QUOTES, 'UTF-8')."',
            size_s = '".htmlspecialchars($_POST['size_s'], ENT_QUOTES, 'UTF-8')."',
            size_m = '".htmlspecialchars($_POST['size_m'], ENT_QUOTES, 'UTF-8')."',
            size_l = '".htmlspecialchars($_POST['size_l'], ENT_QUOTES, 'UTF-8')."',
            size_xl = '".htmlspecialchars($_POST['size_xl'], ENT_QUOTES, 'UTF-8')."',
            size_2xl = '".htmlspecialchars($_POST['size_2xl'], ENT_QUOTES, 'UTF-8')."',
            updated_date = '".date("Y-m-d H:i:s")."'
            WHERE id_pro = '".mysqli_real_escape_string($conn, $_POST['id'])."' ";

        if (mysqli_query($conn, $sql)) {
            echo '<script> alert("Success!")</script>';
            header('Refresh:0; crud.php');
        } else {
            echo '<script> alert("Failed!")</script>';
            echo "Error: " . mysqli_error($conn);
            header('form-update.php');
        }
    }
}

mysqli_close($conn);
?>