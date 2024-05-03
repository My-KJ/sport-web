<?php
session_start(); // เริ่ม session

// ตรวจสอบว่ามีการส่งข้อมูลแบบ POST และไม่มี session ของ username
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_SESSION['username'])) {
    // กำหนดข้อมูลเชื่อมต่อกับฐานข้อมูล
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sport_b";

    // สร้างการเชื่อมต่อ
    $conn = new mysqli($servername, $username, $password, $dbname);

    // ตรวจสอบการเชื่อมต่อ
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // รับค่า username และ password จากฟอร์ม
    $username = $_POST['username'];
    $password = $_POST['password'];

    // สร้างคำสั่ง SQL สำหรับการตรวจสอบข้อมูลในตาราง customer
    $sql_customer = "SELECT * FROM customer WHERE username=? AND password=?";
    $stmt_customer = $conn->prepare($sql_customer);
    $stmt_customer->bind_param("ss", $username, $password);
    $stmt_customer->execute();
    $result_customer = $stmt_customer->get_result();

    // สร้างคำสั่ง SQL สำหรับการตรวจสอบข้อมูลในตาราง employee
    $sql_employee = "SELECT * FROM employee WHERE username=? AND password=?";
    $stmt_employee = $conn->prepare($sql_employee);
    $stmt_employee->bind_param("ss", $username, $password);
    $stmt_employee->execute();
    $result_employee = $stmt_employee->get_result();

    // เช็คว่ามีข้อมูลในตาราง customer หรือ employee หรือไม่
    if ($result_customer->num_rows > 0) {
        $row_customer = $result_customer->fetch_assoc();
        $type = $row_customer['type'];
        if ($type == 'customer') {
            $_SESSION['username'] = $username;
            $_SESSION['type'] = $type;
            echo "<script>
            alert('ยินดีต้อนรับ คุณลูกค้า');
            window.location.href = 'index-c.php';
        </script>";
            exit();
        }
    } elseif ($result_employee->num_rows > 0) {
        $row_employee = $result_employee->fetch_assoc();
        $type = $row_employee['type'];
        if ($type == 'admin') {
            $_SESSION['username'] = $username;
            $_SESSION['type'] = $type;
            echo "<script>
            alert('ยินดีต้อนรับ แอดมิน!!');
            window.location.href = 'index-a.php';
        </script>";
            exit();
        } elseif ($type == 'employee') {
            $_SESSION['username'] = $username;
            $_SESSION['type'] = $type;
            echo "<script>
            alert('ยินดีต้อนรับ พนักงาน!');
            window.location.href = 'index-e.php';
        </script>";
            exit();
        }
    }

    // ถ้าไม่พบข้อมูลในทั้งสองตารางหรือ type ไม่ถูกต้อง
    echo "<script>
            alert('รหัสผ่านไม่ถูกต้อง');
            window.location.href = 'index.php';
        </script>";
    

    // ปิดการเชื่อมต่อ
    $conn->close();
}
?>