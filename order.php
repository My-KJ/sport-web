<?php 
    require_once('connect.php');
    session_start();
    $sql = "SELECT orders.*, customer.name AS customer_name
    FROM orders
    JOIN customer ON orders.id_cus = customer.id_cus;";
    $result = mysqli_query($conn, $sql);
    $conn->close();
   
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
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="css/crud.css">
  <title>คำสั่งซื้อ</title>
</head>

<body>
 

<div class="container mt-5">
    <a class="btn btn-secondary float-left" href="index-e.php" role="button">Previous</a>
<br>
<br>
<H3>คำสั่งซื้อ</H3> 


    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่อลูกค้า</th>
                <th>รายการสินค้า</th>
                <th>ราคารวม</th>
                <th>สถานะ</th>
                <th>ชำระเงินด้วยวิธี</th>
                <th>Comment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) { 
                    if ($row['order_status'] !== "Success") {
                        ?>
                <tr>
                    <td><?php echo $row["id_order"]; ?></td>
                    <td><?php echo $row["customer_name"]; ?></td>
                    <td><?php echo $row["product"]; ?></td>
                    <td style="text-align: right;"> <?php echo $row["total_price"] ?> บาท</td>
                    <td style="text-align: center;"> <?php echo $row['order_status'] ?> </td>
                    <td style="text-align: center;"> <?php echo $row['type_payment'] ?> </td>
                    <td style="text-align: center;"><?php echo $row["note"]; ?></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#my-modal<?php echo $row['id_order'] ?>" 
                                style="width: 105px;"> เพิ่มเติม
                            </button>
                                <a href="edit-order.php?id=<?php echo $row['id_order'] ?>" class="btn btn-warning"> แก้ไข </a>
                        </div>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="my-modal<?php echo $row['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    <p>ชื่อลูกค้า : <?php echo $row['customer_name'] ?></p>
                                    <p>สินค้าทั้งหมด : <?php echo $row['product'] ?></p>
                                    <p>ราคารวม: <?php echo $row['total_price'] ?></p>
                                    <p>ที่อยู่จัดส่ง : <?php echo $row['address_ship'] ?></p>
                                    <p>Tracking NO. : <?php echo $row['tracking_num'] ?></p>
                                    <p>เบอร์ลูกค้า : <?php echo $row['contact'] ?></p>
                                    <?php if ($row['type_payment'] !== "Cash") { ?>
                                        <p>หลักฐานการโอน : 
                                            <br>
                                            <img src="<?php echo $row['payment_doc'] ?>" alt="" style="width: 200px;" > 
                                        </p>
                                    <?php } ?>
                                    <hr>
                                    <p>วันที่และเวลาทำรายการ: <?php echo dateThai($row['order_date']) ?></p>  
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>                                    
                <?php
                            }
                        }
                    } else {
                        echo "0 results";
                    }
                ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready( function () {
    $('#table_id').DataTable();
  } );
</script>
</body>
</html>
