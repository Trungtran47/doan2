<?php
include 'inc/header.php';
?>

<?php
    $login_check = Session::get('customer_login');
    if($login_check == false){
      echo "<script type='text/javascript'>window.location.href = 'login.php'</script>";
    }
?>

 <div class="text-center pt-5">
    <h3>HỒ SƠ NGƯỜI DÙNG</h3>
 </div>
<div class="main">
<?php
            $id = Session::get('customer_id');
            $get_info_cus = $cus->show_info_cus($id);
            if($get_info_cus){
                while($result = $get_info_cus->fetch_assoc()){
            ?>
    <div class="container pt-5">
    <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Tên :</th>
      <td><?php echo $result['name'] ?></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Số điện thoại :</th>
      <td><?php echo $result['phone'] ?></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Địa chỉ:</th>
      <td colspan="2"><?php echo $result['address'] ?></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Thành phố :</th>
      <td><?php echo $result['city'] ?></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Quốc gia :</th>
      <td><?php echo $result['country'] ?></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Mã bưu điện :</th>
      <td><?php echo $result['zipcode'] ?></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Email :</th>
      <td><?php echo $result['email'] ?></td>
      <td></td>
      <td></td>
    </tr>
    
  </tbody>
  <tr>
                    <td colspan="3"><a href="editprofile.php" style="text-decoration: none; ">Sửa thông tin</a></td>
                </tr>
</table>
    </div>
      <?php 
                    }
                }
                ?>
                </div>
	<?php
	include 'inc/footer.php';
	?>