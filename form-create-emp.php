<?php 

    require_once('connect.php');
    session_start();
   
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add USER Page </title>
    <!-- favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="icon.ico">
    <!-- Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .flex-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #F5F8FF;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
<div class="flex-container">
    <div class="container">
        <div class="shadow rounded p-5 bg-body h-100">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h1 class="mb-5"> เพิ่มข้อมูลพนักงาน </h1>
                    <form class="row gy-4" action="add-emp.php" method="POST">
                        <div class="col-md-6">
                            <label for="name" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        </div>
                        <div class="col-md-7">
                            <label for="username" class="form-label" style="display: flex;">USERNAME</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Input username" required>
                        </div>
                        <br>
                        <div class="col-md-7">
                            <label for="password" class="form-label" style="display: flex;">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Input Password" required>
                        </div>
                        <div class="col-md-7">
                            <label for="password" class="form-label" style="display: flex;">Password confirm</label>
                            <input type="password" class="form-control" id="password" name="confirm_password" placeholder="Input Password" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tel" class="form-label">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" id="tel" name="tel" placeholder="Input Tel No." required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">E-Mail</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Input E-Mail" required>
                        </div>
                        <div class="col-md-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="add" placeholder="Input Address" required>
                        </div>
                        <div class="col-12" style="margin: 16px;">
                            <button type="submit" name="submit" class="btn btn-primary d-block mx-auto">Confirm</button>
                        </div>
                    </form>
                    <a class="btn btn-warning" href="employee-info.php">ย้อนกลับ</a>
                </div>  
            </div>
        </div>
        
    </div>
</div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>