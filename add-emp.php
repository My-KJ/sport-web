<?php
require_once('connect.php');

if (isset($_POST['submit'])) {
    $username   = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $password   = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    $confirm_password = htmlspecialchars($_POST['confirm_password'], ENT_QUOTES, 'UTF-8');
    $name       = $_POST['name'];
    $tel        = $_POST['tel'];
    $email      = $_POST['email'];
    $address    = $_POST['add'];

    $checkUsernameQuery = "SELECT COUNT(*) as count FROM `employee` WHERE `username` = '$username'";
    $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);
    $usernameExists = mysqli_fetch_assoc($checkUsernameResult)['count'];

     // Check if password is at least 8 characters long
    // Check if password is at least 8 characters long
    if (strlen($password) < 8) {
        echo "<script>alert('Password must be at least 8 characters long.');
        window.location.href = 'user-form-created.php';
        </script>";
        exit;
    }

    // Check if password matches the confirm password
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.');
        window.location.href = 'user-form-created.php';</script>";
        exit;
    }
    }

if ($usernameExists > 0) {
    // Username already exists, show an error message
    echo '<script> 
        alert("Username already exists. Please choose a different username.");
        window.location.href = "user-form-created.php";
        </script>';
        
} else {

   
    $sql = "INSERT INTO `employee` (`username`, `password`, `name`, `tel`, `email`, `address`, `type`, `status`) 
    VALUES ('$username', '$password', '$name', '$tel', '$email', '$address', 'employee', 'working')";


    if (mysqli_query($conn, $sql)) {
        echo '<script> 
            alert("เพิ่มข้อมูลสำเร็จ");
            window.location.href = "employee-info.php";
            </script>';
    } else {
        echo '<script> 
        alert("Error adding data: ' . mysqli_error($conn) . '");
            window.location.href = "form-create-emp.php";
            </script>';
    }
    }
 


mysqli_close($conn);
?>