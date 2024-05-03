<?php
session_start();
require_once('connect.php');

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/cart-empty.css">
<title>Cart Empty</title>
</head>
<body>
    <div class="container">
        <h1>ไม่พบสินค้าในตะกร้าของคุณ</h1>
        <p>ดูเหมือนว่าคุณยังไม่ได้เพิ่มรายการใด ๆ ลงในรถเข็นของคุณ</p>
        <a href="product.php" class="btn-continue">เลือกซื้อสินค้าต่อไป</a>
    </div>
</body>
</html>
