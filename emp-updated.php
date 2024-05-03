<?php 
require_once('connect.php');

if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $address = $_POST['add'];

    // Check if password is provided and matches the confirm password
    if (!empty($_POST['password'])) {
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
        $confirm_password = htmlspecialchars($_POST['confirm_password'], ENT_QUOTES, 'UTF-8');

        if ($password !== $confirm_password) {
            echo "<script>alert('Passwords do not match.');
            window.location.href = 'user-form-update.php';</script>";
            exit;
        }

        $password_sql = "password = '$password',";
    } else {
        // If password is not provided, exclude it from the update statement
        $password_sql = "";
    }

    // Proceed with the update
    $sql = "UPDATE employee SET 
        name = '$name',
        $password_sql
        email = '$email', 
        tel = '$tel',                
        address = '$address'
        WHERE id_emp = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo '<script> 
            alert("อัปเดตสำเร็จ");
            window.location.href = "profile-e.php";
            </script>';
    } else {
        echo '<script> 
            alert("Error updating data: ' . mysqli_error($conn) . '");
            window.location.href = "emp-form-update.php";
            </script>';
    }
}
?>
