<?php
include 'inc/header.php';
?>

<?php 
if (isset($_GET['proid'])) {
    $customer_id = Session::get('customer_id');
	$proid = $_GET['proid'];
	$delwlist = $product->del_wlist($proid,$customer_id );
}
?>

<div class="main">
    <div class="container pt-5 shadow p-3 mb-5 bg-body rounded  text-center text-uppercase">
    <h2>Sản phẩm yêu thích</h2>
    </div>
	<div class="container pt-5 shadow p-3 mb-5 bg-body rounded">
		<div class="cartoption ">
			<div style=" text-align: center;" class="cartpage"  >
				
				<table class="tblone" style=" text-align: center;">
					<tr>
					    <th width="10%">STT</th>
						<th width="20%">Tên sản phẩm</th>
						<th width="20%">Ảnh</th>
						<th width="15%">Giá</th>
						<th width="10%">Hoạt động</th>
					</tr>
                    <tr>
                        <td></td>
                    </tr>
					<tr>

						<?php
						$customer_id = Session::get('customer_id');
						$get_wishlist = $product->get_wishlist($customer_id);
						if ($get_wishlist) {
							$i = 0;
							while ($result = $get_wishlist->fetch_assoc()) {
							 	$i++;

						?>
								<td style="text-align: center;"><?php echo $i ?></td>
								<td><?php echo $result['productName']?></td>
								<td><img style="width: 60px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></td>
								<td><?php echo $result['price']?></td>
								<td>
                                <a style="text-decoration: none;color: red;" href="?proid=<?php echo $result['productId'] ?>">Xóa</a> ||
                                    <a style="text-decoration: none;color: blue;" href="preview.php?proid=<?php echo $result['productId'] ?>">Mua</a>
                                </td>
					</tr>
						<?php
								}
							}
						?>
				</table>
				
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

<div class="container ">
			<div class="row " >
				<div class="col-6 text-center">
					<a href="index.php"> <img style="width: 200px;"  src="image/shop.png" alt="" /></a>
				</div>
				<div class="col-6 text-center">
					<!-- <a href="payment.php"> <img style="width: 200px;" src="image/check.png" alt="" /></a> -->
				</div>
			</div>
			</div>


<?php
include 'inc/footer.php';
?>