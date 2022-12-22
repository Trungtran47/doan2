<?php


   include './inc/header.php';
 
?>
      
<!-- main -->
 <!-- The Modal -->
<!-- <div class="main ">
  <div class="modal-dialog modal-xl">
    <div class="modal-content"> -->

      <!-- Modal Header -->
      <!-- <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div> -->

      <!-- Modal body -->
      <!-- <div class="modal-body"> -->
<!-- php -->


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	$cartId = $_POST['cartId'];
	$quantity = $_POST['quantity'];
    $update_quantity_cart = $ct->update_quantity_cart($cartId, $quantity);
	if($quantity <= 0){
		$delcart = $ct->del_product_cart($cartId);
	}
}
?>

<?php 
if (isset($_GET['cartId'])) {
	$cartId = $_GET['cartId'];
	$delcart = $ct->del_product_cart($cartId);
}
?>

<?php 
if(!isset($_GET['id'])){
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?>


	  <!-- main -->
	  <div class="text-center pt-5">  <h1>Giỏ hàng</h1></div>
	  <div class="container pt-5">
		
       <div class="container pt-5 shadow p-3 mb-5 bg-body rounded ">
        <div class="content ">
          <div class="cartoption">
            <div class="cartpage">
            
			  <?php
				if(isset($update_quantity_cart)){
					echo $update_quantity_cart;
				}
				?>
				<?php
				if(isset($delcart)){
					echo $delcart;
				}
				?>

              <table class="tblone">
              <tr>
						<th width="20%">Tên sản phẩm</th>
						<th width="10%">Hình ảnh</th>
						<th width="15%">Giá bán</th>
						<th width="25%">Số lượng</th>
						<th width="20%">Tổng giá</th>
						<th width="10%">Hoạt động</th>
					</tr>
          <tr>
		  <?php
						$get_product_cart = $ct->get_product_cart();
						if ($get_product_cart) {
							$subtotal = 0;
							$qty = 0;
							while ($result = $get_product_cart->fetch_assoc()) {

						?>
								<td><?php echo $result['productName']?></td>
								<td><img style="width: 100px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></td>
								<td><?php echo $result['price']?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" min="0" value="<?php echo $result['cartId']?>" />
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity']?>" />
										<input type="submit" name="submit" value="Update" />
									</form>
								</td>
								
								<td>
								<?php
									$total = $result['price'] * $result['quantity']; 
									echo $total;?>
								</td>
								<td><a style="text-decoration: none; color: red;" href="?cartId=<?php echo $result['cartId'] ?>">Xóa</a></td>
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
                                if($check_cart){
                                 
                                ?>
				<table style="float:right;text-align:left;" width="40%">
					<tr>
						<th>Giá : </th>
						<td><?php 
						echo $subtotal;
						Session::set('sum',$subtotal);	
						Session::set('qty',$qty); ?></td>
					</tr>
					<tr>
						<th>Phí : </th>
						<td>10%</td>
					</tr>
					<tr>
						<th>Giá cuối :</th>
						<td><?php
						$vat = $subtotal * 0.1;
						 $gtotal = $subtotal + $vat;
						 echo $gtotal; ?></td>
					</tr>
				</table>
				<div class="container" style="height: 100px;"></div>
				<?php
				} else{
					echo 'Your cart is empty ! Please shopping now';
				} ?>
			
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
</div>
			<div class="container pt-5">
			<div class="row">
				<div class="col-6 text-center">
					<a href="index.php"> <img style="width: 200px;"  src="image/shop.png" alt="" /></a>
				</div>
				<div class="col-6 text-center">
					<a href="offlinepayment.php"> <img style="width: 200px;" src="image/check.png" alt="" /></a>
				</div>
			</div>
			</div>

  <!-- footer -->

<?php
   include './inc/footer.php';
   
?>
