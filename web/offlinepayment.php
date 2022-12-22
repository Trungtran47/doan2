<?php
include './inc/header.php';

?>
<?php
$customer_id = Session::get('customer_id');
if ($customer_id == false) {
    echo "<script type='text/javascript'>window.location.href = 'login.php'</script>";
}
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customer_id = Session::get('customer_id');
    $insert_order = $ct->insert_order($customer_id);
    $delCart = $ct->del_all_data_cart();
    echo "<script type='text/javascript'>window.location.href = 'success.php'</script>";
    // echo "<script type='text/javascript'>window.location.href = 'login.php'</script>";

}
?>
<form action="" method="POST">
  <div class="container pt-5 shadow p-3 mb-5 bg-body rounded">
    <div class="text-center">
    <h3>Thanh toán</h3>
    </div>
  </div>
<div class="container pt-5 ">
  
<div class="row">
    <div class="col-7 shadow p-3 mb-5 bg-body rounded" style="float:right;text-align:left; border: 1px solid #666;">
    <table class="tblone ">
              <tr>      
                        <th width="5%">ID</th>
						<th width="25%">Tên sản phẩm</th>
						<th width="25%">Hình ảnh</th>
						<th width="15%">Giá bán</th>
						<th width="20%">Số lượng</th>
						<th width="30%">Tổng giá</th>
						
					</tr>
          <tr>
		  <?php
						$get_product_cart = $ct->get_product_cart();
						if ($get_product_cart) {
							$subtotal = 0;
							$qty = 0;
                            $i = 0;
							while ($result = $get_product_cart->fetch_assoc()) {
                                $i++;
						?>
                <td><?php echo $i; ?></td>
								<td><?php echo $result['productName']?></td>
								<td><img style="width: 50px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></td>
								<td><?php echo $result['price']?></td>
                <td><?php echo $result['quantity']?></td>
								<!-- <td>
									<form action="" method="post">
										<input type="hidden" name="cartId" min="0" value="<?php echo $result['cartId']?>" />
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity']?>" />
										<input type="submit" name="submit" value="Update" />
									</form>
								</td> -->
								
								<td>
								<?php
									$total = $result['price'] * $result['quantity']; 
									echo $total;?>
								</td>
							
							</tr>
							<?php
						$subtotal += $total;
						$qty = $qty + $result['quantity'];
								}
							}
						?>
              </table>
              <?php
                        $check_cart = $ct->get_product_cart();
                        if ($check_cart) {

                        ?>
            
				<table class="" style="float:right;text-align:left; border: 1px solid #666;margin-top: 30px;" width="40%">
					<tr>
						<th>Giá : </th>
						<td><?php 
						echo $subtotal .' '.'VND';
						Session::set('sum',$subtotal);	
						Session::set('qty',$qty); ?></td>
					</tr>
					<tr>
						<th>Phí : </th>
						<td>10% (<?php echo $vat = $subtotal * 0.1; ?>)</td>
					</tr>
					<tr>
						<th>Giá cuối :</th>
						<td><?php
						$vat = $subtotal * 0.1 ;
						 $gtotal = $subtotal + $vat;
						 echo $gtotal .' '.'VND'; ?></td>
					</tr>
                    
				</table>
                                <?php
                        } else {
                            echo 'Your cart is empty ! Please shopping now';
                        } ?>
    </div>
    <div class="col-5">

    <div class="main" style="float:right;text-align:left; border: 1px solid #666;">
<?php
            $id = Session::get('customer_id');
            $get_info_cus = $cus->show_info_cus($id);
            if($get_info_cus){
                while($result = $get_info_cus->fetch_assoc()){
            ?>
    <div class="container ">
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
        

    </div>
</div>
<center style="margin-top: 20px;"><a href="?orderid=order" style=" cursor: pointer;text-decoration: none ;background-color: red; color: white; font-size: 20px; font-weight: bold; padding: 10px 30px;">Đặt hàng ngay</a></center>
</div>
</form>            
<?php
include './inc/footer.php';

?>