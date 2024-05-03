<?php
session_start();

// เช็คว่ามีสินค้าในตะกร้าหรือไม่
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // เรียกใช้งานไฟล์ connect.php เพื่อเชื่อมต่อฐานข้อมูล
    require_once('connect.php');

    // ตรวจสอบการส่งข้อมูลจากฟอร์ม
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // รับข้อมูลผู้รับ
        $name = $_POST['name'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        
        $payment_method = $_POST['payment_method'];
    }

// ตรวจสอบว่ามี session ของ username หรือไม่
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // หากไม่มี session ให้เปลี่ยนเส้นทางไปยังหน้า login.html
    exit();
}
// ดึงข้อมูลผู้ใช้จากฐานข้อมูล
$username = $_SESSION['username'];

// สร้างคำสั่ง SQL สำหรับการดึงข้อมูลผู้ใช้
$sql = "SELECT * FROM customer WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "User not found.";
}

// ปิดการเชื่อมต่อ
$conn->close();
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
<link rel="stylesheet" href="css/checkout.css">
<title>Checkout</title>

</head>
<body>
    <div class="container">
    <div class="previous">
        <a href="cart.php" class="btn btn-secondary">ย้อนกลับ</a>
    </div>
        <h2>Checkout</h2>
        <form action="save-checkout.php" method="post" >
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $row['id_cus']; ?>">
                <label for="receiver_name">ชื่อผู้รับ:</label>
                <input type="text" class="form-control" id="receiver_name" name="receiver_name" value="<?php echo $row['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="address">ที่อยู่:</label>
                <textarea class="form-control" id="address" name="address" required><?php echo $row['address'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="tel">เบอร์โทรศัพท์:</label>
                <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $row['tel'] ?>" required>
            </div>
            <div class="form-group">
                <label for="note">Comment:</label>
                <input type="text" class="form-control" id="note" name="note" value="" placeholder="ส่งข้อความถึงผู้ส่ง">
            </div>
            <div class="form-group">
                <label>วิธีการชำระเงิน:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="cash_payment" name="cash_payment" value="Cash">
                    <label class="form-check-label" for="cash_payment">เก็บเงินปลายทาง</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="bank_transfer" name="bank_transfer" value="transfer money">
                    <label class="form-check-label" for="bank_transfer">โอนผ่านธนาคาร</label>
                </div>
            </div>
            <div class="img-slip" style="display: none;">
                <img src="asset/slip.jpg" alt="slip" style="width:370px; height:auto">
                <p style="color: red";>** คำเตือน : เมื่อจ่ายเงินแล้วกรุณาเก็บสลิปโอนเงินเพื่อทำรายการต่อไป</p>
            </div>
            <div class="confirm">
            <button type="submit" class="btn btn-primary">ยืนยันการสั่งซื้อ</button>
            </div>
            
        </form>
    </div>
    <script>
        // เมื่อ checkbox ถูกเลือก
    document.getElementById("bank_transfer").addEventListener("change", function() {
        var imgSlip = document.querySelector(".img-slip");
        // ถ้า checkbox ถูกเลือก
        if (this.checked) {
            imgSlip.style.display = "block"; // แสดงรูป
        } else {
            imgSlip.style.display = "none"; // ซ่อนรูป
        }
    });
    </script>
    <script src="js/checkout.js"></script>
</body>
</html>

<?php
} else {
    // ถ้าไม่มีสินค้าในตะกร้าให้นำไปยังหน้า cart-empty.php
    echo "<script>window.location.href ='cart-empty.php'</script>";
}
?>
