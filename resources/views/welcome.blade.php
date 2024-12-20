<!DOCTYPE html>
<html>
<head>
    <title>Pet Shop|Cửa Hàng Mua Bán Thú Cưng</title>
    <meta name="keywords" content="Chó cảnh, pet, cách nuôi chó, mua thú cưng">
    <meta name="description" content="Mua bán chó cảnh">
    <meta http-equiv="refresh" content="3600">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{asset('public/frontend/css/index-style.css')}}" rel="stylesheet" />
    <!-- responsive -->
    <link rel="stylesheet" media="mediatype and|not|only (expressions)" href="print.css">
    <!-- icon web -->
    <link href="{{asset('public/frontend/image/icon/icon-logo.PNG')}}" rel="shortcut icon" />
    <!-- icon -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- javascript -->
    <script src="{{asset('public/frontend/js/style_javascript.js')}}"></script>

   
</head>

<body>
  
    <!--  header -->
    <header>
        <div class="tieude">
            <div class="col30">
                <img src="{{asset('public/frontend/image/icon/logo-shop.png')}}" alt="Petshop" />
            </div>
            <!-- <div class="col40">
                <div class="search">
                    <input type="search" placeholder="Bạn tìm gì..." />
                    <input type="image" value="timkiem" src="{{asset('public/frontend/image/icon/search-icon.png')}}" />
                </div>
            </div> -->
            <div class="col40">
                <div class="search">
                    <form action="{{URL::to('/tim-kiem')}}" method="POST">
                        {{csrf_field()}}
                    <!-- <input style="width: 500px; border-radius: 5px;" type="search" name="tukhoa_tim_kiem" placeholder="Bạn tìm gì..." />

                     <input type="submit" name="search_items" class="btn btn- btn-sn" value="Tim kiếm"> -->
                     <input style="width: 400px; border-radius: 5px;" type="search" id="search-input" name="tukhoa_tim_kiem" placeholder="Bạn tìm gì..." autocomplete="off"/>
                    </form>
                </div>
            </div>
            <div class="col10 header-icon">

            <?php
            use Illuminate\Support\Facades\Session;
            $customer_id = Session::get('customer_id');
            $hoadon_id = Session::get('hoadon_id');

            if($customer_id!=NULL && $hoadon_id==NULL)  {
            ?>
            <a id="hotro" href="{{URL::to('/checkout')}}">
                    <img src="{{asset('public/frontend/image/icon/hotro-icon.png')}}" alt="hỗ trợ">
                    <span>Thanh toán</span>
                </a>
            <?php
            }elseif($customer_id!=NULL && $hoadon_id!=NULL){

            ?>
            <a id="hotro" href="{{URL::to('/payment')}}">
                    <img src="{{asset('public/frontend/image/icon/hotro-icon.png')}}" alt="hỗ trợ">
                    <span>Thanh toán</span>
                </a>

                <?php

            }else {
                ?>
            <a id="hotro" href="{{URL::to('/dang-nhap-thanh-toan')}}">
                    <img src="{{asset('public/frontend/image/icon/hotro-icon.png')}}" alt="hỗ trợ">
                    <span>Thanh toán</span>
                </a>
                <?php
            }
            ?>


            </div>
            <div class="col10 header-icon">
                <a href="{{URL::to('/Hien-thi-gio-hang')}}">
                    <img src="{{asset('public/frontend/image/icon/giohang-icon.png')}}" alt="Giỏ hàng">
                    <span>Giỏ hàng</span>
                </a>
            </div>
            <div class="col10 header-icon">
            <a href="{{URL::to('/Thong-tin-tai-khoan/'.$customer_id)}}">  <img src="{{asset('public/frontend/image/icon/dangnhap-icon.png')}}" alt="đăng nhập"></a>
                        <?php
            // use Illuminate\Support\Facades\Session;

            $customer_id = Session::get('customer_id');
            if ($customer_id != NULL) {
                // Nếu có `customer_id` trong Session, thì có thể hiển thị nội dung cho trường hợp đã đăng nhập
                ?>
                <a id="dangnhap" href="{{URL::to('/logout-checkout')}}">
                   
                    <span>Đăng xuất</span>
                </a>
                <?php
            } else {
                // Nếu không có `customer_id` trong Session
                ?>
                <a id="dangnhap" href="{{URL::to('/dang-nhap-thanh-toan')}}">
                  
                    <span>Đăng nhập</span>
                </a>
                <?php
            }
            ?>
            </div>
        </div>
    </header>
     <!--  nav -->
     <nav id="nav_menu">
        <ul class="menu">
            <li>
                <a href="{{URL::to('/trang-chu')}}">
                    <img src="{{asset('public/frontend/image/icon/home-icon.png')}}" alt="trang chủ">
                    <span>TRANG CHỦ</span>
                </a>
            </li>
            <li>
                <a href="giongcho.html">
                    <img src="{{asset('public/frontend/image/icon/giongcho-icon.png')}}" alt="giống chó">
                    <span>GIỐNG CHÓ</span>

                </a>
              
            </li>
            <li>
                <a href="{{URL::to('/cun-con')}}">
                    <img src="{{asset('public/frontend/image/icon/cuncon-icon.png')}}" alt="cún con">
                    <span>CÚN CON</span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <ul class="menu-list">
                            <li>
                                <a href="z1.html">Ikita Inu</a>
                            </li>
                            <li>
                                <a href="zzalaska14.html">Alaska</a>
                            </li>
                            <li>
                                <a href="z13.html">Bắc Hà</a>
                            </li>
                            <li>
                                <a href="z13.html">Bắc Kinh</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="menu-list">
                            <li>
                                <a href="z11.html">Becgie Đức</a>
                            </li>
                            <li>
                                <a href="zbordercoli7.html">Border collie</a>
                            </li>
                            <li>
                                <a href="zBullDog15.html">Bulldog</a>
                            </li>
                            <li>
                                <a href="z9.html">Bully American</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="menu-list">
                            <li>
                                <a href="z17.html">Chihuahua</a>
                            </li>
                            <li>
                                <a href="z16.html">Chó Đốm</a>
                            </li>
                            <li>
                                <a href="z5.html">Chó Nhật</a>
                            </li>
                            <li>
                                <a href="zChowChow16.html">Chow Chow</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="menu-list">
                            <li>
                                <a href="zcooker1.html">Cocker Spaniel</a>
                            </li>
                            <li>
                                <a href="zCorgi21.html">Corgi</a>
                            </li>
                            <li>
                                <a href="zdoberman2.html">Dobermann</a>
                            </li>
                            <li>
                                <a href="zGloden Retriever19.html">Golden Retriever</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="menu-list">
                            <li>
                                <a href="ZGreat Dane24.html">Great Dane</a>
                            </li>
                            <li>
                                <a href="z20.html">H'Mông Cộc</a>
                            </li>
                            <li>
                                <a href="zhusky5.html">Husky</a>
                            </li>
                            <li>
                                <a href="zLabrador11.html">Labrador</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="menu-list">
                            <li>
                                <a href="zLạp Xưởng13.html">Lạp Xưởng</a>
                            </li>
                            <li>
                                <a href="zMinPin25.html">Malinois</a>
                            </li>
                            <li>
                                <a href="z21.html">Ngao Tây Tạng</a>
                            </li>
                            <li>
                                <a href="zphochuou4.html">Phốc Hươu</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="menu-list">
                            <li>
                                <a href="zphocsoc8.html">Phốc Sóc</a>
                            </li>
                            <li>
                                <a href="zPhú Quốc23.html">Phú Quốc</a>
                            </li>
                            <li>
                                <a href="zPitbull9.html">Pitbull</a>
                            </li>
                            <li>
                                <a href="zpoodle3.html">Poodle</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="menu-list">
                            <li>
                                <a href="zPug18.html">Pug</a>
                            </li>
                            <li>
                                <a href="zRottweiler10.html">Rottweiler</a>
                            </li>
                            <li>
                                <a href="zsaoyed6.html">Samoyed</a>
                            </li>
                            <li>
                                <a href="z7.html">Shiba Inu</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="phukien.html">
                    <img src="{{asset('public/frontend/image/icon/phukien-icon.png')}}" alt="phụ kiện">
                    <span>PHỤ KIỆN</span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <ul class="menu-list">
                            <li><a href="zy1.html">Đồ Dùng Thú Cưng</a></li>
                            <li><a href="zy3.html">Thức Ăn Thú Cưng</a></li>
                            <li><a href="zy12.html">Chuồng Lồng Thú Cưng</a></li>
                            <li><a href="zy11.html">Đồ Chơi Thú Cưng</a></li>

                        </ul>
                    </li>
                    <li>
                        <ul class="menu-list">
                            <li><a href="zy7.html">Phụ Kiện Làm Đẹp</a></li>
                            <li><a href="zy10.html">Quần Áo Thú Cưng</a></li>
                            <li><a href="zy6.html">Thực Phẩm Dinh Dưỡng</a></li>
                            <li><a href="zy9.html">Thuốc & Sản Phẩm Chức Năng</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{URL::to('/cach-nuoi')}}">
                    <img src="{{asset('public/frontend/image/icon/cachnuoi-icon.png')}}" alt="cách nuôi">
                    <span>CÁCH NUÔI</span>
                </a>
            </li>
            <li>
                <a href="{{URL::to('/dich-vu')}}">
                    <img src="{{asset('public/frontend/image/icon/dichvu-icon.png')}}" alt="dịch vụ">
                    <span>DỊCH VỤ</span>
                </a>
            </li>
            <li>
                <a href="{{URL::to('/gioi-thieu')}}">
                    <img src="{{asset('public/frontend/image/icon/gioithieu-icon.png')}}" alt="giới thiệu">
                    <span>GIỚI THIỆU</span>
                </a>
            </li>
            <li>
                <a href="{{URL::to('/lien-he')}}">
                    <img src="{{asset('public/frontend/image/icon/lienhe-icon.png')}}" alt="liên hệ">
                    <span>LIÊN HỆ</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- section main -->
    <section class="main">
        <section class="section-content">

            <!-- section bootstrap -->
            <section class="bootstrap-carousel">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('public/frontend/image/anhhotro/bootstrap-img.PNG')}}" alt="hình ảnh">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('public/frontend/image/anhhotro/bootstrap1-img.PNG')}}" alt="hình ảnh">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('public/frontend/image/anhhotro/boostrap2.jpg')}}" alt="hình ảnh">
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </section>

        </section>
       <div>
        @yield('dog')
       </div>

      
    </section>
    <!-- nut go to back -->
    <div class="back-to-top" id="backtop">
        <a href="">
            <img src="{{asset('public/frontend/image/icon/icon-backtotop.png')}}" alt="back to top" />
        </a>
    </div>
    <!-- thong tin lien he -->
    <div class="contact-bubbles">
        <div class="bubbles-zalo">

            <a target="_blank" href="zalo.html"><img src="{{asset('public/frontend/image/icon/zalo-icon.png')}}" alt="icon" /></a>
        </div>
        <div class="bubbles-mesenge">

            <a target="_blank" href="https://www.facebook.com/profile.php?id=100026826787013&locale=vi_VN"><img src="{{asset('public/frontend/image/icon/facebook-icon.png')}}" alt="icon" /></a>

        </div>
        <div class="bubbles-mail">

            <a href="https://mail.google.com/mail/u/1/#inbox/FMfcgzGxTPDqMrXcMXHWZCNTnKGZvtMQ"><img src="{{asset('public/frontend/image/icon/mail-icon.png')}}" alt="icon" /></a>

        </div>
        <div class="bubbles-phone">

            <a target="_blank" href="lienhe.html"><img src="{{asset('public/frontend/image/icon/phone-con-thongtin.png')}}" alt="icon" /></a>

        </div>

    </div>
    <!-- form ho tro -->
    <div class="form-support">
        <div>
            <h1>
                HỖ TRỢ
            </h1>
        </div>
        <div>
            <img src="{{asset('public/frontend/image/icon/user-name.png')}}" /><input type="text" placeholder="Nhập họ và tên..." />
        </div>
        <div>
            <img src="{{asset('public/frontend/image/icon/number-phone.png')}}" /><input type="text" placeholder="Nhập số điện thoại..." />
        </div>

        <div>
            <img src="{{asset('public/frontend/image/icon/mail-name.png')}}" /><input type="text" placeholder="Nhập email của bạn..." />
        </div>
        <div class="question">
            <textarea placeholder="Nhập nội dung" rows="5">
Nhập nội dung
        </textarea>
            <div>
                <input type="button" value="Gửi đi" />
            </div>
        </div>
        <div id="knot">
            <img src="{{asset('public/frontend/image/icon/botton-out.png')}}">
        </div>
    </div>

    <div class="form-wrapper">
        <!-- Form đăng nhập -->
         <form action="" method="post">
        <div class="form-login">
            <h1>ĐĂNG NHẬP</h1> 
            <div class="login-heading">
                <img src="{{asset('public/frontend/image/icon/user-name.png')}}" />
                <input type="text" placeholder="Nhập tên đăng nhập..." />
            </div>
            <div class="login-heading password-wrapper">
                <img src="{{asset('public/frontend/image/icon/password.png')}}" />
                <input type="password" placeholder="Nhập mật khẩu..." />
            </div>
            <div>
                <input type="button" value="Đăng nhập" id="dangnhap" />
            </div>
            <div class="register-link">
                <p>Bạn chưa có tài khoản? <a href="#" class="register-btn">Đăng ký ngay</a></p>
            </div>
            <div id="knot1"><img src="{{asset('public/frontend/image/icon/botton-out.png')}}"></div>
        </div>
        </form>
       <!-- Form đăng ký -->
<div class="form-wrapper">
    <div class="form-register">
        <h1>ĐĂNG KÝ</h1> 
            <div class="login-heading">
            <img src="public/frontend/image/icon/user-name.png')}}" />
            <input type="text" placeholder="Nhập tên đăng ký..." />
        </div>
        <!-- Email -->
        <div class="login-heading email">
            <img src="public/frontend/image/icon/email.png')}}" />
            <input type="email" placeholder="Nhập địa chỉ Gmail..." />
        </div>
        <!-- Phone number -->
        <div class="login-heading tel">
            <img src="{{asset('public/frontend/image/icon/phone.png')}}" />
            <input type="tel" placeholder="Nhập số điện thoại..." />
        </div>
        <!-- Password -->
        <div class="login-heading password-wrapper">
            <img src="{{asset('public/frontend/image/icon/password.png')}}" />
            <input type="password" placeholder="Nhập mật khẩu..." />
        </div>
        <div class="login-heading password-wrapper">
            <img src="{{asset('public/frontend/image/icon/password.png')}}" />
            <input type="password" placeholder="Nhập lại mật khẩu..." />
        </div>
        <div>
            <input type="button" value="Đăng ký" id="dangki" />
        </div>
        <div class="register-link">
            <p>Đã có tài khoản? <a href="#" class="login-btn">Đăng nhập</a></p>
        </div>
        <div id="knot2"><img src="{{asset('public/frontend/image/icon/botton-out.png')}}"></div>
    </div>
</div>



    <!--footer-->
    <footer>
        <div class="footer">
            <div class="col30 footer-logo">
                <img src="{{asset('public/frontend/image/icon/logo-shop.png')}}" alt="logoshop" />
            </div>
            <div class="col40 freeship">
                <div><img src="{{asset('public/frontend/image/icon/icon-shipping.png')}}" alt="shipping" /></div>
                <div>Giao hàng miễn phí tại TP.HCM, Hà Nội, Đà Nẵng Áp dụng cho đơn hàng từ 500.000đ trở lên</div>
            </div>

        </div>
        <div class="footer">
            <div class="col20 footer-info">
                <h6>Về chúng tôi</h6>
                <ul>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Chi nhánh</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li>
                        <a target="_blank" href="http://online.gov.vn/"><img src="{{asset('public/frontend/image/icon/icon-bocongthuong.png')}}" alt="bộ công thương"></a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.dmca.com/Protection/Status.aspx?ID=1bf3f65e-4ac8-457e-8400-9d299263f727"><img src="{{asset('public/frontend/image/icon/_dmca_premi_badge_7.png')}}" alt="chứng nhận"></a>
                    </li>
                </ul>
            </div>
            <div class="col40 footer-support">
                <h6>Hỗ trợ khách hàng</h6>
                <ul>
                    <li><a href="#">Hướng dẫn mua hàng</a></li>
                    <li><a href="#">Điều khoản và điều kiện</a></li>
                    <li><a href="#">Chính sách bảo mật</a></li>
                    <li><a href="#">Chính sách thanh toán</a></li>
                    <li><a href="#">Chính sách giao hàng</a></li>
                    <li><a href="#">Chính sách đổi trả</a></li>
                    <li><a href="#">Hướng dẫn gửi trả hàng</a></li>
                    <li><a href="#">Chính sách bảo hành</a></li>
                    <li><a href="#">Mua trả góp</a></li>
                    <li><a href="#">Chất lượng dịch vụ</a></li>
                </ul>
            </div>
            <div class="col40 footer-contact">
                <h6>Thông tin liên hệ</h6>
                <ul>
                    <li>Địa chỉ: 371 Nguyễn Kiệm, phường 3, quận Gò Vấp, Tp.Hồ Chí Minh <a target="_blank" href="https://www.google.com/maps/search/dai+hoc+mo+tphcmnguyen+kiem/@10.776026,106.6873724,16.58z?hl=vi-VN">Chỉ đường</a></li>
                    <li>Địa chỉ: 97 Võ Văn Tần, Phường 6, Quận 3, Thành phố Hồ Chí Minh <a target="_blank" href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%90H+M%E1%BB%9F+
                        TP.+H%E1%BB%93+Ch%C3%AD+Minh/@10.7762811,106.6860528,16.58z/data=!4m5!3m4!1s0x31752f3ae35e3725:0x20c5174a
                        47f97be3!8m2!3d10.776266!4d106.6904628?hl=vi-VN">Chỉ đường</a></li>
                    <li>Địa chỉ: ấp An Phú, xã An Quy, huyện Thạnh Phú, Bến Tre <a target="_blank" href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+THPT
                        +L%C6%B0%C6%A1ng+Th%E1%BA%BF+Vinh/@9.9069258,106.5655095,17z/data=!4m5!3m4!1s0x319ff5bf4d219b61:0xc1d836c355101725!8m2!3d9.9069469!4d106.5642804?hl=vi
                        -VN">Chỉ đường</a></li>
                    <li>
                        Email: <a href="https://mail.google.com/mail/u/1/#inbox/FMfcgzGxTPDqMrXcMXHWZCNTnKGZvtMQ">quynhntd.23itb@vku.udn.vn</a>
                    </li>
                    <li>
                        Holine: <span class="mauholine">0888425094</span>
                    </li>
                    <li>
                        Website: <a href="index.html">http://petshop.vn</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>
            </div>
        </div>
    </footer>
</body>

</html>