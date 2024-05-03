<?php
    session_start();
    require_once('connect.php');  
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/register.css">
<title>Register Page</title>
</head>
<body>

<div class="container">
    <a href="index.php" class="previous-btn" >ย้อนกลับ</a>
    <br>
    <h2>Register Form</h2>
    <hr>
    <form action="register.php" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="username">User Name:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <div>
                <input type="checkbox" onclick="myFunction()"> Show password</input>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="tel">Tel:</label>
            <input type="text" id="tel" name="tel" required>
        </div>
        <div class="submit-btn">
        <input type="submit" name="submit" value="Register">
        </div>
    </form>
</div>

<script src="js/regis.js"></script>
</body>
</html>
