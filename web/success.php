<?php
include 'inc/header.php';
?> 

<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customer_id = Session::get('customer_id');
    $insert_order = $ct->insert_order($customer_id);
    $delCart = $ct->del_all_data_cart();
    header('Location:success.php');
}
?>

<form action="" method="POST">
    <div class="main">
        <div class="content">
            <div class="section group" style="text-align: center;">
               <h2 style="color: green;">Đặt hàng thành công</h2>
               <?php 
               $customer_id = Session::get('customer_id');
               $get_mount = $ct->get_all_mount($customer_id); 
               if($get_mount){ 
                $amount = 0;
                while($result = $get_mount->fetch_assoc()){
                    $price = $result['price'];
                    $amount += $price;
                }
               }    
               ?>
               <p>Tổng Giá Bạn Đã Mua Từ Website :
                <?php
                $vat = $amount * 0.1;
                $total = $vat + $amount;
                echo $total;
                ?> VNĐ</p>
               <p>Chúng tôi sẽ liên hệ ngay khi có thể. Vui lòng xem chi tiết đơn hàng của bạn tại đây <a href="orderdetails.php">Bấm vào đây</a></p>
            </div>
        </div>
    </div>    
</form>
<?php
include 'inc/footer.php';
?>


