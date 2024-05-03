<?php 
require_once('connect.php');

if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $address = $_POST['add'];

    // Proceed with the update
    $sql = "UPDATE customer SET 
        name = '$name',
        address = '$address'
        WHERE id_cus = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo '<script> 
            alert("อัปเดตสำเร็จ");
            window.location.href = "customer-info.php";
            </script>';
    } else {
        echo '<script> 
            alert("Error updating data: ' . mysqli_error($conn) . '");
            window.location.href = "admin-update-cus.php";
            </script>';
    }
}
?>