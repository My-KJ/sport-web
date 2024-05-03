<?php 
    require_once('connect.php');
    session_start();
    $sql = "SELECT * FROM customer";
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
  <title>Customer Info </title>
</head>

<body>
 

<div class="container mt-5">
    <?php if (!isset($_SESSION['username']) || $_SESSION['type'] === 'admin') : ?>
          <a href="index-a.php" type="button" class="btn btn-secondary">ย้อนกลับ</a>
        <?php else: ?>
          <a href="index-e.php" type="button" class="btn btn-secondary">ย้อนกลับ</a>
        <?php endif; ?>
    <br>
    <br>
    <H3>Manage Employee System</H3> 

    <div class="container">

    <table id="table_id" class="display">
        <thead>
            <tr>
                <th style="text-align: center;">#</th>
                <th style="text-align: center;">ชื่อ</th>
                <th style="text-align: center;">ชื่อผู้ใช้งาน</th>
                <th style="text-align: center;">เบอร์โทรศัพท์</th>
                <th style="text-align: center;">E-Mail</th>
                <th style="text-align: center;">ตำแหน่ง</th>
                <th style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td style="text-align: center;"><?php echo $row["id_cus"]; ?></td>
                    <td style="text-align: center;"><?php echo $row["name"]; ?></td>
                    <td style="text-align: center;"><?php echo $row["username"]; ?></td>
                    <td style="text-align: center;"><?php echo $row["tel"]; ?></td>
                    <td style="text-align: center;"><?php echo $row['email'] ?> </td>
                    <td style="text-align: center;"><?php echo $row['type'] ?> </td>
                    <td style="text-align: center;">
                        <div class="btn-group">
                                <a href="admin-update-cus.php?id=<?php echo $row['id_cus'] ?>" class="btn btn-primary">แก้ไข</a>
                        </div>
                    </td>
                </tr>                                    
                <?php
                        }
                    } else {
                        echo "0 results";
                    }
                ?>
        </tbody>
    </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready( function () {
    $('#table_id').DataTable();
  } );
</script>
</body>
</html>
