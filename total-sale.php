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

// คำสั่ง SQL สำหรับดึงยอดขายรวมจากตาราง orders
$sql = "SELECT SUM(total_price) AS total_sales FROM orders";
$result = mysqli_query($conn, $sql);

// ตรวจสอบว่ามีผลลัพธ์หรือไม่
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalSales = $row['total_sales'];
} else {
    $totalSales = 0; // ถ้าไม่มีผลลัพธ์ให้กำหนดเป็น 0
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Sales Report</title>
    <!-- สำหรับสไตล์เราจะใช้ CSS เพื่อทำให้กราฟดูสวยงาม -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            text-align: center;
        }
        .chart {
            border: 1px solid #ddd;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Total Sales Report</h1>
        <!-- ตำแหน่งที่แสดงยอดขายรวม -->
        <div id="totalSales" class="chart"></div>
    </div>
    <!-- สคริปต์สำหรับดึงข้อมูลและสร้างกราฟ -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script>
        // ดึงข้อมูลจากตัวแปร PHP และใช้ในการสร้างกราฟ
        var totalSales = <?php echo $totalSales; ?>;
        
        // สร้างกราฟแท่งแสดงยอดขายรวม
        var data = [{
            x: ['Total Sales'],
            y: [totalSales],
            type: 'bar'
        }];

        var layout = {
            title: 'Total Sales',
            yaxis: {
                title: 'Sales (บาท)'
            }
        };

        Plotly.newPlot('totalSales', data, layout);
    </script>
</body>
</html>
