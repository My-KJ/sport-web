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
        <a class="navbar-brand" href="index-c.php">
        <img src="asset/BANGPHRA SPORT PNG 3.png" alt="" width="150px" height="auto">
        </a>
        <div class="btn-group">
        <a href="product.php" type="button" class="btn">ย้อนกลับ</a>
        <a href="profile-c.php" type="button" class="btn">โปรไฟล์</a>
        <a href="cart.php" type="button" class="btn">ตะกร้าสินค้า</a>
        <a href="order-view.php" type="button" class="btn">คำสั่งซื้อ</a>
        <a href="logout.php" type="button" class="btn">ออกจากระบบ</a>
        </div>
    </div>
    </nav>
    <!-- Navbar -->
    <!-- Body -->
    <div class="container">
    <form action="cart-add.php" method="post">
    <div class="product">
        <div class="product-image">
        <input type="hidden" name="id" value="<?php echo $row['id_pro']; ?>">
        <img name="image" src="<?php echo $row['img']; ?>" alt="Product Image" style="width: 500px;" >
        </div>
        <div class="product-details">
            <h1><?php echo $row['name']; ?></h1>
                <h5 class="price">ราคา : <?php echo $row['price']; ?> บาท</h5>
            <?php if ($row['size_s'] > 0 || $row['size_m'] > 0 || $row['size_l'] > 0 || $row['size_xl'] > 0 || $row['size_2xl'] > 0) { ?>
                <div class="list-size mb-2">
                    <h5>Size</h5>
                    <select class="form-select" name="size">
                        <?php if ($row['size_s'] > 0) { ?>
                            <option value="<?php echo $row['size_s'] ?>"><?php echo $row['size_s'] ?></option>
                        <?php } ?>
                        <?php if ($row['size_m'] > 0) { ?>
                            <option value="<?php echo $row['size_m'] ?>"><?php echo $row['size_m'] ?></option>
                        <?php } ?>
                        <?php if ($row['size_l'] > 0) { ?>
                            <option value="<?php echo $row['size_l'] ?>"><?php echo $row['size_l'] ?></option>
                        <?php } ?>
                        <?php if ($row['size_xl'] > 0) { ?>
                            <option value="<?php echo $row['size_xl'] ?>"><?php echo $row['size_xl'] ?></option>
                        <?php } ?>
                        <?php if ($row['size_2xl'] > 0) { ?>
                            <option value="<?php echo $row['size_2xl'] ?>"><?php echo $row['size_2xl'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php } ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Quantity</span>
                    </div>
                    <input type="number" class="form-control" name="quantity" value="1" min="1" max="100" required>
                </div>
            <button class="addtocart" type="submit"> เพิ่มสินค้าลงตะกร้า </button>
    </div>
    </form>
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
<script>
    const sizeButtons = document.querySelectorAll('.size-btn');

    sizeButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // ป้องกันการส่งฟอร์ม
            const selectedSize = this.value;
            // ทำสิ่งที่คุณต้องการกับขนาดที่เลือกที่นี่ เช่น แสดงข้อความหรือดำเนินการอื่น ๆ
            console.log('Selected size:', selectedSize);
        });
    });
</script>
</body>
</html>
