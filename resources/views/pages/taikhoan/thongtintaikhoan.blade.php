<!DOCTYPE html>
<html>

<head>
    <title>Pet Shop|Cún con</title>
    <meta name="keywords" content="Chó cảnh, pet, cách nuôi chó, mua thú cưng">
    <meta name="description" content="Mua bán chó cảnh">
    <meta http-equiv="refresh" content="3600">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="{{asset('public/frontend/css/phukien.css')}}" rel="stylesheet" />
 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{asset('public/frontend/public/frontend/image/icon/icon-logo.PNG')}}" rel="shortcut icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('public/frontend/javascript/style_javascript.js')}}"></script>
    <!-- <link href="{{asset('public/frontend/css/index-style.css')}}" rel="stylesheet" /> -->
    <!-- trang detail  -->

    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
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


    <!-- comment facebook  -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v21.0&appId=1082303003572806"></script>
    <!-- <script async defer crossorigin="anonymous" 
            src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v16.0&appId=1082303003572806&autoLogAppEvents=1">
    </script> -->
    <!-- Open Graph Meta Tags -->


    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<header>
     
        <?php

use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

      
    
        ?>


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
            <a href="#">  <img src="{{asset('public/frontend/image/icon/dangnhap-icon.png')}}" alt="đăng nhập"></a>
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

    <div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 form-container">
                    <h2>THÔNG TIN TÀI KHOẢN</h2>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-error">
                            {{ session('error') }}
                        </div>
                    @endif
                      <form action="{{URL::to('/update-account/'.$customer->customer_id)}}" method="POST">
                        @csrf
                    
                        <div class="form-group">
                            <label for="name">Họ và Tên:</label>
                            <input type="text" id="name" name="customer_name" value="{{ $customer->customer_name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="customer_email" value="{{ $customer->customer_email }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số Điện Thoại:</label>
                            <input type="text" id="phone" name="customer_phone" value="{{ $customer->customer_phone }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Tên Đăng Nhập:</label>
                            <input type="text" id="address" name="customer_name_login" value="{{ $customer->customer_name_login }}">
                        </div>
                        <button type="submit" class="btn">Lưu Thông Tin</button>
                      
                    </form>
                    </div>
                    <div class="col-md-12">
                    <h2>LỊCH SỬ MUA HÀNG</h2>
                    <table class="order-history-table">
                        <thead>
                            <tr>
                                <th>ID Đơn Hàng</th>
                               
                                <th>Tổng Tiền</th>
                                <th>Ngày Đặt</th>
                                <th>Ngày Duyệt</th>
                                <th>Trạng Thái</th>
                                <th>Xem chi tiết đơn hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_order as $order)
                            <tr>
                                <td>{{ $order->dathang_id }}</td>
                                <td>{{ number_format($order->tong_tien, 0, ',', '.') }} VND</td>
                                <td>{{ $order->ngay_dat }}</td>
                               
                              
                                
                                <td>{{ $order->ngay_duyet }}</td>
                                <td>{{ $order->dathang_status }}</td>
                               
                                <td>
                                <a href="{{ URL::to('/view-order/'.$order->dathang_id) }}" class="btn-view-detail">
                                    Xem chi tiết
                                </a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            
        
    </div>
   
   
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
                        <a target="_blank" href="http://http://online.gov.vn/"><img src="{{asset('public/frontend/image/icon/icon-bocongthuong.png')}}" alt="bộ công thương"></a>
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
                    <li>Địa chỉ: Khu đô thị Đại học Đà Nẵng, 470 Đường Trần Đại Nghĩa, phường Hòa Quý, quận Ngũ Hành Sơn, Đà Nẵng <a target="_blank" href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%91%E1%BA%A1i+h%E1%BB%8Dc+CNTT-TT+Vi%E1%BB%87t+-+H%C3%A0n/@15.9752144,108.2509002,17z/data=!3m1!4b1!4m6!3m5!1s0x314219b7501de701:0xd8f61319afabaab2!8m2!3d15.9752144!4d108.2534751!16s%2Fg%2F11b66h7qrn?hl=vi&entry=ttu">Chỉ đường</a></li>
                    <li>Địa chỉ: 110 Đ. Đỗ Bá, Bắc Mỹ An, Ngũ Hành Sơn, Đà Nẵng 550000 <a target="_blank" href="https://www.google.com/search?q=shop+b%C3%A1n+th%C3%BA+c%C6%B0ng+%C4%91%C3%A0+n%E1%BA%B5ng&sca_esv=cb047ac22b9af92a&sca_upv=1&rlz=1C1ONGR_viVN1073VN1073&sxsrf=ADLYWIJjzPRg-AOfU5H3U-bz4oYx97EtrA%3A1716300874065&ei=SqxMZsfTA6qQvr0Pys6n0A8&udm=&oq=shop+b%C3%A1n+th%C3%BA+&gs_lp=Egxnd3Mtd2l6LXNlcnAiD3Nob3AgYsOhbiB0aMO6ICoCCAAyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAESOxCUABYxC9wBXgBkAEEmAGVAaAB_RCqAQQwLjE4uAEByAEA-AEBmAIToAKuDagCEcICBxAjGCcY6gLCAg0QLhjRAxjHARgnGOoCwgIUEAAYgAQY4wQYtAIY6QQY6gLYAQHCAhAQABgDGLQCGOoCGI8B2AECwgIKECMYgAQYJxiKBcICEBAuGIAEGNEDGMcBGCcYigXCAgwQIxiABBgTGCcYigXCAgsQABiABBixAxiDAcICChAuGIAEGEMYigXCAgoQABiABBhDGIoFwgINEAAYgAQYsQMYQxiKBcICBBAAGAPCAh0QLhiABBjRAxjHARiKBRiXBRjcBBjeBBjgBNgBA8ICCBAAGIAEGLEDwgIQEAAYgAQYsQMYQxiDARiKBcICCxAAGIAEGJIDGIoFwgIIEAAYgAQYyQOYAwe6BgYIARABGAG6BgYIAhABGAq6BgYIAxABGBSSBwQ1LjE0oAebgAE&sclient=gws-wiz-serp&lqi=CiBzaG9wIGLDoW4gdGjDuiBjxrBuZyDEkcOgIG7hurVuZ0i3pPnG')}}oLaAgAhaOBAAEAEQAhADEAQQBRgAGAIYAxgEGAUiIHNob3AgYsOhbiB0aMO6IGPGsG5nIMSRw6AgbuG6tW5nkgEJcGV0X3N0b3JlmgEkQ2hkRFNVaE5NRzluUzBWSlEwRm5TVVJzYWpkaFR5MVJSUkFCqgFtCggvbS8wNjhoeRABKhgiFHNob3AgYsOhbiB0aMO6IGPGsG5nKEIyHxABIhtsOW-I5mVzt_iiTHifDQNgxI4stMyx4mLhpuUyJBACIiBzaG9wIGLDoW4gdGjDuiBjxrBuZyDEkcOgIG7hurVuZw#rlimm=7953507562633510643">Chỉ đường</a></li>
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
<script>
        $(document).ready(function() {
    $('#search-input').on('keyup', function() {
        let tukhoa = $(this).val();
        if (tukhoa.length > 0) { // Chỉ gửi yêu cầu nếu có từ khóa
            $.ajax({
                url: "{{ URL::to('/tim-kiem') }}",
                method: "POST",
                data: {
                    tukhoa_tim_kiem: tukhoa,
                    _token: '{{csrf_token()}}'
                },
                success: function(data) {
                    $('#search-results').html(data); // Hiển thị kết quả
                }
            });
        } else {
            $('#search-results').html(''); // Xóa kết quả nếu ô tìm kiếm trống
        }
    });
});

    </script>
    <style>
    
        .form-container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
        }
        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
           
            border-radius: 5px;
            background: #f8f8f8;
        }
        .btn {
            display: block;
            width: 20%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #218838;
        }
        .btn-cancel {
            background-color: #dc3545;
        }
        .btn-cancel:hover {
            background-color: #c82333;
        }
        order-history-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

        /* Style cho tiêu đề của bảng */
        .order-history-table th {
            background-color:#FF9900;
            color: white;
            padding: 12px;
            text-align: left;
            font-size: 16px;
        }

        /* Style cho các ô dữ liệu */
        .order-history-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }

        /* Style cho các dòng trong bảng khi hover */
        .order-history-table tr:hover {
            background-color: #f5f5f5;
        }

        /* Cải thiện độ dễ đọc của các ô */
        .order-history-table th, .order-history-table td {
            text-align: center;
        }

        /* Tạo khoảng cách giữa các bảng và tiêu đề */
        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
            text-align: center;
            margin-top: 50px;
        }

        /* Điều chỉnh kích thước font và các dòng bảng */
        .order-history-table tr {
            transition: background-color 0.3s ease;
        }
        .order-history-table {
            width: 100%;
            margin-bottom: 40px;
        }
        .btn-view-detail {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px; /* Kích thước nhỏ gọn */
        background-color: #FF5722; /* Màu cam */
        color: white;
        text-decoration: none;
        border-radius: 3px; /* Bo góc */
        font-size: 14px; /* Kích thước chữ nhỏ */
        transition: background-color 0.3s ease;
        border: none; /* Loại bỏ viền mặc định */
       
    }

    .btn-view-detail:hover {
        background-color: #FF7043; /* Màu cam đậm hơn khi hover */
    }

    .btn-view-detail i {
        margin-right: 5px; /* Khoảng cách giữa icon và text, nếu có */
    }
    </style>
</html>