<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/product.php' ?>
<?php include_once '../helpers/format.php' ?>
<?php include_once '../lib/database.php' ?>

<?php
         $pd = new product();
		 $fm = new Format();
		 
		 if(isset($_GET['delId'])){
			$id = $_GET['delId'];
			$delpo = $pd->del_post($id);
		}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách tin tức</h2>
        <div class="block">  
			<?php
			if (isset($delpo)) {
				echo $delpo;
			}

			?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Ảnh</th>
					<th>Tiêu đề</th>
					<th>Tin tức</th>
					<th>Trang thái</th>
					<th>Thực hiện</th>
				</tr>
			</thead>
			<tbody>
				<?php

					  $ptlist = $pd->show_post();
					  if ($ptlist) {
						$i = 0;
						while ($result = $ptlist->fetch_assoc()) {
						$i++;
							
						
					  
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><img src="uploads/<?php echo $result['image']  ?>"  width="70"></td>
					<td><?php echo $result['postTieude'] ?></td>
					<td style="width: 500px;"><?php echo $fm->textShorten( $result['postMota'], 100) ?></td>
                    <td><?php echo $result['type'] ?></td>
                    
					<td><a href="postedit.php?postId=<?php echo $result['postId'] ?>">Sửa</a> || <a href="?delId=<?php echo $result['postId'] ?>">Xóa</a></td>
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
