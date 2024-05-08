<?php 
      require_once('connect.php');
      session_start();
      if(!isset($_GET['id'])){
          header("location: ./");
          exit();
      }
      $sql = "SELECT * FROM products WHERE id_pro = '".mysqli_real_escape_string($conn, $_GET['id'])."' ";
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
    <title>Edit Product Page </title>
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
                    <h1 class="mb-5"> Edit Product Systems </h1>
                    <h3>Edit Products</h3>
                    
                    
                    <form class="row gy-4" action="update.php" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name of Products" value="<?php echo $row['name'] ?>" required>
                        </div>
                        <div class="image">
                            <img src="<?php echo $row['img'] ?>" alt="Image Preview" id="image-preview" style="max-width: 120px;">   
                            <br>
                            <br>                   
                            <input type="file" name="image" id="image" accept="image/*" value="<?php echo $row['img'] ?>" >
                        </div>
                        <div class="col-md-12">
                            <label for="Dcript" class="form-label">ข้อมูลสินค้า</label>
                            <input type="text" class="form-control" id="Dcript" name="Dcript" placeholder="Descript" value="<?php echo $row['descript'] ?>">
                            <p style="color: red">*** ถ้าต้องการขึ้นบรรทัดใหม่พิมพ์ '<' ตามด้วย 'br' และ '>'</p>
                        </div>  
                        <div class="col-md-2">
                            <label for="size" class="form-label" style="display: flex;">Size <p style="font-size: 12px;"> *เช่น ไซส์ S</p></label>
                            <input type="text" class="form-control" id="size" name="size_s" placeholder="เช่น ไซส์ S" value="<?php echo $row['size_s'] ?>" required>
                        </div>
                        <div class="col-md-2">
                            <label for="size" class="form-label" style="display: flex;">Size <p style="font-size: 12px;"> *เช่น ไซส์ M</p></label>
                            <input type="text" class="form-control" id="size" name="size_m" placeholder="เช่น ไซส์ M" value="<?php echo $row['size_m'] ?>" required>
                        </div>
                        <div class="col-md-2">
                            <label for="size" class="form-label" style="display: flex;">Size <p style="font-size: 12px;"> *เช่น ไซส์ L</p></label>
                            <input type="text" class="form-control" id="size" name="size_l" placeholder="เช่น ไซส์ L" value="<?php echo $row['size_l'] ?>" required>
                        </div>
                        <div class="col-md-2">
                            <label for="size" class="form-label" style="display: flex;">Size <p style="font-size: 12px;"> *เช่น ไซส์ XL</p></label>
                            <input type="text" class="form-control" id="size" name="size_xl" placeholder="เช่น ไซส์ XL" value="<?php echo $row['size_xl'] ?>" required>
                        </div>
                        <div class="col-md-2">
                            <label for="size" class="form-label" style="display: flex;">Size <p style="font-size: 12px;"> *เช่น ไซส์ 2XL</p></label>
                            <input type="text" class="form-control" id="size" name="size_2xl" placeholder="เช่น ไซส์ 2XL" value="<?php echo $row['size_2xl'] ?>" required>
                        </div>
                        <div class="col-md-5">
                            <label for="price" class="form-label">ราคา</label>
                            <input type="number" class="form-control" id="price" name="price" min="0" max="999999" placeholder="Price" value="<?php echo $row['price'] ?>" required>
                        </div>
                        <div class="col-md-5">
                            <label for="status" class="form-label">สถานะสินค้า</label>
                            <select class="form-select" id="status" name="status" required>
                                    <option value="" selected disabled><?php echo $row['status'] ?></option>
                                    <option value="Out of Stock">สินค้าหมด</option>
                                    <option value="Not Sale">สินค้าเลิกขาย</option>
                                    <option value="Ready to Sale">พร้อมขาย</option>
                                </select>
                        </div>

                        <div class="col-md-3">
                            <label for="type" class="form-label">ประเภทสินค้า</label>
                            <select class="form-select" id="type" name="type" required>
                                    <option value="" selected disabled><?php echo $row['type'] ?></option>
                                    <option value="Football">Football</option>
                                    <option value="Badminton">Badminton</option>
                                    <option value="Basketball">Basketball</option>
                                    <option value="Pant">กางเกง</option>
                                    <option value="Shirt">เสื้อ</option>
                                    <option value="Sock">ถุงเท้า</option>
                                    <option value="G.Gloves">ถุงมือผู้รักษาประตู</option>
                                    <option value="Gaiter">สนับแข้ง</option>
                                    <option value="Cap">หมวก</option>
                                </select>
                        </div>
                        
                        <div class="row" style="margin-top:7px">
                            <div class="col-md-6">
                                <label for="brnd" class="form-label">แบรนด์</label>
                                <select class="form-select" id="brnd" name="brnd" required>
                                    <option value="" selected disabled><?php echo $row['brand'] ?></option>
                                    <option value="WARRIX">WARRIX</option>
                                    <option value="GRAND SPROT">Grand Sport</option>
                                    <option value="IMANE">IMANE</option>
                                    <option value="FBT">FBT</option>
                                    <option value="EGO SPORT">EGO Sport</option>
                                    <option value="H3 SPORT">H3 Sport</option>
                                    <option value="CADENZA">CADENZA Sport</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="CGR" class="form-label">หมวดหมู่สินค้า</label>
                                <select class="form-select" id="CGR" name="CGR" required>
                                    <option value="" selected disabled><?php echo $row['category'] ?></option>
                                    <option value="Tools">อุปกรณ์กีฬา</option>
                                    <option value="Shirt">เสื้อ</option>
                                    <option value="Pant">กางเกง</option>
                                    <option value="Sock">ถุงเท้า</option>
                                    <option value="Jipata">อุปกรณ์อื่นๆ</option>
                                </select>
                            </div>
                        </div>
                            
                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" >
                        <div class="col-12" style="margin: 16px;">
                            <button type="submit" name="submit" class="btn btn-primary d-block mx-auto">Accept</button>
                        </div>
                    </form>
                    <a href="crud.php" class="btn btn-warning">Previous</a>
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