<?php
session_start();
require_once('connect.php'); // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่ามีการล็อกอินแล้วหรือไม่
if (!isset($_SESSION['username'])) {
    // หากยังไม่ได้ล็อกอิน ให้ redirect ไปยังหน้า index.php
    echo "<script>
        alert('Please! login');
        window.location.href='index.php';
        </script>";
    exit(); // จบการทำงานของสคริปต์ที่นี่
}

// ตรวจสอบว่ามีการส่งค่า brand ผ่าน URL หรือไม่
if(isset($_GET['brand'])) {
    $selected_brand = $_GET['brand'];
    // คำสั่ง SQL เพื่อดึงข้อมูลสินค้าตามแบรนด์ที่เลือก
    $sql_product = "SELECT * FROM `products` WHERE `brand` = '$selected_brand'";
} else {
    // ถ้าไม่ได้รับค่า brand ให้แสดงสินค้าทั้งหมด
    $sql_product = "SELECT * FROM `products`";
}

$result = $conn->query($sql_product);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/p.duct.css">
    <title>Filtered Products</title>
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
                <a href="logout.php" type="button" class="btn">ออกจากระบบ</a>
                <a href="crud.php" type="button" class="btn">การจัดการ</a>
                <a href="product-e.php" type="button" class="btn">ย้อนกลับ</a>
            </div>
        </div>
    </nav>
<!-- Navbar -->

<!-- Body -->
    <div class="container-fluid-main">

        <div class="container" style="margin-top: 15px;">

            <div class="row">
                <h1>สินค้าจาก <b><?php echo $selected_brand ?></b></h1>

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row['status'] === 'Out of Stock') {
                            ?>
                            <!-- สินค้าหมด -->
                            <div class="col-md-3">   
                                <div class="card mb-3">
                                    <input type="hidden" name="id" value="<?php echo $row['id_pro']; ?>">
                                    <img src="<?php echo $row['img'] ?>" class="card-img-top" alt="" style="width: auto; height: 300px;">
                                    <div class="card-body">
                                        <h5 class="card-title"><b> <?php echo $row['brand'] ?> </b></h5>
                                        <p class="card-text"> <?php echo $row['name'] ?> </p>
                                        <div class="btn-card">
                                            <button class="btn btn-danger" disabled>สินค้าหมด</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                          } elseif ($row['status'] === 'Not Sale') {
                          ?>
                          <!-- สินค้าไม่ขาย -->
                          <div class="col-md-3">   
                              <div class="card mb-3">
                                  <input type="hidden" name="id" value="<?php echo $row['id_pro']; ?>">
                                  <img src="<?php echo $row['img'] ?>" class="card-img-top" alt="" style="width: auto; height: 300px;">
                                  <div class="card-body">
                                      <h5 class="card-title"><b> <?php echo $row['brand'] ?> </b></h5>
                                      <p class="card-text"> <?php echo $row['name'] ?> </p>
                                      <div class="btn-card">
                                          <button class="btn btn-secondary" disabled>สินค้าไม่ขาย</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <?php
                      } else {
                          ?>
                          <!-- สินค้าพร้อมจำหน่าย -->
                          <div class="col-md-3">   
                              <div class="card mb-3">
                                  <input type="hidden" name="id" value="<?php echo $row['id_pro']; ?>">
                                  <img src="<?php echo $row['img'] ?>" class="card-img-top" alt="" style="width: auto; height: 300px;">
                                  <div class="card-body">
                                      <h5 class="card-title"><b> <?php echo $row['brand'] ?> </b></h5>
                                      <p class="card-text"> <?php echo $row['name'] ?> </p>
                                      <div class="btn-card">
                                          <a href="product-info-e.php?id=<?php echo $row['id_pro'] ?>" style="width:auto;" class="btn btn-success">รายละเอียดสินค้า</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <?php
                      }
                  }
                }
                ?>

            </div>
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
