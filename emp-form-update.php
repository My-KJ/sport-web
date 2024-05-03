<?php
require_once('connect.php');
session_start();

// Check if ID is provided in the URL
if(!isset($_GET['id'])) {
    header("location: ./");
    exit();
}

// Fetch employee data based on ID from the URL
$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM employee WHERE id_emp = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo "<script>
    alert('Please login');
    window.location.href='index.php';
    </script>";
    exit();
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
    <link rel="stylesheet" href="css/update-pro.css">
    <title>Edit Profile</title>
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
                <a href="profile-e.php" type="button" class="btn">ย้อนกลับ</a>
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
                    <h5> แก้ไขข้อมูลส่วนตัว </h5>
                </div>
                <hr>
                <form action="emp-updated.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id_emp']; ?>">
                    <p> ชื่อผู้ใช้งาน : <?php echo $row["username"]; ?></p>
                    <p> ชื่อ : <input type="text" class="form-control" id="name" name="name" placeholder="Input Your Name" value="<?php echo $row['name'] ?>" required ></p>
                    <p> รหัสผ่าน(Password) : 
                        <input type="password" class="form-control" id="password" name="password" placeholder="Input Your Password">
                    </p>
                    <p> ยืนยันรหัสผ่านอีกครั้ง : 
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Your Password">
                    </p><p> E-Mail : <input type="email" class="form-control" id="email" name="email" placeholder="Input Your Email" value="<?php echo $row['email'] ?>" required ></p>
                    <p> เบอร์โทรศัพท์ : <input type="text" class="form-control" id="tel" name="tel" placeholder="Input Your Telephone Number" value="<?php echo $row['tel'] ?>" required ></p>
            </div>
            <div class="profile-box">
                <div class="be-box">
                    <h5> แก้ไขที่อยู่จัดส่ง </h5>
                </div>
                <hr>
                <p> ที่อยู่จัดส่ง : </p>
                <textarea type="text" class="form-control" id="add" name="add" placeholder="Input Your Address" value="<?php echo $row['address'] ?>" required ><?php echo $row['address'] ?></textarea>
                <div class="container-prof">
                    <button type="submit" name="submit" class="btn btn-dark"> ยืนยัน </button>
                </div>
            </div>
            </form>
        </div>
    </div>  
    <!-- Body -->
</body>
</html>