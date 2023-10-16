      <!-- top above heading -->
      <div class="top hide-on-mobile-tablet" id="home-top">
        <div class="wrap">
          <div class="top-left f-c-c">
            <span>Miễn phí ship cho đơn hàng trên 200.000 VNĐ </span>
          </div>
          <div class="top-nav f-c-c">
            <?php
              if($keyAdmin){
            ?>
              <div class="top-nav__item f-c-c">
              <span><a href="doanh-so-ban-hang">Kênh người bán</a></span>
            </div>
            <?php
              }
            ?>
            <div class="top-nav__item f-c-c">
              <span><a href="">Trợ giúp</a></span>
            </div>

            <?php
              if(isset($_SESSION['user-email'])){
                echo '<div class="top-nav__item f-c-c"><span><a href="dang-nhap">Đăng xuất</a></span></div>';
              }else{
                echo '<div class="top-nav__item f-c-c"><span><a href="dang-nhap">Đăng nhập</a></span></div>';

              }
            ?>
            <div class="top-nav__item f-c-c">
              <span><a href="">Ngôn ngữ</a></span>
            </div>
            <div class="top-nav__item f-c-c">
              <span><a href="">Mệnh giá</a></span>
            </div>
          </div>
        </div>
      </div>