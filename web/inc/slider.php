      <!-- slide -->

      <div class="slide">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <!-- <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div> -->
          <div class="carousel-inner">
            <!-- slider1 -->
            <div class="carousel-item active" data-bs-interval="1000">
              <img   <?php
                    $sllist = $product-> show_slider1();
                    if($sllist){
                        while($result = $sllist -> fetch_assoc()){		
                    ?>
                        src="admin/uploads/<?php echo $result['sliderImage'] ?>" alt="<?php echo $result['sliderName'] ?>" 
                        <?php
        }}
        ?> 
        class="d-block w-100" alt="..." style="height: 550px;">
            </div>
            <!-- slider2 -->
            <div class="carousel-item " data-bs-interval="1000">
            <img   <?php
                    $sllist = $product-> show_slider2();
                    if($sllist){
                        while($result = $sllist -> fetch_assoc()){		
                    ?>
                        src="admin/uploads/<?php echo $result['sliderImage'] ?>" alt="<?php echo $result['sliderName'] ?>" 
                        <?php
        }}
        ?> 
        class="d-block w-100" alt="..." style="height: 550px;" data-bs-interval="1000">
            </div>
            <!-- sider3 -->
            <div class="carousel-item " data-bs-interval="1000">
            <img   <?php
                    $sllist = $product-> show_slider3();
                    if($sllist){
                        while($result = $sllist -> fetch_assoc()){		
                    ?>
                        src="admin/uploads/<?php echo $result['sliderImage'] ?>" alt="<?php echo $result['sliderName'] ?>" 
                        <?php
        }}
        ?> 
        class="d-block w-100" alt="..." style="height: 550px;" data-bs-interval="1000">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
          </button>
          
        </div>
      </div>
       

      <div class="conta">
        <div class="container">
          <div class="row align-items-start">
            <div class="col ">
              <img src="./image/p7-removebg-preview.png" width="100px"  alt="">
              <!-- <p>Hình ảnh</p> -->
            </div>
            <div class="col" >
              <img src="./image/p2-removebg-preview.png" width="100px"  alt="">
              <!-- <p>Hình ảnh</p> -->
            </div>
            <div class="col">
              <img src="./image/p3-removebg-preview.png" width="100px"  alt="">
              <!-- <p>Hình ảnh</p> -->
            </div>
            <div class="col">
              <img src="./image/p4-removebg-preview.png" width="100px"  alt="">
              <!-- <p>Hình ảnh</p> -->
            </div>
            <div class="col">
              <img src="./image/p5-removebg-preview.png" width="100px"  alt="">
              <!-- <p>Hình ảnh</p> -->
            </div>
            <div class="col">
              <img src="./image/p6-removebg-preview.png" width="100px"  alt="">
              <!-- <p>Hình ảnh</p> -->
            </div>
            
          </div>
        </div>
      </div>