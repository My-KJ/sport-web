<?php 
      require_once('connect.php');
      session_start();
      if(!isset($_GET['id'])){
          header("location: ./");
          exit();
      }
      $sql = "SELECT orders.*, customer.name AS customer_name
      FROM orders
      JOIN customer ON orders.id_cus = customer.id_cus
      WHERE orders.id_order = '".mysqli_real_escape_string($conn, $_GET['id'])."' ";

      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
   
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order Systems </title>
    <!-- favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="icon.ico">
    <!-- Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .flex-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #F5F8FF;
        }
    </style>
</head>
<body>
<div class="flex-container">
    <div class="container">
        <div class="shadow rounded p-5 bg-body h-100">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h1 class="mb-5"> Edit Orders </h1>
                    <h3>แก้ไข และ ตรวจสอบออร์เดอร์</h3>
                    <form class="row gy-4" action="update-order.php" method="POST" enctype="multipart/form-data">
                        <div class="col-md-4">
                            <label for="name" class="form-label">ชื่อลูกค้า: </label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name of Products" value="<?php echo $row['customer_name'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="form-label">เบอร์ลูกค้า: </label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name of Products" value="<?php echo $row['contact'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="form-label">Note: </label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Note...." value="<?php echo $row['note'] ?>" readonly>
                        </div>
                        <?php if ($row['type_payment'] !== "Cash" && !empty($row['payment_doc'])) { ?>
                            <div class="image" style="text-align: center;">
                                <img src="<?php echo $row['payment_doc'] ?>" alt="Image Preview" id="image-preview" style="width: 250px;">   
                            </div>
                        <?php } else { ?>
                            <p style="text-align: center;">ยังไม่มีการอัปโหลด หลักฐานการโอนเงิน</p>
                        <?php } ?>
                        <div class="col-md-4">
                            <label for="Dcript" class="form-label">ข้อมูลการจ่ายเงิน</label>
                            <input type="text" class="form-control" id="Dcript" name="Dcript" placeholder="Descript" value="<?php echo $row['type_payment'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="Dcript" class="form-label">ราคาสินค้า (รวม)</label>
                            <input type="text" class="form-control" id="Dcript" name="Dcript" placeholder="Descript" value="<?php echo $row['total_price'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="order_status" class="form-label">สถานะคำสั่งซื้อ</label>
                            <select class="form-select" id="order_status" name="order_status" required>
                                <?php if($row['order_status'] === "Success"): ?>
                                    <option value="<?php echo $row['order_status'] ?>" selected disabled><?php echo $row['order_status'] ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $row['order_status'] ?>" selected><?php echo $row['order_status'] ?></option>
                                    <option value="Waiting to check">ขั้นตอนการเช็ค</option>
                                    <option value="Shipping">กำลังส่ง</option>
                                    <option value="Success">การส่งสำเร็จ</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="Tnum" class="form-label">Tracking Number </label>
                            <input type="text" class="form-control" id="Tnum" name="Tnum" placeholder="Tracking Number" value="<?php echo $row['tracking_num'] ?>">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" >
                        <div class="col-12" style="margin: 16px;">
                            <button type="submit" name="submit" class="btn btn-primary d-block mx-auto">Accept</button>
                        </div>
                    </form>
                    <a href="order.php" class="btn btn-secondary">Previous</a>
                </div>  
            </div>
        </div>
        
    </div>
</div>
<?php 
    if (isset($_POST['submit'])) {
        // Your update logic here
    }
    ?>
</body>
</html>