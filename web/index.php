<?php
use LDAP\Result;

   include_once './inc/header.php';
   include_once './inc/slider.php';
   
?>
      

   
    
    

        <div class="container pt-5">
       
        <!-- about -->
        
        
        <div class="row mb-4 shadow p-3 mb-5 bg-body rounded">
          <!-- <figure class="text-center">
            <blockquote class="blockquote">
              <p>A well-known quote, contained in a blockquote element.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
              Someone famous in <cite title="Source Title">Source Title</cite>
            </figcaption>
          </figure> -->
          <div class="left col-4 ">
            <img src="../web/image/4.jpg" 
            class="img-fluid mb-4 rounded shadow p-3 mb-5 bg-body rounded"  alt="">
       
            

          </div>
          <div class="right col-8">
            <h3>
              <span>Quản lí nhà hàng</span>
            </h3>
            <h2>
              <span>Quản lí các dịch vụ của nhà hàng</span>
            </h2>
            <div class="contentpage">
             Dịch vụ nhà hàng là hình thức mà các nhà hàng – khách sạn cung cấp các loại hình dịch vụ đặt tiệc 
             (như: tiệc cưới, tiệc sinh nhật, tiệc công ty, hội thảo, sự kiện, team building,…) tại nơi theo yêu
             cầu của khách hàng. 
             <br> Ngoài việc phục vụ các món ăn, dịch vụ nhà hàng thường đảm nhiệm luôn cả việc
             trang trí, lên menu (thực đơn), set up (sắp xếp) hệ thống âm thanh ánh sáng… nếu khách hàng có yêu cầu. 
            </div>
            <div class="img_intro_list">
              <div class="intro_img_swiper swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events" style="cursor: grab;">
                <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                  <div class="swiper-slide swiper-slide-active " style="width: 185px; margin-right: 20px;">
                    <a href="#" title="ảnh 1">
                      <img width="186" height="173" src="../web/image/1.jpg" alt="Ảnh 1" class="img-responsive">
                    </a>
                  </div>
                  <div class="swiper-slide swiper-slide-next" style="width: 185px; margin-right: 20px;">
                    <a href="#" title="Ảnh 2">
                      <img width="186" height="173" src="../web/image/bantiec2.jpg" alt="Ảnh 2" class="img-responsive">
                    </a>
                  </div>
                  <div class="swiper-slide" style="width: 185px; margin-right: 20px;">
                    <a href="#" title="Ảnh 3">
                      <img width="186" height="173" src="../web/image/3.jpg" alt="Ảnh 3" class="img-responsive">
                    </a>
                  </div>
                  <div class="swiper-slide" style="width: 185px; margin-right: 20px;">
                    <a href="#" title="Ảnh 4">
                      <img width="186" height="173" src="../web/image/Salad rong nho.jpg" alt="Ảnh 3" class="img-responsive">
                    </a>
                  </div>
                  <div class="swiper-slide" style="width: 185px; margin-right: 20px;">
                    <a href="#" title="Ảnh 5">
                      <img width="186" height="173" src="../web/image/bandat.jpg" alt="Ảnh 3" class="img-responsive">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        </div>
        
         


<div class="container pt-5">
          
          
          <div class="row pt-5 shadow p-3 mb-5 bg-body rounded text-center text-uppercase">
            <!-- <figure class="text-center">
              <blockquote class="blockquote">
                <p>Các món ăn nổi bật.</p>
              </blockquote>
              <figcaption class="blockquote-footer">
                Someone famous in <cite title="Source Title">Source Title</cite>
              </figcaption>
            </figure> -->
            <h1>Các món ăn nổi bật</h1>
          </div>
            <!-- <div class="navtab">
              <div class="btn-group" role="group" aria-label="Default button group">
                <button type="button" class="btn btn-outline-dark"> Left</button>
                <button type="button" class="btn btn-outline-dark">Middle</button>
                <button type="button" class="btn btn-outline-dark">Right</button>
                <button type="button" class="btn btn-outline-dark">Right</button>
                <button type="button" class="btn btn-outline-dark">Right</button>
              </div>
            </div>   -->
        
 

        <div class="container text-center ">
          <div class="row align-items-start shadow p-3 mb-5 bg-body rounded">
          
          <?php
                $getproduct_feathered = $product->getproduct_feathered();
                if($getproduct_feathered){
                  while($result = $getproduct_feathered->fetch_assoc()){
                
			     ?>
               <div class="col-3 ">
               <div class="card" style="width: 15rem; margin-top: 20px;">
               
               <a href="preview.php?proid=<?php echo $result['productId'] ?>"><img class="card-img-top" style="height: 200px;" src="admin/uploads/<?php echo $result['image'] ?>" alt=""></a>
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
            }
              ?>
            
            
           
          </div>

        </div>
        <div class="row pt-5 shadow p-3 mb-5 bg-body rounded  text-center text-uppercase">
            <!-- <figure class="text-center">
              <blockquote class="blockquote">
                <p>Các món ăn mới.</p>
              </blockquote>
              <figcaption class="blockquote-footer">
                Someone famous in <cite title="Source Title">Source Title</cite>
              </figcaption>
            </figure> -->
            <h1>Các món ăn mới</h1>
          </div>
          
        <div class="container text-center">
          <div class="row align-items-start shadow p-3 mb-5 bg-body rounded">
          
            <?php
                $product_new = $product->getproduct_new();
                if($product_new){
                  while($result_new = $product_new->fetch_assoc()){
                
			     ?>
               <div class="col-3 ">
               <div class="card" style="width: 15rem; margin-top: 20px;">
               <a href="preview.php?proid=<?php echo $result_new['productId'] ?>"><img class="card-img-top" style=" height:200px" src="admin/uploads/<?php echo $result_new['image'] ?>" alt=""></a>
                <div class="card-body">
                <h5 class="card-title"><?php echo $result_new['productName'] ?></h5>
                <p class="card-text"><?php echo $fm->textShorten($result_new['product_desc'], 50)?></em></p>
                <p><span class="price"><?php echo ($result_new['price']).''.'VNĐ' ?></span></p>
   
                <a href="preview.php?proid=<?php echo $result_new['productId'] ?>" class="btn btn-outline-dark btn-sm ">xem</a>
                </div>
              </div>
              </div>
              <?php
              }
            }
              ?>
            
           
          </div>

        </div>
    
    </div>
    
    
     <div class="container pt-5 ">
      <div class="row mb-5">
        <figure class="text-center">
          <blockquote class="blockquote">
            <p>A well-known quote, contained in a blockquote element.</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            Someone famous in <cite title="Source Title">Source Title</cite>
          </figcaption>
        </figure>
        </div>
      <div class="card text-bg-dark shadow p-3 mb-5 bg-body rounded">
        <img src="../web/image/3.jpg" class="card-img" alt="..." style="height: 350px;">
        <div class="card-img-overlay text-center">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small>Last updated 3 mins ago</small></p>
        </div>
      </div>
     </div>

     <div class="container pt-5 ">
      <div class="row mb-5">
        <!-- <figure class="text-center">
          <blockquote class="blockquote">
            <p>Các dịch vụ nhà hàng.</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            Someone famous in <cite title="Source Title">Source Title</cite>
          </figcaption>
        </figure> -->
        <h1 class="text-center">CÁC DỊCH VỤ NHÀ HÀNG</h1>
        </div>
      <div class="row align-items-start shadow p-3 mb-5 bg-body rounded">
        <div class="col ">
          <div class="card" style="width: 18rem;">
            <img src="../web/image/bandat.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Dịch vụ đặt bàn.</h5>
              <p class="card-text">Đặt bàn nhà hàng trực tuyến, đặt chỗ nhà hàng online kèm ưu đãi, giảm giá mà không cần voucher.</p>
            </div>
          </div>
        </div>
        <div class="col" >
          <div class="card" style="width: 18rem;">
            <img src="../web/image/bantiec3.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Dịch vụ đặt tiệc.</h5>
              <p class="card-text">Bàn tiệc 10 khách với giá ưu đãi tại nhà hàng RUBY view đẹp. Tặng rượu khai tiệc, cocktail, trang trí tiệc,...</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="width: 18rem;">
            <img src="../web/image/shipper.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Ship món tận nơi.</h5>
              <p class="card-text">Ship món tận nơi là dịch vụ giao đồ ăn & thức uống tại nhà hàng RUBY. Ngoài chính sách bảo hành dài hạn, còn cam kết mang đến người dùng những món ăn ngon...</p>
            </div>
          </div>
        </div>
        </div>
     </div>

<?php
   include './inc/footer.php';
   
?>
      


     