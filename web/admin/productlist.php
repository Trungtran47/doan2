<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/brand.php';?>
<?php include_once '../classes/category.php';?>
<?php include_once '../classes/product.php' ?>
<?php include_once '../helpers/format.php' ?>
<?php
         $pd = new product();
		 $fm = new Format();
		 
		 if(isset($_GET['productId'])){
			$id = $_GET['productId'];
			$delpro = $pd->del_product($id);
		}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách món ăn</h2>
        <div class="block">  
			<?php
			if (isset($delpro)) {
				echo $delpro;
			}

			?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên món ăn</th>
					<th>Giá món ăn</th>
					<th>Hình ảnh món ăn</th>
					<th>Nhóm món ăn</th>
					<th>Loại món ăn</th>
					<th>Miêu tả</th>
					<th>Loại</th>
					<th>Thực hiện</th>
				</tr>
			</thead>
			<tbody>
				<?php

					  $pdlist = $pd->show_product();
					  if ($pdlist) {
						$i = 0;
						while ($result = $pdlist->fetch_assoc()) {
						$i++;
							
						
					  
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $result['price'] ?></td>
					<td><img src="uploads/<?php echo $result['image']  ?>"  width="60"></td>
					<td><?php echo $result['catName'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
					<td><?php echo $fm->textShorten( $result['product_desc'], 40) ?></td>
					<td><?php 
                       if ($result['type']==0) {
						echo 'Nổi bật';
					   }else {
						echo 'Không nổi bật';
					   }
					
					  ?>
					</td>
					<td><a href="productedit.php?productId=<?php echo $result['productId'] ?>">Sửa</a> || <a href="?productId=<?php echo $result['productId'] ?>">Xóa</a></td>
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
