<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Đăng nhập</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <?php
    $login_check = Session::get('customer_login');
    if($login_check){
        header("<script type='text/javascript'>window.location.href = 'order.php'</script>");
    }
?> 
<!-- Đăng nhập -->
<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){

		$loginCustomer = $cus->login_customer($_POST);
	}
?>
      <div class="container pt-5">
  
  <div class="logo">

    <a href=""><img src="./image/logo.png" alt="" style="text-align: center; width: 200px;"></a>
  </div>
  <div class="conten">
    <h3>Chào mừng đến với nhà hàng RUBY!</h3>
  </div>
</div>
<div class="container pt-5">
  
  <?php
			if(isset($loginCustomer)){
				echo $loginCustomer;
			}
			?>
	<form action="" method="POST">
<div class="mb-3 row ">
    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
    <div class=" col-sm-9">
      <input type="email" class="form-control" name="email" id="inputEmail" placeholder="name@example.com">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" name="password" id="inputPassword">
    </div>
  </div>
  
  <div class="">
  <p class="note">
 Nếu bạn quên mật khẩu có thể nhấp vào <a href="">đây.</a><br>
  <p style="margin-top: -40px;">Hoặc có thể tạo tài khoản mới</p>
 </p>
  </div>
  <button type="đangnhap" name="login" class="btn btn-dark">Đăng nhập</button>
</div>
</form>



      </div>
      <div class="modal-footer">
        <button class="btn bg-dark text-white" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Đăng ký</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Đăng ký</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
      <div class="container">
  
  <div class="logo">

    <a href=""><img src="./image/logo.png" alt="" style="text-align: center; width: 200px;"></a>
  </div>
  <div class="conten">
    <h3>Chào mừng đến với nhà hàng RUBY!</h3>
  </div>
</div>
      <div class="container pt-5">
        

<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){

		$insertCustomer = $cus -> insert_customer($_POST);
	}
?>
  <!-- đăng ký  -->

        <div class="main">
          
        <form class="row g-3 " action="" method="POST">
        <?php
			if(isset($insertCustomer)){
				echo $insertCustomer;
			}
			?>
        <div class="col-md-6">
    <!-- <label for="inputName" class="form-label"></label> -->
    <input type="text" class="form-control" id="inputName" name="name" placeholder="Nhập tên" >
  </div>
  <div class="col-md-6">
    <!-- <label for="inputEmail4" class="form-label"></label> -->
    <input type="text" class="form-control" id="inputEmail4" placeholder="name@gmail.com" name="email">
  </div>
  <div class="col-md-6">
    <!-- <label for="inputPassword4" class="form-label"></label> -->
    <input type="text" class="form-control" id="inputPassword4" name="password" placeholder="Nhập mật khẩu" >
  </div>
  <div class="col-6">
    <!-- <label for="inputPhone" class="form-label"></label> -->
    <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="Nhập số điện thoại" >
  </div>
  <div class="col-12">
    <!-- <label for="inputAddress" class="form-label"></label> -->
    <input type="text" class="form-control" id="inputAddress" placeholder="Nhập địa chỉ " name="address">
  </div>
  <div class="col-md-5">
    <!-- <label for="inputCity" class="form-label"></label> -->
    <input type="text" class="form-control" id="inputCity" name="city" placeholder="Nhập thành phố" >
  </div>
  <div class="col-md-4">
    <!-- <label for="inputCountry" class="form-label"></label> -->
    <select id="inputCountry" class="form-select" name="country" >
      <option selected>Chọn quốc tịch</option>
      <option>VietNam</option>
      <option>Russia</option>
      <option>USA</option>
    </select>
  </div>
  <div class="col-md-3">
    <!-- <label for="inputZip" class="form-label"></label> -->
    <input type="text" class="form-control" id="inputZipcode" name="zipcode" placeholder="Nhập mã bưu điện" >
  </div>

  <div class="col-12">
  <div><input class="btn bg-dark text-white" type="submit" name="submit" value="Create Account"></div>
  </div>
</form>
        </div>
    </div>
      </div>
      <div class="modal-footer">
        <button class="btn bg-dark text-white" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Đăng nhập</button>
      </div>
    </div>
  </div>
</div>
