<?php
session_start();

// เช็คว่ามีตะกร้าสินค้าหรือไม่
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // เรียกใช้งานไฟล์ connect.php เพื่อเชื่อมต่อฐานข้อมูล
    require_once('connect.php');

    // สร้าง query เพื่อดึงข้อมูลสินค้าจากฐานข้อมูล
    $total_price = 0; // ตัวแปรสำหรับเก็บราคารวมของสินค้าทั้งหมด
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
<link rel="stylesheet" href="css/cart.css">
<title>Shopping Cart</title>
</head>
<body>
    <div class="btn">
    <a href="product.php" class="btn btn-secondary">ย้อนกลับ</a>
    </div>
    <div class="container">
    <h1>Your Shopping Cart</h1>
    <table>
        <thead>
            <tr>
                <th style="text-align: center;">รูปภาพ</th>
                <th style="text-align: center;">ชื่อสินค้า</th>
                <th style="text-align: center;">จำนวน</th>
                <th style="text-align: center;">ราคา/ชิ้น</th>
                <th style="text-align: center;">ราคารวม</th>
                <th style="text-align: center;"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($_SESSION['cart'] as $item): ?>
                <?php
                    // ดึงข้อมูลสินค้าจากฐานข้อมูลโดยใช้ ID ที่เก็บในตะกร้า
                    $sql = "SELECT * FROM products WHERE id_pro = '".mysqli_real_escape_string($conn, $item['id'])."' ";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);

                    // คำนวณราคารวมของสินค้าแต่ละรายการ
                    $subtotal = $row['price'] * $item['quantity'];
                    $total_price += $subtotal;
                ?>
                <tr>
                    <td style="text-align: center;">
                        <img src="<?php echo $row['img']; ?>" alt="image" style="width: 150px; height: 150px;">
                    </td>
                    <td style="text-align: center;">
                        <?php echo $item['name']; ?>
                        <?php if(isset($item['size'])) { ?> | <?php echo $item['size']; ?><?php } ?>
                    </td>
                    <td style="text-align: center;"><?php echo $item['quantity']; ?></td>
                    <td style="text-align: right;"><?php echo $item['price']; ?> บาท</td>
                    <td style="text-align: right;"><?php echo $subtotal; ?> บาท</td>
                    <td style="text-align: center;">
                        <a href="cart-remove.php?id=<?php echo $item['id']; ?>" class="btn btn-danger">นำออกจากตะกร้า</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Total:</td>
                <td style="text-align: right;"><?php echo $total_price; ?> บาท</td>
            </tr>
        </tfoot>
    </table>
    <!-- เพิ่มปุ่มหรือลิงก์เพื่อทำการ Checkout -->
    <div class="checkout">
        <a href="checkout.php" class="checkout-btn">สั่งซื้อสินค้า</a>
    </div>
    </div>
    
</body>
</html>

<?php
} else {
    // ถ้าไม่มีสินค้าในตะกร้าให้แสดงข้อความว่า "ตะกร้าสินค้าว่างเปล่า"
    echo "<script>window.location.href ='cart-empty.php'</script>";
}
?>
