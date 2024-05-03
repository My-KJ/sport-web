<?php
require_once('connect.php');
session_start();
if(!isset($_GET['id'])){
    header("location: ./");
    exit();
}
$sql = "SELECT * FROM products WHERE id_pro = '".mysqli_real_escape_string($conn, $_GET['id'])."' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

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
    <title>Product Page</title>
    <link rel="stylesheet" href="css/product-de.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top">
    <div class="container-fluid">
        <?php if (!isset($_SESSION['username']) || $_SESSION['type'] === 'admin') : ?>
            <a class="navbar-brand" href="index-a.php">
        <img src="asset/BANGPHRA SPORT PNG 3.png" alt="" width="150px" height="auto">
        </a>
        <?php else: ?>
            <a class="navbar-brand" href="index-e.php">
        <img src="asset/BANGPHRA SPORT PNG 3.png" alt="" width="150px" height="auto">
        </a>
        <?php endif; ?>
        
        <div class="btn-group">
        <a href="product-e.php" type="button" class="btn">ย้อนกลับ</a>
        <a href="crud.php" type="button" class="btn">การจัดการ</a>
        <a href="logout.php" type="button" class="btn">ออกจากระบบ</a>
        </div>
    </div>
    </nav>
    <!-- Navbar -->
    <!-- Body -->
    <div class="container">
    <div class="product">
        <div class="product-image">
        <img src="<?php echo $row['img']; ?>" alt="Product Image" style="width: 500px;" >
        </div>
        <div class="product-details">
            <?php if ($row['stock'] == 0): ?>
                <h5 class="price">ราคา : สินค้าหมดชั่วคราว</h5>
            <?php else: ?>
                <h5 class="price">ราคา : <?php echo $row['price']; ?> บาท</h5>
            <?php endif; ?>
            <?php if ($row['size_s'] > 0 || $row['size_m'] > 0 || $row['size_l'] > 0 || $row['size_xl'] > 0 || $row['size_2xl'] > 0) { ?>
            <div class="btn-size">
                <h5>Size</h5>
                <?php if ($row['size_s'] > 0) { ?>
                    <button class="btn btn-dark" value="<?php echo $row['size_s'] ?>">
                        <?php echo $row['size_s'] ?>
                    </button>
                <?php } ?>
                <?php if ($row['size_m'] > 0) { ?>
                    <button class="btn btn-dark" value="<?php echo $row['size_m'] ?>">
                        <?php echo $row['size_m'] ?>
                    </button>
                <?php } ?>
                <?php if ($row['size_l'] > 0) { ?>
                    <button class="btn btn-dark" value="<?php echo $row['size_l'] ?>">
                        <?php echo $row['size_l'] ?>
                    </button>
                <?php } ?>
                <?php if ($row['size_xl'] > 0) { ?>
                    <button class="btn btn-dark" value="<?php echo $row['size_xl'] ?>">
                        <?php echo $row['size_xl'] ?>
                    </button>
                <?php } ?>
                <?php if ($row['size_2xl'] > 0) { ?>
                    <button class="btn btn-dark" value="<?php echo $row['size_2xl'] ?>">
                        <?php echo $row['size_2xl'] ?>
                    </button>
                <?php }} ?>
            </div>
        </div>
    </div>
    <div class="container-detail">
    <p><?php echo $row['descript']; ?></p>
    </div>
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
