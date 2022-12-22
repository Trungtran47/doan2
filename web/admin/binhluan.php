<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/brand.php';?>
<?php include_once '../classes/category.php';?>
<?php include_once '../classes/product.php' ?>
<?php include_once '../helpers/format.php' ?>
<?php include_once '../classes/customer.php' ?>
<?php
            $cus = new customer();
            
			if(isset($_GET['delbl'])){
				$id = $_GET['delbl'];
				$delbl = $cus->del_binhluan($id);
			}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách bình luận</h2>
                <div class="block">        
				<?php
                    if (isset($delbl)) {
                        echo $delbl;
                    }
                 ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>ID Món ăn</th>
                            <th>Tên người bình luận</th>
                            <th>Bình luận</th>
							<th>Thực hiện</th>
						</tr>
					</thead>
					<tbody>
                       <?php 
					      $show_bl = $cus->show_binhluan();
						  if ($show_bl) {
							$i = 0;
							while ($result = $show_bl->fetch_assoc()) {
								$i++;
                          
					   ?>
                       
                         
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
                            <td><?php echo $result['product_id']; ?></td>
							<td><?php echo $result['tenbinhluan']; ?></td>
                            <td><?php echo $result['binhluan']; ?></td>
							<td> <a onclick = "return confirm(
								'Are you want to delete?') " href="?delbl=<?php echo $result['binhluan_id'] ?>">Xóa</a></td>
						</tr>
						<?php
							}
						}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

