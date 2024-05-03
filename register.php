<?php
require_once('connect.php');

if (isset($_POST['submit'])) {
    $name       = $_POST['name'];
    $username   = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $password   = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    $confirm_password = htmlspecialchars($_POST['confirm_password'], ENT_QUOTES, 'UTF-8');
    $email     = $_POST['email'];
    $tel        = $_POST['tel'];

    $checkUsernameQuery = "SELECT COUNT(*) as count FROM `employee` WHERE `username` = '$username'";
    $checkUsernameQuery = "SELECT COUNT(*) as count FROM `customer` WHERE `username` = '$username'";
    $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);
    $usernameExists = mysqli_fetch_assoc($checkUsernameResult)['count'];

     // Check if password is at least 8 characters long
    // Check if password is at least 8 characters long
    if (strlen($password) < 8) {
        echo "<script>alert('Password must be at least 8 characters long.');
        window.location.href = 'register-form.php';
        </script>";
        exit;
    }

    // Check if password matches the confirm password
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.');
        window.location.href = 'register-form.php';
        </script>";
        exit;
    }
    }

if ($usernameExists > 0) {
    // Username already exists, show an error message
    echo '<script> 
        alert("Username already exists. Please choose a different username.");
        window.location.href = "register-form.php";
        </script>';
        
} else {


    $sql = "INSERT INTO `customer` (`name`, `username`, `password`, `email`, `tel`, `type`) 
                            VALUES ('$name', '$username', '$password', '$email', '$tel', 'customer')";


    if (mysqli_query($conn, $sql)) {
        echo '<script> 
            alert("สมัครสมาชิกสำเร็จ กรุณาเข้าสู่ระบบ");
            window.location.href = "index.php";
            </script>';
    } else {
        echo '<script> 
        alert("ไม่สำเร็จ: ' . mysqli_error($conn) . '");
            window.location.href = "index.php";
            </script>';
    }
    
 }


mysqli_close($conn);
?>