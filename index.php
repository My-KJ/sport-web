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
<link rel="stylesheet" href="css/index.css">
<title>Bangphra Sport Shop</title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="asset/BANGPHRA SPORT PNG 3.png" alt="" width="150px" height="auto">
    </a>

    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
  </div>
</nav>
<!-- Navbar -->

<!-- Login Modal -->
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="login.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="asset/img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>
      
      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="password" required>
      <input type="checkbox" onclick="myFunction()"> Show password</input>
        
      <button type="submit" name="submit">ล๊อกอิน</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
      <br>
      <span class="reg">ยังไม่เคยสมัครสมาชิก กด<a href="register-form.php">ที่นี่</a></span>
    </div>

    <!-- <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">ยกเลิก</button>
      <span class="psw"><a href="#">ลืมรหัสผ่าน</a></span>
    </div> -->
  </form>
</div>
<!-- Login Modal -->

<!-- Body -->
<div class="sport-body">
  <div class="container-fluid-main">
      <div class="tip">
      </div>
    </div>

  <div class="container-lg-carou">
  <div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  </div>

  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
     <img src="asset/1.jpg" alt="Bangphra" alt="Banner" class="d-block" style="width:1000px; height:700px">
    </div>
    <div class="carousel-item">
      <img src="asset/HeroBanner-Reebok_2.jpg" class="d-block" style="width:1000px; height:700px">
    </div>

  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
  </div>
  </div>
  </div>
  

  <div class="row">
    <div class="col p-3">
      <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
      <img src="asset/show.jpg" alt="" width="35%">
      </a>
      <p>อุปกรณ์กีฬา</p>
    </div>
    <div class="col p-3">
      <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
      <img src="asset/w-plant-fbt.jpg" alt="" width="35%">
      </a>
      <p>กางเกงกีฬา</p>
    </div>
    <div class="col p-3">
      <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
      <img src="asset/w-shirt-liv.jpg" alt="" width="35%">
      </a>
      <p>เสื้อกีฬา</p>
    </div>
    <div class="col p-3">
      <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
      <img src="asset/cupreward.jpg" alt="" width="35%">
      </a>
      <p>อุปกรณ์อื่นๆ</p>
    </div>
  </div>

  <div class="row">
  <h1>ตัวอย่างสินค้า</h1>
  <div class="col-md-3">   
    <div class="card mb-3">
      <img src="img/FBT-specialball.png" class="card-img-top" alt="">
      <div class="card-body">
        <h5 class="card-title"><b>FBT</b></h5>
        <p class="card-text">SUPER STAR ฟุตซอล ซุปเปอร์สตาร์ หนังอัด</p>
        <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="btn btn-primary">เพิ่มลงตะกร้า</a>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card mb-3">
      <img src="img/FBT-Badmintons.png" class="card-img-top" alt="">
      <div class="card-body">
        <h5 class="card-title"><b>FBT</b></h5>
        <p class="card-text">FBT ไม้แบดมินตัน FBT CLUB SPORT (คู่)</p>
        <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="btn btn-primary">เพิ่มลงตะกร้า</a>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card mb-3">
      <img src="img/imane-polo.png" class="card-img-top" alt="" style="height: 306px;">
      <div class="card-body">
        <h5 class="card-title"><b>IMANE</b></h5>
        <p class="card-text">เสื้อกีฬาโปโล แขนสั้น</p>
        <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="btn btn-primary">เพิ่มลงตะกร้า</a>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card mb-3">
      <img src="img/wrx-pant.png" class="card-img-top" alt="" style="height: 306px;">
      <div class="card-body">
        <h5 class="card-title"><b>WARRIX</b></h5>
        <p class="card-text">กางเกงวิ่งขาสั้นผู้ชาย -สีดำ</p>
        <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="btn btn-primary">เพิ่มลงตะกร้า</a>
        
      </div>
    </div>
  </div>
</div>



</div>
<!-- Body -->

<!-- Footer -->
<footer> 
    <div class="container-fluid-foot">
    <h3>Contact</h3>
    <p>ผู้จัดทำ: ธนพล มะหอม<br>
    
    <div class="icon">
      <a href="#"><i class="fas fa-solid fa-envelope"></i> : tanapol.mah@rmutto.ac.th</a>
      <br> 
      <a href="https://web.facebook.com/LeCoRDeR"><i class="fab fa-facebook-f"></i> : Tanapol Mahom</a>
      <br>
      <a href="https://maps.app.goo.gl/i83KEXxwtQJz7dUD6"><i class="fas fa-map-marked-alt"></i> : Bangphra Sport & Store</a>
    </div>
    </div>
</footer>
<!-- Footer -->
<script src="js/index.js"></script>
<script>
  
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
} 
</script>

</body>
</html>