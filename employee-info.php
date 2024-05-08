<?php 
    require_once('connect.php');
    session_start();
    $sql = "SELECT * FROM employee";
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
  <title>Employee Info</title>
</head>

<body>
 

<div class="container mt-5">
    <a class="btn btn-secondary float-left" href="index-a.php" role="button">Previous</a>
    <a class="btn btn-primary float-right" href="form-create-emp.php" role="button" >เพิ่มข้อมูลพนักงาน</a>
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
                    <td style="text-align: center;"><?php echo $row["id_emp"]; ?></td>
                    <td style="text-align: center;"><?php echo $row["name"]; ?></td>
                    <td style="text-align: center;"><?php echo $row["username"]; ?></td>
                    <td style="text-align: center;"><?php echo $row["tel"]; ?></td>
                    <td style="text-align: center;"><?php echo $row['email'] ?> </td>
                    <td style="text-align: center;"><?php echo $row["type"]; ?></td>
                    <td style="text-align: center;">
                        <div class="btn-group">
                            <button class="btn btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#my-modal<?php echo $row['id_emp'] ?>" 
                                style="width: 105px;"> เพิ่มเติม 
                            </button>
                                <a href="admin-update-emp.php?id=<?php echo $row['id_emp'] ?>" class="btn btn-warning">แก้ไข</a>
                        </div>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="my-modal<?php echo $row['id_emp'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>ชื่อผู้ใช้งาน : <?php echo $row['username'] ?></p>
                                <p>ชื่อพนักงาน : <?php echo $row['name'] ?></p>
                                <p>เบอร์โทรศัพท์ : <?php echo $row['tel'] ?></p>
                                <p>E-Mail : <?php echo $row['email'] ?></p>
                                <p>ตำแหน่ง : <?php echo $row['type'] ?></p>
                                <p>Status : <?php echo $row['status'] ?></p>
                                <hr>
                                <p>ที่อยู่ : <?php echo $row['address'] ?></p>
                                        
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
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready( function () {
    $('#table_id').DataTable();
  } );
</script>
</body>
</html>
