<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'; ?>
<?php
            $brand = new brand();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // The request is using the POST method
                $brandName = $_POST['brandName'];


                $insertBrand = $brand->insert_brand($brandName);
}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm loại món ăn</h2>
               <div class="block copyblock"> 
                 <?php
                    if (isset($insertBrand)) {
                        echo $insertBrand;
                    }
                 ?>

                 <form acttion="brandadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Làm ơn thêm loại món ăn..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Lưu" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>