<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/product.php' ?>

<?php
            $pd = new product();
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {


                $insertPost = $pd->insert_post($_POST, $_FILES);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm món tin tức</h2>
        <div class="block">          
            
        <?php
                    if (isset($insertPost)) {
                        echo $insertPost;
                    }
                 ?>
         <form action="postadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tiêu đề tin tức</label>
                    </td>
                    <td>
                        <input type="text" name="postTieude" placeholder="Nhập vào tên món ăn..." class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Miêu tả</label>
                    </td>
                    <td>
                        <textarea name="postMota" class="tinymce"></textarea>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Tải ảnh lên</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Loại</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Chọn loại</option>
                            <option value="0">Nổi bật</option>
                            <option value="1">Không nổi bật</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Lưu" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


