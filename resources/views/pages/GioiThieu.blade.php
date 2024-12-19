<!DOCTYPE html>
<html>

<head>
    <title>Pet Shop|Cún con</title>
    <meta name="keywords" content="Chó cảnh, pet, cách nuôi chó, mua thú cưng">
    <meta name="description" content="Mua bán chó cảnh">
    <meta http-equiv="refresh" content="3600">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="{{asset('public/frontend/css/phukien.css')}}" rel="stylesheet" /> -->
    <link href="{{asset('public/frontend/css/gioithieu.css')}}" rel="stylesheet" />
 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{asset('public/frontend/public/frontend/image/icon/icon-logo.PNG')}}" rel="shortcut icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('public/frontend/javascript/style_javascript.js')}}"></script>
    <!-- <link href="{{asset('public/frontend/css/index-style.css')}}" rel="stylesheet" /> -->


    <!-- trang detail  -->

    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet"> 
   <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet"> -->
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet"> 

    <!-- javascript  -->
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <!-- /trang detail -->
  
</head>

<body>
<header>
        <div class="tieude">
            <div class="col30">
                <img src="{{asset('public/frontend/image/icon/logo-shop.png')}}" alt="Petshop" />
            </div>
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

                        <?php
            // use Illuminate\Support\Facades\Session;

            $customer_id = Session::get('customer_id');
            if ($customer_id != NULL) {
                // Nếu có `customer_id` trong Session, thì có thể hiển thị nội dung cho trường hợp đã đăng nhập
                ?>
                <a id="dangnhap" href="{{URL::to('/logout-checkout')}}">
                    <img src="{{asset('public/frontend/image/icon/dangnhap-icon.png')}}" alt="đăng nhập">
                    <span>Đăng xuất</span>
                </a>
                <?php
            } else {
                // Nếu không có `customer_id` trong Session
                ?>
                <a id="dangnhap" href="{{URL::to('/dang-nhap-thanh-toan')}}">
                    <img src="{{asset('public/frontend/image/icon/dangnhap-icon.png')}}" alt="đăng nhập">
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
                <a href="#">
                    <img src="{{asset('public/frontend/image/icon/giongcho-icon.png')}}" alt="giống chó">
                    <span>GIỐNG CHÓ</span>

                </a>
             
            </li>
            <li>
                <a href="{{URL::to('/cun-con')}}">
                    <img src="{{asset('public/frontend/image/icon/cuncon-icon.png')}}" alt="cún con">
                    <span>CÚN CON</span>
                </a>
               
            </li>
            <li>
                <a href="#">
                    <img src="{{asset('public/frontend/image/icon/phukien-icon.png')}}" alt="phụ kiện">
                    <span>PHỤ KIỆN</span>
                </a>
          
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
    <!--section-->
   
    <section class="main">
        <h1>Giới thiệu</h1>
        <p> Nền kinh tế ngày càng phát triển, đời sống con người cũng được nâng cấp, cải thiện hơn. Chính vì vậy, nhu cầu nuôi thú cưng cũng gia tăng đáng kể. Theo thống kê cho thấy, ngành công nghiệp thú cưng sẽ bùng nổ ở nhiều quốc gia trong vòng 5 năm
            tới. Trong đó có Việt Nam.</p>
        <p> Hiểu được điều này, <a href="#">Sieupet.com</a> đã không ngừng cố gắng, nỗ lực để trở thành thương hiệu mua bán thú cưng uy tín nhất tại Việt Nam. Chúng tôi là một trong những đơn vị tiên phong đi đầu trong việc áp dụng công nghệ hiện đại vào
            lĩnh vực chăm sóc & mua bán thú cưng.</p>
        <h2>Lĩnh vực hoạt động</h2>
        <ul class="list">
            <li>
                <h3>Mua bán thú cưng</h3>
                <p>Sieupet sở hữu đội ngũ nhân viên là các chuyên gia nhân giống thú cưng chuyên nghiệp và dày dặn kinh nghiệm. Vì vậy, những em thú được sinh ra tại trại của Siêu Pet luôn là những bé có chất lượng tốt nhất, ngoại hình đẹp. Khi mua bán thú
                    cưng, bạn có thể đến trại giống để tận mắt kiểm chứng và lựa chọn.</p>
                <p>Ngoài ra, chúng tôi còn đang phát triển hệ thống mua bán thú cưng trên toàn quốc. Chia thành 2 quá trình hoạt động: Mua thú cưng & bán thú cưng. Nhiệm vụ của Siêu Pet là bên trung gian đứng ra đảm bảo về chất lượng thú cưng trước khi giao
                    đến tay khách hàng.</p>
            </li>
            <li>
                <h3>Mua thú cưng</h3>
                <p>Chúng tôi hợp tác với rất nhiều trại chó lớn nhỏ và các hộ dân uy tín trên toàn quốc. Nếu như bạn có thú cưng cần bán, hãy liên hệ với chúng tôi. Sau đó, nhân viên của Siêu Pet sẽ đến khảo sát và thỏa thuận mua bán trực tiếp nếu thú cưng
                    của bạn đạt chất lượng.</p>
                <p>Yêu cầu của <a href="#">Sieupet.com</a> khi hợp tác mua thú cưng là:</p>
                <ul class="list-child">
                    <li>Bé cún của bạn phải được tiêm phòng đầy đủ các loại bệnh.</li>
                    <li>Sức khỏe tốt, không có dị tật nào bẩm sinh.</li>
                    <li>Cún nhanh nhẹn, hoạt bát, ngoại hình cân đối đạt tiêu chuẩn.</li>
                </ul>
            </li>
            <li>
                <h3>Bán thú cưng</h3>
                <p>Khi mua thú cưng tại Siêu Pet, ngoài việc đảm bảo các em thú bạn chọn đạt chất lượng tốt, chúng tôi còn có rất nhiều chính sách ưu đãi dành cho khách hàng như:</p>
                <ul class="list-child">
                    <li>Sieupet cam kết luôn đưa ra mức giá tốt nhất, hợp lý nhất dành cho khách hàng.</li>
                    <li>Cung cấp hình ảnh, video và những thông tin chân thực về bé cún cho khách hàng. Đảm bảo làm việc uy tín, có trách nhiệm lấy sự hài lòng của khách hàng lên làm mục tiêu phấn đấu.</li>
                    <li>Hiện nay, <a href="#">Sieupet.com</a> sở hữu tất cả các dòng thú cưng có mặt trên thị trường Việt Nam. Vì vậy chỉ cần bạn để lại thông tin order, chúng tôi sẽ liên hệ và đáp ứng nhu cầu của bạn.</li>
                    <li>Bé cún của bạn sẽ được tiêm phòng đầy đủ các loại bệnh, sức khỏe đảm bảo, chất lượng giống tốt.</li>
                </ul>
            </li>
            <li>
                <h3>Trông giữ thú cưng</h3>
                <p>Khi nào bạn cần sử dụng đến dịch vụ trông giữ thú cưng của Petshop? Đó là khi bạn:</p>
                <ul class="list-child">
                    <li>Đi công tác xa, đi du lịch xa, không thể chăm sóc thú cưng của mình trong một khoảng thời gian dài. Lúc này bạn tuyệt đối không được bỏ mặc bé cún mà hãy đưa chúng đến với Sieupet chúng tôi.</li>
                    <li>Bạn muốn tìm một môi trường giải trí lý tưởng dành cho thú cưng của mình.</li>
                    <li>Bạn không biết cách chăm sóc thú cưng sơ sinh. Hoặc do nhiều nguyên nhân khác như: Mất mẹ, không đủ sữa…</li>
                </ul>
                <p>Dịch vụ trông giữ thú cưng của Sieupet sẽ đảm bảo đáp ứng được tất cả những vấn đề trên của khách hàng. Chúng tôi có một môi trường sống lý tưởng, khoa học dành cho các bé thú cưng. Tại đây, chúng sẽ được trải qua quy trình chăm sóc kỹ
                    lưỡng, khoa học. Bao gồm: Vệ sinh cá nhân, cho ăn uống, tập thể dục thể thao, huấn luyện…</p>
                <p>Đối với những bé cún sơ sinh, Sieupet có 2 phương pháp nuôi khoa học là: Nuôi bộ (nuôi cún sơ sinh hoàn toàn không sử dụng sữa mẹ) hoặc nuôi ghép. Bé cún của bạn sẽ được chăm sóc, cho ăn uống, tiêm phòng đầy đủ. Sau 2 tháng, chúng tôi
                    sẽ giao thú cưng lại cho bạn và thu phí dịch vụ.</p>
            </li>
            <li>
                <h3>Chó nhập ngoại</h3>
                <p>Chó nhập ngoại luôn là sự lựa chọn hàng đầu của khách hàng khi đến với Sieupet. Tại sao lại như vậy? Bởi vì chó nhập ngoại sở hữu rất nhiều ưu điểm nổi bật hơn so với các loại chó cảnh thường về: Ngoại hình, sức khỏe, chất lượng giống,
                    và cả tính cách..</p>
                <p>Nguồn chó ngoại của Petshop đến từ các quốc gia có nền công nghiệp thú cưng phát triển như: Thái lan, Anh, Pháp, Mỹ,.. và rất nhiều nước khác ở khu vực Châu Âu, Châu Mỹ. Khi mua, khách hàng có thể lựa chọn nguồn nhập thú cưng. Sau đó chúng
                    tôi sẽ đáp ứng và cung cấp thông tin, báo giá cho bạn.</p>
                <p>
                    Bạn lo lắng chất lượng của những chú chó nhập ngoại có đảm bảo hay không? Sieupet xin cam đoan với bạn rằng, trước khi được trao đến tay khách hàng, chó ngoại đã trải qua các khâu kiểm dịch vô cùng chặt chẽ, nghiêm ngặt. Đầu tiên là kiểm dịch của trại
                    chó nước ngoài. Sau đó là kiểm dịch xuất cảnh, kiểm dịch nhập cảnh. Và cuối cùng là kiểm dịch của Sieupet.
                </p>
                <p>
                    Chính vì vậy, chúng tôi tự tin & cam kết với khách hàng về chất lượng, độ thuần chủng của những bé cún mà bạn lựa chọn tại Petshop
                </p>
            </li>
            <li>
                <h3>Bán phụ kiện thú cưng</h3>
                <p>Thế giới phụ kiện thú cưng của <a href="">Sieupet.com</a> giống như một thiên đường cung cấp đầy đủ các món đồ bạn muốn trang bị cho em thú của mình. Từ quần áo, đồ dùng sinh hoạt cho tới các loại đồ chơi, sữa tắm… Muốn tìm kiếm bất kỳ
                    loại phụ kiện nào, bạn chỉ cần xem trên website của chúng tôi và ấn nút đặt hàng. Hoặc liên hệ với chúng tôi để được tư vấn nhanh nhất.</p>
            </li>
        </ul>
        <h2>Hoạt động của chúng tôi</h2>
        <ul class="list">
            <li>
                <h3><i class="fab fa-facebook-square"></i> Facebook</h3>
                <p>Trên trang Facebook của Petshop, chúng tôi đăng tải các hình ảnh, video, thông tin hữu ích về: Cách nuôi chó, cách chọn chó, giá chó… Nhằm giúp khách hàng có thêm kiến thức trong lĩnh vực thú cưng. Fanpage Facebook cũng là nơi chúng tôi
                    giao lưu, kết nối với khách hàng của mình. Mọi đánh giá, cảm nhận của khách hàng sẽ được Petshop ghi nhận.</p>
                <p>Ngoài ra, có bất kỳ thay đổi nào trong chính sách dịch vụ, chúng tôi cũng sẽ thông báo trên Facebook để khách hàng nắm được. Vì thế hãy theo dõi Fanpage Facebook của chúng tôi để cập nhật ngay những thông tin mới nhất nhé!</p>
                <div>
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FPetshop-112119790614434&tabs=timeline&width=340&height=238&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340"
                        height="238" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
            </li>
            <li>
                <h3><i class="fab fa-youtube"></i> You tube</h3>
                <p>Youtube là nơi đăng tải các video về các giống thú cưng mà chúng tôi quay được tại trại. Những video này đảm bảo các yếu tố: Chân thực, cung cấp đầy đủ thông tin cho khách hàng, tư vấn mua bán thú cưng cho khách hàng.</p>
                <script src="https://apis.google.com/js/platform.js"></script>

                <div class="g-ytsubscribe" data-channelid="UCn49BvcP1w1mamaOSGTKVZw" data-layout="full" data-count="default"></div>
            </li>
            <li>
                <h3>Website</h3>
                <p>Website cổng thông tin chính thức:<a href="#">Sieupet.com</a> là phương tiện chính diễn ra các hoạt động mua bán & trao đổi thông tin với khách hàng. Tại đây, chúng tôi sẽ cung cấp đầy đủ, chi tiết những thông tin về thú cưng. Bao gồm:
                    Cách chăm sóc, cách huấn luyện, đặc điểm thuần chủng, đặc điểm tính cách của thú cưng…</p>
                <p>Đồng thời, những đàn thú cưng mới sẽ được cập nhập lên website mỗi ngày. Kèm theo đầy đủ thông tin giá cả để khách hàng có thể lựa chọn.</p>
            </li>
        </ul>
        <h2><img src="{{asset('public/frontend/image/icon/check-icon.png')}}" alt="check icon" /> Quyền lợi khách hàng</h2>
        <ol class="list-child">
            <li>Hợp Đồng Mua Bán – Bảo vệ quyền lợi khách hàng.</li>
            <li>Gắn Microchip chứng nhận chủ sở hữu thú cưng hợp pháp.</li>
            <li>Tư vấn huấn luyện, chăm sóc thú cưng trọn đời.</li>
            <li>Hỗ trợ khám chưa bệnh tại nhà (Hà Nội – Tp.HCM).</li>
            <li>Bảo hành toàn diện 3 ngày đầu tiên.</li>
            <li>Bảo hành 30 ngày cho các bệnh đã tiêm phòng.</li>
            <li>Miễn phí vận chuyển tàu xe trên toàn quốc, hỗ trợ phí vận chuyển hàng không.</li>
            <li>Giảm 10% khi mua phụ kiện cho thú cưng tại Siêu Pet.</li>
            <li>Giảm 5% khi mua 2 bé trở lên.</li>
        </ol>
        <h2><img src="{{asset('public/frontend/image/icon/check-icon.png')}}" alt="check icon" /> Liên hệ hợp tác</h2>
        <p>Vui lòng gửi đầy đủ thông tin cho chúng tôi về mail: <a href="mailto:petshop.cuahangthucung@gmail.com">petshop.cuahangthucung@gmail.com</a> nếu bạn có nhu cầu hợp tác lâu dài. Sau đó, chúng tôi sẽ đưa ra những chính sách để đảm bảo quyền lợi giữa
            2 bên. “Hợp tác lâu dài – Cùng nhau phát triển”.</p>
        <h3 class="thank">Pet shop xin cảm ơn quý khách đã quan tâm!</h3>
    </section>
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
                        <a target="_blank" href="https://www.dmca.com/Protection/Status.aspx?ID=1bf3f65e-4ac8-457e-8400-9d299263f727"><img src="{{asset('public/frontend/image/icon/_dmca_premi_badge_7.png" alt="chứng nhận"></a>
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
                    <li>Địa chỉ: Khu đô thị Đại học Đà Nẵng, 470 Đường Trần Đại Nghĩa, phường Hòa Quý, quận Ngũ Hành Sơn, Đà Nẵng <a target="_blank" href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%91%E1%BA%A1i+h%E1%BB%8Dc+CNTT-TT+Vi%E1%BB%87t+-+H%C3%A0n/@15.9752144,108.2509002,17z/data=!3m1!4b1!4m6!3m5!1s0x314219b7501de701:0xd8f61319afabaab2!8m2!3d15.9752144!4d108.2534751!16s%2Fg%2F11b66h7qrn?hl=vi&entry=ttu">Chỉ đường</a></li>
                    <li>Địa chỉ: 110 Đ. Đỗ Bá, Bắc Mỹ An, Ngũ Hành Sơn, Đà Nẵng 550000 <a target="_blank" href="https://www.google.com/search?q=shop+b%C3%A1n+th%C3%BA+c%C6%B0ng+%C4%91%C3%A0+n%E1%BA%B5ng&sca_esv=cb047ac22b9af92a&sca_upv=1&rlz=1C1ONGR_viVN1073VN1073&sxsrf=ADLYWIJjzPRg-AOfU5H3U-bz4oYx97EtrA%3A1716300874065&ei=SqxMZsfTA6qQvr0Pys6n0A8&udm=&oq=shop+b%C3%A1n+th%C3%BA+&gs_lp=Egxnd3Mtd2l6LXNlcnAiD3Nob3AgYsOhbiB0aMO6ICoCCAAyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAESOxCUABYxC9wBXgBkAEEmAGVAaAB_RCqAQQwLjE4uAEByAEA-AEBmAIToAKuDagCEcICBxAjGCcY6gLCAg0QLhjRAxjHARgnGOoCwgIUEAAYgAQY4wQYtAIY6QQY6gLYAQHCAhAQABgDGLQCGOoCGI8B2AECwgIKECMYgAQYJxiKBcICEBAuGIAEGNEDGMcBGCcYigXCAgwQIxiABBgTGCcYigXCAgsQABiABBixAxiDAcICChAuGIAEGEMYigXCAgoQABiABBhDGIoFwgINEAAYgAQYsQMYQxiKBcICBBAAGAPCAh0QLhiABBjRAxjHARiKBRiXBRjcBBjeBBjgBNgBA8ICCBAAGIAEGLEDwgIQEAAYgAQYsQMYQxiDARiKBcICCxAAGIAEGJIDGIoFwgIIEAAYgAQYyQOYAwe6BgYIARABGAG6BgYIAhABGAq6BgYIAxABGBSSBwQ1LjE0oAebgAE&sclient=gws-wiz-serp&lqi=CiBzaG9wIGLDoW4gdGjDuiBjxrBuZyDEkcOgIG7hurVuZ0i3pPnGoLaAgAhaOBAAEAEQAhADEAQQBRgAGAIYAxgEGAUiIHNob3AgYsOhbiB0aMO6IGPGsG5nIMSRw6AgbuG6tW5nkgEJcGV0X3N0b3JlmgEkQ2hkRFNVaE5NRzluUzBWSlEwRm5TVVJzYWpkaFR5MVJSUkFCqgFtCggvbS8wNjhoeRABKhgiFHNob3AgYsOhbiB0aMO6IGPGsG5nKEIyHxABIhtsOW-I5mVzt_iiTHifDQNgxI4stMyx4mLhpuUyJBACIiBzaG9wIGLDoW4gdGjDuiBjxrBuZyDEkcOgIG7hurVuZw#rlimm=7953507562633510643">Chỉ đường</a></li>
                    <li>Địa chỉ: ấp An Phú, xã An Quy, huyện Thạnh Phú, Bến Tre <a target="_blank" href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+THPT
                        +L%C6%B0%C6%A1ng+Th%E1%BA%BF+Vinh/@9.9069258,106.5655095,17z/data=!4m5!3m4!1s0x319ff5bf4d219b61:0xc1d836c355101725!8m2!3d9.9069469!4d106.5642804?hl=vi
                        -VN">Chỉ đường</a></li>
                    <li>
                        Email: <a href="https://mail.google.com/mail/u/1/#inbox/FMfcgzGxTPDqMrXcMXHWZCNTnKGZvtMQ">quynhntd.23itb@vku.udn.vn</a>
                    </li>
                    <li>
                        Holine: <span class="mauholine">0328025630</span>
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