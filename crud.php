<?php 
    require_once('connect.php');
    session_start();
    $sql = "SELECT * FROM products";
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
  <title>Product</title>
</head>

<body>
 

<div class="container mt-5">
    <a class="btn btn-secondary float-left" href="product-e.php" role="button">Previous</a>
    <a class="btn btn-primary float-right" href="form-create-product.php" role="button" >เพิ่มสินค้าในระบบ</a>
<br>
<br>
<H3>All Product</H3> 


    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่อ</th>
                <th>รูปภาพ</th>
                <th style="text-align: center;">ราคา</th>
                <th style="text-align: center;">แบรนด์</th>
                <th style="text-align: center;">สถานะสินค้า</th>
                <th style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["id_pro"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td> 
                        <?php 
                            // แสดงรูปภาพ
                            echo '<img src="' . $row['img'] . '" alt="Product Image" style="max-width: 100%; height: 50px;">';
                        ?> 
                    </td>
                    <td style="text-align: right;"> <?php echo $row["price"] ?> บาท</td>
                    <td style="text-align: center;"> <?php echo $row['brand'] ?> </td>
                    <td style="text-align: center;"> <?php echo $row['status'] ?> </td>
                    <td style="text-align: center;">
                        <div class="btn-group">
                            <button class="btn btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#my-modal<?php echo $row['id_pro'] ?>" 
                                style="width: 105px;"> เพิ่มเติม
                            </button>
                                <a href="form-update-product.php?id=<?php echo $row['id_pro'] ?>" class="btn btn-warning"> แก้ไข </a>
                        </div>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="my-modal<?php echo $row['id_pro'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>ชื่อสินค้า : <?php echo $row['name'] ?></p>
                                    <p>รูปภาพ :
                                    <br>
                                        <?php
                                        echo '<img src="' . $row['img'] . '" alt="Product Image" style="max-width: 40%;">';
                                        ?>
                                    </p>
                                    <p>
                                        <?php if ($row['size_s'] > 0) { ?>
                                            ไซส์ : <?php echo $row['size_s'] ?> <br>
                                        <?php } ?>
                                        
                                        <?php if ($row['size_m'] > 0) { ?>
                                            ไซส์ : <?php echo $row['size_m'] ?> <br>
                                        <?php } ?>
                                        
                                        <?php if ($row['size_l'] > 0) { ?>
                                            ไซส์ : <?php echo $row['size_l'] ?> <br>
                                        <?php } ?>
                                        
                                        <?php if ($row['size_xl'] > 0) { ?>
                                            ไซส์ : <?php echo $row['size_xl'] ?> <br>
                                        <?php } ?>
                                        
                                        <?php if ($row['size_2xl'] > 0) { ?>
                                            ไซส์ : <?php echo $row['size_2xl'] ?> <br>
                                        <?php } ?>
                                    </p>
                                        <p> ราคา : <?php echo $row['price'] ?></p>
                                        <p>หมวดหมู่สินค้า : <?php echo $row['category'] ?></p>
                                        <p>ชนิด : <?php echo $row['type'] ?></p>
                                        <hr>
                                        <p>Created Date: <?php echo dateThai($row['created_date']) ?></p>
                                        <p>Updated Date: <?php echo dateThai($row['updated_date']) ?></p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>                                    
                <?php
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
