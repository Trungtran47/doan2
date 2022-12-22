<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php include_once '../classes/product.php'; ?>

<?php

            $post = new product();


            if(isset($_GET['postId']) && $_GET['postId']!=NULL){
                $id = $_GET['postId'];
            }
            else {
                echo "<script>window.location ='postlist.php'</script>";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {


                $updatePost = $post->update_post($_POST, $_FILES,$id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa tin tức</h2>
        <div class="block">          
            
              <?php
                    if (isset($updatePost)) {
                        echo $updatePost;
                    }
                 ?>

                 <?php
                   $get_post_by_id = $post->getpostbyId($id);
                            if ($get_post_by_id) {
                                while ($result_post = $get_post_by_id->fetch_assoc()) {
                                    # code...

                   ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tiêu dề</label>
                    </td>
                    <td>
                        <input type="text" name="postTieude" value="<?php echo $result_post['postTieude'] ?>" class="medium" />
                    </td>
                </tr>
		

				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Nội dung</label>
                    </td>
                    <td>
                        <textarea name="postMota" class="tinymce" <?php echo $result_post['postMota'] ?> ></textarea>
                    </td>
                </tr>

            
                <tr>
                    <td>
                        <label>Ảnh </label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_post['image']  ?>" width="90"> <br>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Trạng thái</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Chọn trạng thái</option>

                            <?php
                               if ($result_post['type']==0) {
                                
                               
                            ?>
                            <option selected  value="0">Nóng </option>
                            <option value="1">Mới nhất</option>
                            <?php
                             }else { 
                            ?>
                            <option value="0">Nóng </option>
                            <option selected value="1">Mới nhất</option>
                            <?php
                              }
                            ?>  
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
             }
          }
            ?>
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


