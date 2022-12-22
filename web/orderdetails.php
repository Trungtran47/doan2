<?php
include 'inc/header.php';
?>
<?php
$customer_id = Session::get('customer_id');
if ($customer_id == false) {
    echo "<script type='text/javascript'>window.location.href = 'login.php'</script>";
}
$ct = new cart();
if (isset($_GET['confirmid'])) {
    $id = $_GET['confirmid'];
    $time = $_GET['time'];
    $price = $_GET['price'];
    $shifted_confirm = $ct->shifted_confirm($id, $time, $price);
}
?>
<div class="text-center pt-5">
    <h3>Trạng thái đơn hàng</h3>
 </div>
<div class="main">

    <div class="container pt-5" >
    <?php
                if (isset($shifted_confirm)) {
                    echo $shifted_confirm;
                }
                ?>
                <table class="tblone" style="float:right;text-align:left; border: 1px solid #666; ">
                    <tr >
                        <th width="10%" style="text-align: center;" >ID</th>
                        <th width="15%">Tên</th>
                        <th width="10%">Ảnh</th>
                        <th width="10%">Giá</th>
                        <th width="10%">Số lượng</th>
                        <th width="15%">Ngày</th>
                        <th width="10%">Trạng thái</th>
                        <th width="10%">Hoạt động</th>

                    </tr>
                    <tr>

                        <?php
                        $customer_id = Session::get('customer_id');
                        $get_cart_ordered = $ct->get_cart_ordered($customer_id);
                        if ($get_cart_ordered) {
                            $i = 0;
                            $qty = 0;
                            while ($result = $get_cart_ordered->fetch_assoc()) {
                                $i++;
                        ?>
                                <td style="text-align: center;"><?php echo $i ?></td>
                                <td><?php echo $result['productName'] ?></td>
                                <td><img style="width: 50px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></td>
                                <td><?php echo $result['price'] ?></td>
                                <td>
                                    <?php echo $result['quantity'] ?>
                                </td>
                                <td><?php echo $fm->formatDate($result['date_order']) ?></td>
                                <td>
                                    <?php
                                    if ($result['status'] == '0') {
                                        echo 'Chưa giải quyết';
                                    } else  if ($result['status'] == '1') {
                                    ?>
                                    <span>Đang vận chuyển</span>
                                        
                                    <?php
                                    } else  if ($result['status'] == '2'){
                                        echo 'Nhận';
                                    }
                                    ?>
                                </td>
                                   <?php
                                if ($result['status'] == '0') {
                                ?>
                                    <td>N/A</td>
                                <?php
                                }else if($result['status'] == '1'){
                                    ?>
                                   <td>
                                   <a style="text-decoration: none; color: #666;" href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&
										time=<?php echo $result['date_order'] ?>">Xác nhận</a>
                                   </td> 
                                    <?php
                                }
                                 else {
                                ?>
                                    <td>Đã nhận</td>
                                <?php
                                } ?>
                                


                    </tr>
            <?php
                            }
                        }
            ?>
                </table>
    </div>

                </div>
                <div class="container ">
			<div class="row pt-5" >
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