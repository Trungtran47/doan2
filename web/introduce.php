<?php
      include './lib/session.php';
      Session::init();
?>
<?php

      include_once  './lib/database.php';
      include_once  './helpers/format.php';

      spl_autoload_register(function($className){
        include_once "classes/".$className.".php";
      });

      
      $db = new Database();
      $fm = new Format();
      $ct = new cart();
      $us = new user();
      $cat = new category();
      $cus = new customer();
      $product = new product();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./js/index.js">
    <link rel="stylesheet" href="./css/introduce.css">
    <link rel="stylesheet" href="/doan2/fontawesome-free-6.2.0-web/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Trang chủ</title>
    
</head>
<body>
  <!-- nav -->

  <!-- <div class="navbar navbar-expand-lg bg-white p-4 ">
    <div class="container-fluid ">

    </div>
  </div> -->
 
  <!-- <div class="navbar navbar-expand-lg bg-white p-4  " style="background-image: url(./image/RUBY.png);" > -->
    
    <!-- <div class="container ">
      <form class="d-flex " role="search"> -->
        <!-- <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search"> -->
        <!-- <button class="btn btn-outline-success" type="submit">Tìm</button> -->
      <!-- </form>
    </div> -->
  
    <!-- <div class="icon1 "> -->

        
      <!-- <a href="./login.php"><i class="fa-solid fa-user text-dark " ></i></a> -->
      <!-- <button class="btn " data-bs-toggle="modal" href="#exampleModalToggle" role="button">Đăng nhập</button> -->
     
    <!-- </div> -->
    <!-- <div class="icon2"> -->

       <!-- <a href="./cart.php" style="text-decoration: none;">Giỏ hàng </a> -->
       <!-- <i  class="fa-solid fa-cart-shopping text-dark" ></i>  -->
       <!-- <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#myModal"><i  class="fa-solid fa-cart-shopping text-dark" ></i>
      </button> -->

        


  
        <!-- <span class="position-absolute top-0 start-30 translate-middle p-2 bg-danger border border-light rounded-circle">
          <span class="visually-hidden">New alerts</span>
        </span> -->
     
    <!-- </div> -->

  </div>

 <!-- Navbar -->

 <nav class="navbar navbar-expand-lg navbar-light bg-white " style="background-image: url(./image/RUBY.png);">
  <!-- Container wrapper -->
  <div class="container pt-5">
  

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <div class="container ">
      <form class="d-flex " action="search.php" method="POST">
      <input type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa"><input type="submit" name="search_product" value="Tìm kiếm">
      </form>
    </div>
      </ul>
      <!-- Left links -->
   
      <div class="d-flex align-items-center">
       
        
        <?php
                    if (isset($_GET['customer_id'])) {
          
                      $delCart = $ct->del_all_data_cart();
            
                        Session::destroy();
                    }
                    ?>
                    <?php
                    $login_check = Session::get('customer_login');
                    if ($login_check == false) {
                        echo '<a href="login.php"><button type="submit" class="btn btn-secondary">Đăng nhập</button></a></div>';
                    } else {
                      echo '<a href="profile.php"><i class="fa-solid fa-user text-dark "></i></a></div>';
                        echo '<a href="?customer_id=' . Session::get('customer_id') . '" ><button type="submit" class="btn btn-secondary " style="   margin-left: 20px;">Đăng xuất</button></a></div>';
                    }
                    ?>
                    <div class="clear"></div>
        
        <ul class="navbar-nav">
      <!-- cart -->
      <li class="nav-item">
        <a class="nav-link" href="./cart.php" style="   margin-left: 20px;">
          <span class="badge badge-pill bg-danger"></span>
          <span><i class="fas fa-shopping-cart"></i></span>
        </a>
      </li>
    </ul>
        <!-- <a
          class="btn btn-dark px-3 "style="   margin-left: 20px;"
          href="https://github.com/mdbootstrap/mdb-ui-kit"
          role="button"
          ><i class="fab fa-github"></i
        ></a> -->
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>


<!-- Navbar -->

 <div class="menu">
  <nav class="navbar navbar-expand-lg navbar-light bg-light " aria-label="Secondary navigation">
    <div class="container">
    <a class="navbar-brand" href="#"><img src="./image/logo.png" alt="" height="30" style="margin-left: -100px;" ></a>
      <button class="navbar-toggler" 
        type="button" 
        data-bs-toggle="collapse" 
        data-bs-target="#navbarNav" 
        aria-controls="navbarNav" 
        aria-expanded="false" 
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav ">
          <li class="nav-item ">
            <a class="nav-link " 
              aria-current="page"  href="./index.php">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./introduce.php">Giới thiệu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./Service.php">Thực đơn</a>
      
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Dịch vụ
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <!-- <li><a class="dropdown-item" href="#">Tại nhà hàng</a></li> -->
              <li><a class="dropdown-item" href="./TableBooking.php">Đặt bàn</a></li>
              <li><a class="dropdown-item" href="./Party.php">Đặt tiệc </a></li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./News.php">Tin tức</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./contact.php" tabindex="-1" aria-disabled="true">Liên hệ</a>
          </li>

         
                    <?php
                    $customer_id = Session::get('customer_id');
                    $check_order = $ct->check_order($customer_id);
                    if ($check_order) {
                        echo '<li class="nav-item"><a class="nav-link" href="./orderdetails.php">Đơn hàng</a></li>';
                    } else {
                        echo '';
                    }
                    ?>
                                         <?php
                    $login_check = Session::get('customer_id');
                    if ($login_check) {
                        echo '<li class="nav-item"><a class="nav-link" href="./wishlist.php">Yêu thích</a></li>';
                    } else {
                        echo '';
                    }
                    ?>
             
        </ul>
      </div>
    </div>
  </nav>
</div>
  <!-- slide      -->
  <?php
  include './inc/slider1.php';
  ?>
<div class="container pt-5">
<!-- <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./index.php">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Giới thiều</li>
  </ol>
</nav> -->
<div class="text-center shadow p-3 mb-5 bg-body rounded">
<h1>GIỚI THIỆU</h1>
</div>
</div>
   <section class="page">
    <div class="container pt-5 "> 
        <div class="pg_page padding-top-15 ">
            <div class="row pt-3">
                <div class="col-xl-5 col-lg-5 col-sm-12 col-12 ">
                
                  
                      
                     <div class="imag "> <img class="shadow p-3 mb-5 bg-body rounded" width="500px" height="300px" src="../web/image/nhahang.jpg" alt="..."></div>
                     
                    
                      
                    </div>
                
                <div class="col-xl-7 col-lg-7 col-sm-12 col-12">
                
                    
                      <p>Đến với nhà hàng RUBY với không gian lịch sự, trang trọng thực khách không những ăn ngon thưởng thức nghệ thuật ẩm thực 
                        với các món ăn nước ngoài Á - ÂU mà còn đảm bảo vệ sinh an toàn sức khỏe tuyệt đối là sự lựa chọn hoàn hảo cho quý khách hàng muốn tổ chức 
                        đặt tiệc sinh nhật , đặt tiệc cho công ty, đặt tiệc hội họp bạn bè, đặt tiệc cho tour khách tham quan du lịch tại TP.Đà Nẵng với 
                        nhiều ưu đãi và chiết khấu đặc biệt. </p>
                     
                      <!-- <p>Được thiết kế hiện đại, mang vẻ đẹp trang nhã ấm cúng, với hơn 100 món ăn chọn lọc từ những món ngon Châu Âu và Châu
                        Á , được bếp trưởng sáng tạo thành những món ăn , mang lại trải nghiệm ẩm thực khác lạ</p>
                  
                      <p>Với hệ thống bể chứa hải sản tự nhiên luôn giúp hải sản trong mỗi món ăn được tươi ngon hơn, được bảo quản trong bể kính và giữ được sự tươi ngon 
                        đảm bảo hương vị tuyệt vời nhất cho món ăn cũng như khi chế biến</p>
         
                      <p>Cam kết là một địa chỉ ẩm thực uy tín nhà hàng ăn ngon ở TP.Đà Nẵng , đáp ứng yêu cầu khắt khe của khách hàng về chất lượng, lấy lợi ích khách hàng là 
                        ưu tiên hàng đầu. Chúng tôi đề cao việc xây dựng nhà hàng trở thành một thương hiệu ẩm thực chất lượng cao.</p>
                    </div> -->
                </div>
                </div>
                <div class="row pt-3">
                  <div class="col-xl-7 col-lg-7 col-sm-12 col-12"> 
                  <p>Được thiết kế hiện đại, mang vẻ đẹp trang nhã ấm cúng, với hơn 100 món ăn chọn lọc từ những món ngon Châu Âu và Châu
                        Á , được bếp trưởng sáng tạo thành những món ăn , mang lại trải nghiệm ẩm thực khác lạ</p>
                  
                  </div>
                  <div class="col-xl-5 col-lg-5 col-sm-12 col-12 "> 
                  <div class="imag"> 
                    <img class="shadow p-3 mb-5 bg-body rounded" width="500px" height="300px" src="../web/image/nhahang.jpg" alt="...">
                    </div>
                      </div>
                </div>
                <div class="row pt-3">
                  <div class="col-xl-5 col-lg-5 col-sm-12 col-12 "> 
                    <div class="imag"> 
                      <img class="shadow p-3 mb-5 bg-body rounded" width="500px" height="300px" src="../web/image/nhahang.jpg" alt="...">
                    </div>
                  </div>
                  <div class="col-xl-7 col-lg-7 col-sm-12 col-12"> 
                     <p>Với hệ thống bể chứa hải sản tự nhiên luôn giúp hải sản trong mỗi món ăn được tươi ngon hơn, được bảo quản trong bể kính và giữ được sự tươi ngon 
                        đảm bảo hương vị tuyệt vời nhất cho món ăn cũng như khi chế biến. Cam kết là một địa chỉ ẩm thực uy tín nhà hàng ăn ngon ở TP.Đà Nẵng , đáp ứng yêu cầu khắt khe của khách hàng về chất lượng, lấy lợi ích khách hàng là 
                        ưu tiên hàng đầu. Chúng tôi đề cao việc xây dựng nhà hàng trở thành một thương hiệu ẩm thực chất lượng cao.</p>
                    </div>
                  </div>
                </div>


            </div>
        </div>
    </div>
   </section>

  <!-- footer -->

  <?php
   include './inc/footer.php';
   
?>
     