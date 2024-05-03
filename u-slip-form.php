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

// ตรวจสอบว่ามี id_order ใน $_GET หรือไม่
if(isset($_GET['id'])) {
    // If id_order is sent via $_GET, assign it to a variable
    $id_order = $_GET['id'];
} else {
    // ถ้าไม่มี id_order ใน $_GET ให้เลือกการแสดงข้อความเพื่อแจ้งให้ผู้ใช้รู้ว่าต้องการ id_order
    echo "ไม่ได้ระบุรหัสคำสั่งซื้อ (id_order)";
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
    <link rel="stylesheet" href="css/up-sl.css">
    <title>Upload Image Form</title>
</head>
<body>
    <div class="container">
        <a href="order-view.php" class="btn btn-secondary">ย้อนกลับ</a>
    <h2>Upload Image Order No.<?php echo $id_order ?></h2>
    <form action="u-slip.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
        <label for="image">เลือกรูปภาพ:</label><br>
        <input type="file" id="image" name="image"><br><br>
        <input type="submit" value="Upload Image" name="submit">
    </form>
    </div>
</body>
</html>
