<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'; ?>
<?php
            $cat = new category();
            
			if(isset($_GET['delId'])){
				$id = $_GET['delId'];
				$delcat = $cat->del_category($id);
			}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách nhóm món ăn</h2>
                <div class="block">        
				<?php
                    if (isset($delcat)) {
                        echo $delcat;
                    }
                 ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Nhóm món ăn</th>
							<th>Thực hiện</th>
						</tr>
					</thead>
					<tbody>
                       <?php 
					      $show_cate = $cat->show_category();
						  if ($show_cate) {
							$i = 0;
							while ($result = $show_cate->fetch_assoc()) {
								$i++;

					   ?>

						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['catName']; ?></td>
							<td><a href="catedit.php?catId=<?php echo $result['catId'] ?>">Sửa</a> || <a onclick = "return confirm(
								'Are you want to delete?') " href="?delId=<?php echo $result['catId'] ?>">Xóa</a></td>
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

