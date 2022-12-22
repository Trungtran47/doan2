<?php
include 'inc/header.php';

?>

<?php
if (isset($_GET['catid']) || $_GET['catid'] != NULL) {
    $id = $_GET['catid'];
}

?>

<div class="main">
	<div class="content pt-5" >
		<div class="content_top">
		<?php 
			$get_name_id = $cat->get_name_cat($id);
			if($get_name_id){
				while($result = $get_name_id->fetch_assoc()){
			?>
			<div class="container ">
				<h3>Nhóm món : <?php echo $result['catName'] ?></h3>
			</div>
			<?php
			}
		}
			?>
			<div class="clear"></div>
		</div>
	
		
			<div class="container pt-5 text-center">
          <div class="row align-items-start shadow p-3 mb-5 bg-body rounded">
          
          <?php 
			$get_product_by_id = $cat->get_product_by_cat($id);
			if($get_product_by_id){
				while($result = $get_product_by_id->fetch_assoc()){
			?>
               <div class="col-3 ">
               <div class="card" style="width: 15rem; margin-top: 20px;">
               <a href="preview.php?proid=<?php echo $result['productId'] ?>"><img style="width:200px; height:100px" src="admin/uploads/<?php echo $result['image'] ?>" alt=""></a>
                <div class="card-body">
                <h5 class="card-title"><?php echo $result['productName'] ?></h5>
                <p class="card-text"><?php echo $fm->textShorten($result['product_desc'], 50)?></em></p>
                <p><span class="price"><?php echo ($result['price']).''.'VNĐ' ?></span></p>
   
                <a href="preview.php?proid=<?php echo $result['productId'] ?>" class="btn btn-outline-dark btn-sm ">xem</a>
                </div>
              </div>
              </div>
              <?php
			}
		} else {
			echo 'Danh muc khong co san pham nao';
		}
			?>
            
           
          </div>

        </div>

	</div>
</div>
<?php
include 'inc/footer.php';
?>