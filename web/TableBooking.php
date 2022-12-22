<?php
use LDAP\Result;

   include_once './inc/header.php';
   include_once './inc/slider.php';
?>


<div class="container pt-5">
<div class="row shadow p-3 mb-5 bg-body rounded" >
      <div class="col-3 "><h3>DỊCH VỤ ĐẶT BÀN</h3></div>
          <div class="col-3"></div>
          <div class="col-3 "><h3></h3></div>
      </div>
   <div class="row ">

     <div class="col-3 shadow p-3 mb-5 bg-body rounded">
        <div class="text-center"><h3 >Đặt chỗ kèm ưu đãi</h3></div>
        <div class="pt-3"> Nên đặt trước 1 ngày.</div>
        <div > Ưu đãi 10% - 30%</div>
     
                        <div class="row pt-3">
                          
                            <div class="col">
                             <input type="date" class="form-control" placeholder="Ngày" aria-label="Ngày">
                            </div>
                          <div class="row pt-3">
                            <div class="col">
                            <input type="time" class="form-control" placeholder="Thời gian" aria-label="Thời gian">
                            </div>
                          </div>
 
                       </div>
                       <div class="row pt-3">
                            <div class="col">
                             <input type="text" class="form-control" placeholder="Người lớn" aria-label="Người lớn">
                            </div>
                            <div class="col">
                            <input type="text" class="form-control" placeholder="Trẻ em" aria-label="Trẻ em">
                            </div>
                       </div>
                       <div class="form-floating pt-3">
                            <textarea class="form-control" placeholder="Leave a note here" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Ghi chú</label>
                        </div>
                         <div class="text-center pt-3" >
                        <button type="submit" class="btn btn-secondary ">Đặt chỗ ngay</button>
                        </div>
                        <div>
                        <div class="booking-call">Hoặc gọi tới: <span class="phone-number ">1900 1897</span> <br>Để đặt chỗ và được tư vấn.</div>
                        </div>
    </div>

    <div class="col-9 ">
        <div class="container shadow p-3 mb-5 bg-body rounded">
                  <!-- slide -->

      <div class="slide">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <!-- <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div> -->
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
              <img src="./image/bandat1.jpg" class="d-block w-100" alt="..." style="height: 500px;">
              <div class="carousel-caption d-none d-md-block text-white">
                <!-- <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p> -->
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="./image/bandat.jpg" class="d-block w-100" alt="..." style="height: 500px;">
              <div class="carousel-caption d-none d-md-block text-white">
                <!-- <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p> -->
              </div>
            </div>
            <div class="carousel-item">
              <img src="./image/bandat3.webp" class="d-block w-100" alt="..." style="height: 500px;">
              <div class="carousel-caption d-none d-md-block text-white">
                <!-- <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p> -->
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
          
        </div>
      </div>
        </div>
        
    </div>
   
   </div>
</div>

      <?php
   include './inc/footer.php';
   
?>
