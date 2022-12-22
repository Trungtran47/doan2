<?php
include 'inc/header.php';
?>

<!-- <?php
if (isset($_GET['catid']) || $_GET['catid'] != NULL) {
    $id = $_GET['catid'];
}
?> -->

<?php
if ($_SERVER['REQUEST_METHOD']) {
	$tukhoa = $_POST['tukhoa'];
	$search_product = $product->search_product($tukhoa);
}
?>

<div class="main">
	<div class="content">
		<div class="content_top">
		
			<div class="container pt-5 ">
				<h3 class="shadow p-3 mb-5 bg-body rounded"> <?php echo $tukhoa ?></h3>
			</div>

			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php 
			if($search_product){
				while($result = $search_product->fetch_assoc()){
			?>
            <div class="container pt-5">
                <div class="row">
                    <div class="col shadow p-3 mb-5 bg-body rounded">
                    <div class="row">
                        <div class="col-2">
				<a href="preview.php?proid=<?php echo $result['productId'] ?>"><img style="width:50%; height:50%;text-align: center;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
				</div>
                <div class="col-10 ">
                <h2><?php echo $result['productName'] ?></h2>
				<p><?php echo $fm->textShorten($result['product_desc'],2000) ?></p>
				<p><span class="price"><?php echo $result['price'].' '.'VND' ?></span></p>
				<div class="button"><span><a style="text-decoration: none; color: black;"  href="preview.php?proid=<?php echo $result['productId'] ?>" class="details" >Xem</a></span></div>
                </div>
            </div>
                    </div>
                </div>
            </div>
			<?php
			}
		} else {
			echo 'Khong co san pham nao';
		}
			?>
		</div>
	</div>
</div>
<?php
include 'inc/footer.php';
?>