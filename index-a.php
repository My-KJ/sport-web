<?php
 session_start();
 require_once('connect.php');

 // ตรวจสอบว่ามีการล็อกอินแล้วหรือไม่
 if (!isset($_SESSION['username'])) {
   // หากยังไม่ได้ล็อกอิน ให้ redirect ไปยังหน้า index.php
   echo "<script>
   alert('Please! login');
   window.location.href='index.php';
   </script>";
   exit(); // จบการทำงานของสคริปต์ที่นี่
 }
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
<link rel="stylesheet" href="css/index-a.css">
    <title>Admin page</title>
</head>
<body>
    <!-- Navbar -->
<nav class="navbar fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index-a.php">
      <img src="asset/BANGPHRA SPORT PNG 3.png" alt="" width="150px" height="auto">
    </a>
    <div class="btn-group">
    <a href="order-all.php" type="button" class="btn">Sale Info</a>
    <a href="profile-e.php" type="button" class="btn">โปรไฟล์</a>
    <a href="logout.php" type="button" class="btn">ออกจากระบบ</a>
    </div>
  </div>
</nav>
<!-- Navbar -->

<!-- Body -->
<div class="sport-body">
 
</div>
<div class="container">
  <img src="asset/product-e.png" onclick="window.location.href='product-e.php';">
  <img src="asset/M-empmnge.png" onclick="window.location.href='employee-info.php';">
  <img src="asset/S-sale.png" onclick="window.location.href='total-sale.php';">
  <img src="asset/User info.png" onclick="window.location.href='customer-info.php';">
</div>
<!-- Body -->

<!-- Footer -->
<footer> 
    <div class="container-fluid-foot">
    <h3>Contact</h3>
    <p>ผู้จัดทำ: ธนพล มะหอม<br>
    
    <div class="icon">
      <a href="#"><i class="fas fa-solid fa-envelope"></i> : tanapol.mah@rmutto.ac.th</a>
      <br> 
      <a href="https://web.facebook.com/LeCoRDeR"><i class="fab fa-facebook-f"></i> : Tanapol Mahom</a>
      <br>
      <a href="https://maps.app.goo.gl/i83KEXxwtQJz7dUD6"><i class="fas fa-map-marked-alt"></i> : Bangphra Sport & Store</a>
    </div>
    </div>
</footer>
<!-- Footer -->
    
</body>
</html>