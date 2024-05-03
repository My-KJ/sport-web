<?php 
require_once('connect.php');

if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $address = $_POST['add'];
    $type = isset($_POST['type']) ? $_POST['type'] : null;
    $status = isset($_POST['status']) ? $_POST['status'] : null;

    // ตรวจสอบว่ามีการส่งค่า type หรือ status มาหรือไม่
    $type_sql = isset($_POST['type']) ? ", type = '$type'" : ""; 
    $status_sql = isset($_POST['status']) ? ", status = '$status'" : "";

    // Proceed with the update
    $sql = "UPDATE employee SET 
        name = '$name',
        address = '$address'
        $type_sql
        $status_sql
        WHERE id_emp = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo '<script> 
            alert("อัปเดตสำเร็จ");
            window.location.href = "employee-info.php";
            </script>';
    } else {
        echo '<script> 
            alert("Error updating data: ' . mysqli_error($conn) . '");
            window.location.href = "admin-update-emp.php";
            </script>';
    }
}
?>
