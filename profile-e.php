<?php
 session_start(); // เริ่ม session
 require_once('connect.php');

 // ตรวจสอบว่ามี session ของ username หรือไม่
 if (!isset($_SESSION['username'])) {
     header("Location: index.php"); // หากไม่มี session ให้เปลี่ยนเส้นทางไปยังหน้า login.html
     exit();
 }
 // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
 $username = $_SESSION['username'];

 // สร้างคำสั่ง SQL สำหรับการดึงข้อมูลผู้ใช้
 $sql = "SELECT * FROM employee WHERE username=?";
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
<link rel="stylesheet" href="css/emp-pro.css">
    <title>Profile Employee</title>
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
        <?php if (!isset($_SESSION['username']) || $_SESSION['type'] === 'admin') : ?>
            <a class="btn" href="index-a.php" type="button">ย้อนกลับ</a>
        <?php else: ?>
            <a class="btn" href="index-e.php" type="button">ย้อนกลับ</a>
        <?php endif; ?>
        <a href="logout.php" type="button" class="btn">ออกจากระบบ</a>
        </div>
    </div>
    </nav>
    <!-- Navbar -->

    <!-- Body -->
    <div class="container">
      <div class="box">
        <h1>พื้นที่โฆษณา</h1>
      </div>
      <h1><b> Profile </b></h1>
      <div class="container-profile">
      <div class="profile-box">
        <div class="be-box">
        <h5> ข้อมูลส่วนตัว </h5>
        <a href="emp-form-update.php?id=<?php echo $row['id_emp'] ?>" class="btn btn-dark"> แก้ไข </a>
        </div>
        <hr>
        <p> ชื่อ :  <?php echo $row["name"]; ?> </p>
        <p> ชื่อผู้ใช้งาน : <?php echo $row["username"]; ?> </p>
        <p> E-Mail : <?php echo $row["email"]; ?> </p>
        <p> เบอร์โทรศัพท์ : <?php echo $row["tel"]; ?> </p>
       </div>
       <div class="profile-box">
       <div class="be-box">
        <h5> ที่อยู่ </h5>
        <a href="emp-form-update.php?id=<?php echo $row['id_emp'] ?>" class="btn btn-dark"> เปลี่ยน </a>
        </div>
        <hr>
        <p> ที่อยู่ : 
          <a href="https://www.google.com/maps/search/<?php echo urlencode($row["address"]); ?>" target="_blank">
            <p>  <?php echo $row["address"]; ?> </p>
          </a> 
        </p>
        <p>ตำแหน่ง : <?php echo $row["type"]; ?></p>
       </div>
       </div>
    </div>
    <!-- Body -->


</body>
</html>