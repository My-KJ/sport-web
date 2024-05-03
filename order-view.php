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

$username = $_SESSION['username'];

// สร้างคำสั่ง SQL สำหรับการดึง id_cus จากฐานข้อมูล
$sql_id_cus = "SELECT id_cus FROM customer WHERE username = ?";
$stmt_id_cus = $conn->prepare($sql_id_cus);
$stmt_id_cus->bind_param("s", $username);
$stmt_id_cus->execute();
$result_id_cus = $stmt_id_cus->get_result();

if ($result_id_cus->num_rows > 0) {
    // หากพบข้อมูล
    $row_id_cus = $result_id_cus->fetch_assoc();
    $id_cus = $row_id_cus['id_cus'];

    // สร้างคำสั่ง SQL สำหรับการดึงข้อมูลการสั่งซื้อของลูกค้าที่ล็อกอิน
    $sql = "SELECT * FROM orders WHERE id_cus = ? ORDER BY order_date DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_cus);
    $stmt->execute();
    $result = $stmt->get_result();}

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
    <link rel="stylesheet" href="css/order-v.css">
    <title>View Order</title>
</head>
<body>

<!-- Navbar -->
<nav class="navbar fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index-c.php">
            <img src="asset/BANGPHRA SPORT PNG 3.png" alt="" width="150px" height="auto">
        </a>
        <div class="btn-group">
            <a href="profile-c.php" type="button" class="btn">โปรไฟล์</a>
            <a href="cart.php" type="button" class="btn">ตะกร้าสินค้า</a>
            <a href="logout.php" type="button" class="btn">ออกจากระบบ</a>
        </div>
    </div>
</nav>
<!-- Navbar -->
<div class="container-fluid-main">
    <div class="tip">
    </div>
  </div>

<div class="container">
    <h1>รายการสั่งซื้อ</h1>
    <div class="order-list" style="list-style-type: none;">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
            <div class='order'>
            <p><strong>รหัสการสั่งซื้อ:</strong> <?php  echo $row['id_order']   ?> </p> 
            <p><strong>สินค้า:</strong> <?php  echo $row['product']   ?> </p>
            <p><strong>ราคารวม:</strong> <?php  echo $row['total_price']   ?></p>
            <p><strong>สถานะ:</strong> <?php  echo $row['order_status']   ?></p>

            <?php
                if ($row['order_status'] === "Shipping") { ?>
                    <form action="update_order_status.php" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $row['id_order']; ?>">
                        <button type="submit" class="btn btn-success" name="update_status">ฉันได้เช็คและตรวจสอบแล้ว</button>
                    </form>
            <?php } ?>       

            <div class="warning">
            <?php
            if ($row['type_payment'] === "transfer money") { 
                if (empty($row['payment_doc'])) {
            ?>
                <div class="warning" style="display: flex; justify-content: space-between;">
                    <p style="color:red;">*กรุณาอัปโหลดข้อมูลการโอนเงิน</p>
                    <a href="u-slip-form.php?id=<?php echo $row['id_order']; ?>" class="btn" style="color: #1c1c1c;background-color: #6ac077;">อัปโหลด</a>
                </div>
            <?php
                }
            }
            ?>
            </div>
            </div>
            <?php
        } 
        }else {
            echo ('ไม่มีข้อมูล');
        }
        ?>
    </div>
</div>
</body>
</html>
