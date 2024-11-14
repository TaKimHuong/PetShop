<!DOCTYPE html>
<html>

<head>
    <title>Pet Shop|Cún con</title>
    <meta name="keywords" content="Chó cảnh, pet, cách nuôi chó, mua thú cưng">
    <meta name="description" content="Mua bán chó cảnh">
    <meta http-equiv="refresh" content="3600">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="{{asset('public/frontend/css/phukien.css')}}" rel="stylesheet" /> -->
    <link href="{{asset('public/frontend/css/dichvu.css')}}" rel="stylesheet" />
 
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
                    <input type="search" placeholder="Bạn tìm gì..." />
                    <input type="image" value="timkiem" id="anh" src="{{asset('public/frontend/image/icon/search-icon.png')}}" />
                </div>
            </div>
            <div class="col10 header-icon">
                <a id="hotro" href="#">
                    <img src="{{asset('public/frontend/image/icon/hotro-icon.png')}}" alt="hỗ trợ">
                    <span>Hỗ trợ</span>
                </a>
            </div>
            <div class="col10 header-icon">
                <a href="#">
                    <img src="{{asset('public/frontend/image/icon/giohang-icon.png')}}" alt="Giỏ hàng">
                    <span>Giỏ hàng</span>
                </a>
            </div>
            <div class="col10 header-icon">
                <a id="dangnhap" href="{{URL::to('/admin')}}">
                    <img src="{{asset('public/frontend/image/icon/dangnhap-icon.png')}}" alt="đăng nhập">
                    <span>Đăng nhập</span>
                </a>
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
                <a href="cuncon.html">
                    <img src="{{asset('public/frontend/image/icon/cuncon-icon.png')}}" alt="cún con">
                    <span>CÚN CON</span>
                </a>
               
            </li>
            <li>
                <a href="phukien.html">
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
                <a href="dichvu.html">
                    <img src="{{asset('public/frontend/image/icon/dichvu-icon.png')}}" alt="dịch vụ">
                    <span>DỊCH VỤ</span>
                </a>
            </li>
            <li>
                <a href="gioithieu.html">
                    <img src="{{asset('public/frontend/image/icon/gioithieu-icon.png')}}" alt="giới thiệu">
                    <span>GIỚI THIỆU</span>
                </a>
            </li>
            <li>
                <a href="lienhe.html">
                    <img src="{{asset('public/frontend/image/icon/lienhe-icon.png')}}" alt="liên hệ">
                    <span>LIÊN HỆ</span>
                </a>
            </li>
        </ul>
    </nav>
    <!--section-->
    <section class="main">
        <section class="service">
            <h1 class="type-service">Dịch vụ nhập chó ngoại</h1>
            <ul class="list-service">
                <li>
                    <h3><img src="{{asset('public/frontend/image/icon/uudiem-icon.png')}}" alt="ưu điểm" /> Ưu điểm với chó nhập ngoại</h3>
                    <ul class="info-service">
                        <li>Con giống to đẹp phát triển khỏe mạnh với môi trường phù hợp.</li>
                        <li>Kỹ thuật dạy tiên tiến hợp lý “thích hợp làm nghiệp vụ và trông coi nhà xưởng”</li>
                        <li>Được kiểm dịch nhiều lần “kiểm dịch của trại, kiểm dịch khi xuất cảnh, kiểm dịch khi nhập cảnh và qua quá trình kiểm dịch chặt chẽ của <a href="">Petshop</a></li>
                    </ul>
                </li>
                <li>
                    <h3><img src="{{asset('public/frontend/image/icon/khuyetdiem-icon.png')}}" alt="nhược điểm" /> Nhược điểm</h3>
                    <ul class="info-service">
                        <li>Giá thành chó nhập ngoại sẽ cao hơn so với giá thành chó sinh sản ở Việt Nam.</li>
                        <li>Thích hợp hơn với người nuôi làm giống và có mục địch rõ ràng.</li>
                    </ul>
                </li>
                <li>
                    <h3><img src="{{asset('public/frontend/image/icon/cachthuc-icon.png')}}" alt="cách thức" /> Cách thức nhập chó</h3>
                    <p>Các bạn có thể gửi yêu cầu của mình về chú chó bạn muốn Petshop nhập về ví dụ như:</p>
                    <ul class="info-service">
                        <li>Giống chó</li>
                        <li>Giới tính</li>
                        <li>Màu lông</li>
                        <li>Độ tuổi</li>
                        <li>Cân nặng</li>
                        <li>Có giấy chứng nhận thuần chủng hay không?</li>
                        <li>Đã qua huấn luyện hay chưa. . .</li>
                    </ul>
                </li>
                <li>
                    <h3><img src="{{asset('public/frontend/image/icon/quocgia-icon.png')}}" alt="quốc gia" /> Quốc gia muốn nhập chó</h3>
                    <ul class="info-service">
                        <li>Petshop sẽ dựa theo yêu cầu trên của quý khách và tư vấn cho quý khách nên nhập chó ở quốc gia nào: Nhập Thái, nhập Nga, nhập châu Âu, nhập Mỹ. . .</li>
                        <li>Sau đó Petshop sẽ gửi ảnh và video bé cún cho quý Khách lựa chọn “nếu cún không giấy sẽ có ảnh và video chó bố mẹ”</li>
                        <li>Quý khách sẽ chốt và đặt cọc đơn hàng với Petshop, Petshop sẽ nhập về với thời gian mà quý khách đã lựa chọn.</li>
                    </ul>
                </li>
                <li>
                    <h3><img src="{{asset('public/frontend/image/icon/camket-icon.png')}}" alt="cam kết" /> Cam kết</h3>
                    <ul class="info-service">
                        <li>Đúng chó đúng yêu cầu.</li>
                        <li>Tư vấn trọn đời về chăm sóc cũng như sức khỏe của chó.</li>
                        <li>Thời gian nhập hanh chóng.</li>
                        <li>Bảo Hành các bệnh đã có trong tiêm phòng.</li>
                    </ul>
                </li>
            </ul>
        </section>

        <section class="service">
            <h1 class="type-service">Dịch vụ mua bán chó</h1>
            <ul class="list-service">
                <li>
                    <h3><img src="{{asset('public/frontend/image/icon/muaban-icon.png')}}" alt="mua chó" /> Mua chó</h3>
                    <p>Hiện nay, Petshop đã hợp tác & mua cún với các hộ dân và trại chó chất lượng trên toàn quốc.</p>
                    <ul class="info-service">
                        <li>Liên hệ với Petshop để thông báo cho chúng tôi biết các bạn đang cần bán cún và nhu cầu muốn hợp tác lâu dài.</li>
                        <li>Petshop sẽ liên hệ và hẹn ngày đến khảo sát.</li>
                        <li>Chúng tôi sẽ cử nhân viên đến khảo sát trực tiếp, nếu đàn cún của bạn đạt chất lượng chúng tôi sẽ trao đổi mua cún.</li>
                        <li>Nếu đạt yêu cầu chúng tôi sẽ mua với giá cao để hợp tác lứa tiếp theo.</li>
                        <li>Hai bên có thể thỏa thuận ký hợp đồng mua bán trọn đời.</li>
                    </ul>
                </li>
                <li>
                    <h3><img src="{{asset('public/frontend/image/icon/muaban-icon.png')}}" alt="bán chó" /> Bán chó</h3>
                    <ul class="info-service">
                        <li>Cún bán ra tại Petshop sẽ tiêm phòng đầy đủ và có cam kết bảo hành.</li>
                        <li>Giá cả sẽ dựa trên tiêu chuẩn của từng bé cún để quy định.</li>
                        <li>Petshop sẽ cung cấp hình ảnh và video cho các bạn 1 cách chân thực nhất!</li>
                        <li>Chúng tôi nhận order tất cả các dòng cún có mặt trên thị trường Việt Nam hiện nay.</li>
                        <li>Bạn có thể giao dịch trực tiếp tại địa điểm của Petshop</li>
                        <li>Nếu cún được nhân giống tại trại giống của Petshop bạn có thể đến xem trực tiếp.</li>
                    </ul>
                </li>
            </ul>
        </section>

        <section class="service">
            <h1 class="type-service">Trông giữ thú cưng</h1>
            <ul class="list-service">
                <li>
                    <h3><img src="{{asset('public/frontend/image/icon/tronggiu-icon.png')}}" alt="trông giữ" /> Trông giữ chó</h3>
                    <ul class="info-service">
                        <li>Từ 1kg – 10kg: 90.000/ngày</li>
                        <li>Từ 11kg – 15kg: 120.000/ngày</li>
                        <li>Từ 16kg – 25kg: 180.000/ngày</li>
                        <li>Từ 26kg – 35kg: 230.000/ngày</li>
                        <li>Từ 36kg – 50kg: 300.000/ngày</li>
                        <p>Phí đã bao gồm tiền ăn (ngày 2-3 bữa) tùy theo thú cưng của bạn gửi.</p>
                    </ul>
                </li>
                <li>
                    <h3><img src="{{asset('public/frontend/image/icon/luuy-icon.png')}}" alt="lưu ý" /> Lưu ý</h3>
                    <ul class="info-service">
                        <li>Giá trên là phí chăm sóc cơ bản.</li>
                        <li>Shop không nhận thú chó bị bệnh.</li>
                        <li>Chủ nuôi có thể gửi thêm thức ăn hoặc đồ chơi quen thuộc của thú cưng.</li>
                        <li>Nếu thú cưng bị dị ứng với 1 số loại thức ăn, chủ nuôi cần thông báo cho nhân viên chăm sóc của Petshop</li>
                    </ul>
                </li>
                <li>
                    <h3><img src="{{asset('public/frontend/image/icon/quyenloi-icon.png')}}" alt="quyền lợi" /> Quyền lợi của khách hàng khi gửi thú cưng</h3>
                    <ul class="info-service">
                        <li> Miễn phí nhận và trả thú cưng tại nhà bằng lồng chuyên dụng tại Hà Nội và thành phố Hồ Chí Minh.</li>
                        <li>Cung cấp đầy đủ dưỡng chất cho thú cưng.</li>
                        <li>Hằng ngày các bé sẽ được vui chơi vào cuối buổi chiều để giải tỏa năng lượng, thức đẩy cơ thể trao đổi chất tốt hơn giúp các bé phát triển toàn diện hơn.</li>
                        <li>Các bé sẽ được tắm rửa vệ sinh sạch sẽ trước khi về với chủ.</li>
                    </ul>
                </li>
                <li>
                    <h3>
                        <a href="lienhe"><img src="{{asset('public/frontend/image/icon/phone-icon.png')}}" alt="liên hệ" /> Hãy liên hệ với chúng tôi để biết thêm chi tiết.</a>
                    </h3>
                </li>
            </ul>
        </section>
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