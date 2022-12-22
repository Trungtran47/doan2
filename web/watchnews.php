<?php
include 'inc/header.php';
?>
<div class="container pt-5">
    <div class="">
    <?php
			$getpost_watchnews = $product->getpost_watchnews();
			if ($getpost_watchnews) {
				while ($result_post = $getpost_watchnews->fetch_assoc()) {

			?>
				


            
        <a href=""><?php echo $result_post['postTieude'] ?></a>
        <img style="height: 150px;" class="card-img-top" src="admin/uploads/<?php echo $result_post['image'] ?>" alt="">
        <p class="card-text" style="position: relative;"><?php echo $fm->textShorten( $result_post['postMota']) ?></p>

        <?php
				}
			}
			?>
    </div>
</div>
<?php
include 'inc/footer.php';
?>