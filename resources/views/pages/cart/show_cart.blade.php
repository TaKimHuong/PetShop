@extends('CunCon')
@section('content')

<section id="cart_items" style="width: 60%;">

@if(session('message'))
    <div style="font-weight: bold; width: 100%; margin-bottom: 50px; margin-top: 20px;">
        {{ session('message') }}
    </div>
@endif 
<div style="font-weight: bold; width: 100%; margin-bottom: 50px; margin-top: 20px;">
        {{ session('error') }}
    </div>

<meta name="csrf-token" content="{{ csrf_token() }}">
	
		<div>
			<!-- <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div> -->
			<div class="table-responsive cart_info">
				<?php

use Gloudemans\Shoppingcart\Facades\Cart;

				$sanpham = Cart::content();
				

				?>
				<table class="table table-condensed">
			 		<thead>
						<tr class="cart_menu">
							<td class="image">Thông tin sản phẩm</td>
							<td class="description"></td>
							<td class="price">Giá tiền</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td></td>
						</tr>
					</thead>
					<body>
								@foreach($sanpham as $v_sanpham)
				<tr>
					<td class="cart_product">
						<a href=""><img src="{{asset('public/upload/product/'.$v_sanpham->options->image)}}" alt=""></a>
					</td>
					<td class="cart_description">
						<h4><a href="" style="text-align: left;">{{$v_sanpham->name}}</a></h4>
						<p style="margin-top: 10px;">ID sản phẩm: {{$v_sanpham->id}}</p>
					</td>
					<td class="cart_price">
						<p>{{number_format($v_sanpham->price).''.'đ'}}</p>
					</td>
					<td class="cart_quantity">
						<div class="cart_quantity_button">
							<a class="cart_quantity_up" href="javascript:void(0);" data-id="{{ $v_sanpham->rowId }}"> + </a>
							<input class="cart_quantity_input" type="text" name="quantity" value="{{ $v_sanpham->qty }}" autocomplete="off" size="2" style="width: 50px;">
							<a class="cart_quantity_down" href="javascript:void(0);" data-id="{{ $v_sanpham->rowId }}"> - </a>
						</div>
					</td>
					<td class="cart_total">
						<p class="cart_total_price" data-id="{{ $v_sanpham->rowId }}" style="color: #000066; font-weight: bold; font-size: 16px;">
							<?php
								$tong_tien = $v_sanpham->price * $v_sanpham->qty;
								echo number_format($tong_tien) . ' đ';
							?>
						</p>
					</td>
					<td>
						<a class="cart_quantity_delete" href="{{URL::to('/xoa-gio-hang/'.$v_sanpham->rowId)}}" style="margin-top: 10px;"><i class="fa fa-times"></i></a>
					</td>
				</tr>
			@endforeach

			<!-- Tổng giỏ hàng -->
			<p style="font-size: 18px; font-weight: bold;">{{ Cart::subtotal() }} đ</p>

						
					</body>
				</table>
			</div>
		</div>

	</section> <!--/#cart_items-->

	<section id="do_action">
		<div>
			
			<div class="row">
			<div class="col-sm-5">
				<div class="heading">
				<h3>Chọn hình thức thanh toán</h3>
				<!-- <p>Hình thức thanh toán</p> -->
			</div>
					<div class="chose_area">
						<form action="{{URL::to('/check-coupon')}}" method="POST">
							@csrf
						<ul class="user_option">
							<!-- <li>
								<input type="checkbox">
								<label>Sử dụng mã giảm giá</label>
							</li> -->
							<li>
								<input type="checkbox">
								<label>Sử dụng Voucher</label>
								<input type="text" placeholder="Chọn mã giảm giá" name="coupon">
							</li>
							<li>
								<input type="submit" name="check_coupon" value="Xác nhận" class="btn btn-primary">
							</li>
						</ul>
						</form>
						
						
						<!-- <a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a> -->
					</div>
				</div>
				<div class="col-sm-7">
					<div class="total_area">
						<ul>
							<li>Tổng tiền:  <span id="subtotal">{{ Cart::priceTotal(0,',','.') }} đ</span></li>

							<li>Phí vận chuyển: <span>0đ</span></li>
						
							<!-- <li>Mã giảm:  <span>
									@php
										$total = str_replace(',', '', Cart::subtotal()); // Chuyển subtotal thành số thực
										$total_coupon = 0; // Khởi tạo tổng tiền giảm giá
									@endphp

									@if (Session::get('coupon'))
										@foreach(Session::get('coupon') as $key => $cou)
											@if ($cou['coupon_condition'] == 1)
												{{$cou['coupon_number']}} %
												@php
													$total_coupon = ($total * $cou['coupon_number']) / 100;
												@endphp

												<li>Tổng giảm: <span>{{number_format($total_coupon)}} đ</span></li>
									
												 <li>Tổng thanh toán: <span>{{number_format($total - $total_coupon)}} đ</span></li>
												
											@else
												{{$cou['coupon_number']}} k
												@php
													$total_coupon = $cou['coupon_number'];
												@endphp
												<li>Tổng giảm: <span>{{number_format($total_coupon)}} đ</span></li>
												<li>Tổng thanh toán: <span>{{number_format($total - $total_coupon)}} đ</span></li>
											
											@endif
										@endforeach
									@else
										<p>Không có mã giảm giá.</p>
									@endif
								</span></li> -->

								@if (Session::has('coupon'))
								@php
									$coupon = Session::get('coupon')[0];
									$total_coupon = $coupon['coupon_condition'] == 1
										? ($total * $coupon['coupon_number']) / 100
										: $coupon['coupon_number'];
								@endphp
								<li>Mã giảm: <span>{{ $coupon['coupon_condition'] == 1 ? $coupon['coupon_number'] . ' %' : number_format($coupon['coupon_number']) . ' đ' }}</span></li>
								<li>Tổng giảm: <span>{{ number_format($total_coupon) }} đ</span></li>
								<li>Tổng thanh toán: <span id="total_magiam">{{ number_format($total - $total_coupon) }} đ</span></li>
							@else
								<li>Không có mã giảm giá nào.</li>
								<!-- <li>Tổng thanh toán: <span>{{ number_format($total) }} đ</span></li> -->
								<li>Tổng thanh toán: <span id="carttt">{{ Cart::priceTotal(0,',','.') }} đ</span></li>
								
							@endif

							</span></li>
							<!-- <li>Tiền thuế:  <span id="tax">{{Cart::tax(0,',','.')}} đ</span></li>
							<li>Tiền ship: <span id="shipping">Free</span></li>
							<li>Tổng tiền: <span id="tong_gia"> {{ Cart::total(0,',','.') }} đ </span></li> -->
						</ul>
							<!-- <a class="btn btn-default update" href="">Update</a> -->

							<?php
            use Illuminate\Support\Facades\Session;

            $customer_id = Session::get('customer_id');
			$hoadon_id = Session::get('hoadon_id');
            if ($customer_id != NULL && $hoadon_id==NULL) {
                // Nếu có `customer_id` trong Session, thì có thể hiển thị nội dung cho trường hợp đã đăng nhập
                ?>
               	<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
                <?php
            } elseif($customer_id != NULL && $hoadon_id!=NULL) {
				?>
				<a class="btn btn-default check_out" href="{{URL::to('/payment')}}">Thanh toán</a>
			<?php
			}else {
                // Nếu không có `customer_id` trong Session
                ?>
                	<a class="btn btn-default check_out" href="{{URL::to('/dang-nhap-thanh-toan')}}">Thanh toán</a>
                <?php
            }
            ?>
							<!-- <a class="btn btn-default check_out" href="{{URL::to('/dang-nhap-thanh-toan')}}">Thanh toán</a> -->
					</div>
				</div>

			
			</div>
		</div>
	</section><!--/#do_action-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	var totalAmount = $("#total_magiam").text();
    $(document).ready(function() {
    // Khi nhấn nút +
    $('.cart_quantity_up').click(function() {
        var $quantityInput = $(this).siblings('.cart_quantity_input');
        var currentQuantity = parseInt($quantityInput.val());
        var newQuantity = currentQuantity + 1;

        $quantityInput.val(newQuantity);

        updateCart($(this).data('id'), newQuantity);
    });

    // Khi nhấn nút -
    $('.cart_quantity_down').click(function() {
        var $quantityInput = $(this).siblings('.cart_quantity_input');
        var currentQuantity = parseInt($quantityInput.val());
        var newQuantity = currentQuantity > 1 ? currentQuantity - 1 : 1;

        $quantityInput.val(newQuantity);

        updateCart($(this).data('id'), newQuantity);
    });

    function updateCart(rowId, quantity) {
        $.ajax({
            url: '{{ route("cart.updateCart") }}',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
				total_amount: totalAmount,
                rowId: rowId,
                quantity: quantity
            },
            success: function(response) {
                // Cập nhật lại giá sản phẩm, tổng giỏ hàng, thuế và tổng tiền
                $('.cart_total_price[data-id="' + rowId + '"]').text(response.total_price); // Cập nhật giá sản phẩm
                $('#tong_gia').text(response.cart_total); // Cập nhật tổng giỏ hàng
                $('#subtotal').text(response.cart_subtotal); // Cập nhật tổng trước thuế
                $('#tax').text(response.cart_tax); // Cập nhật tiền thuế
				$('#carttt').text(response.carttt);
				$('#totalAmount').text(response.totalAmount);
				
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
            }
        });
    }
});

 
</script>

    @endsection