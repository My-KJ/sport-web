<?php
require_once('connect.php');
session_start();

// ตรวจสอบว่ามีค่า search ใน URL หรือไม่
if(isset($_GET['search'])) {
    // รับค่า search จาก URL
    $search_query = $_GET['search'];

    // สร้าง query เพื่อค้นหาข้อมูล
    $sql = "SELECT * FROM sport_b WHERE name LIKE '%$search_query%' OR category LIKE '%$search_query%' OR type LIKE '%$search_query%' OR brand LIKE '%$search_query%'";
    $result = $conn->query($sql);

    // ตรวจสอบว่ามีผลลัพธ์หรือไม่
    if ($result === false) {
        die("Error: " . $conn->error);
    } elseif ($result->num_rows > 0) {
        // แสดงผลลัพธ์
        while($row = $result->fetch_assoc()) {
            echo "ชื่อ: " . $row["name"]. " - ประเภท: " . $row["category"]. " - ประเภท: " . $row["type"]. " - แบรนด์: " . $row["brand"]. "<br>";
        }
    } else {
        echo "ไม่พบข้อมูลที่ตรงกับคำค้นหา";
    }
    $conn->close();
} else {
    // ถ้าไม่มีค่า search ใน URL ให้แสดงข้อความเพื่อแจ้งให้ผู้ใช้กรอกคำค้นหา
    echo "กรุณากรอกคำค้นหาในช่องค้นหาด้านบน";
}
?>
