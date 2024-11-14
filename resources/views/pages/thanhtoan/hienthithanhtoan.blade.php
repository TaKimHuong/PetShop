@extends('CunCon')
@section('content')

<section id="cart_items">
		<div>
	
			<div class="register-req">
				<p>Đăng ký/ Đăng nhập để xem đơn hàng!</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-10">
						<div class="shopper-info">
							<p>Điền thông tin gửi hàng</p>
							<form action="{{URL::to('/save-checkout-customer')}}" method="POST">
                                {{csrf_field()}}
								<input type="text" name="hoadon_email" placeholder="Email">
								<input type="text" name="hoadon_name" placeholder="Họ và tên">
								<input style="margin-left: 10px;" type="text" name="hoadon_address" placeholder="Địa chỉ">
								<input style="margin-left: 10px;" type="text" name="hoadon_phone" placeholder="Số điện thoại">
                                <textarea style="margin-left: 10px;" name="hoadon_note"  placeholder="Ghi chú cho sản phẩm của bạn..." rows="5"></textarea>

                                <input type="submit" value="Gửi" name="update_qty" class="btn btn-primary btn-sm" style="margin-left: 10px;" >
							</form>
						
						</div>
					</div>
					<div class="col-sm-7 clearfix">
					
									
				</div>
			</div>
			<div class="review-payment">
				<h2>XEM GIỎ HÀNG</h2>
			</div>

			
		</div>
	</section> 

	<section id="cart_items" style="width: 60%;">
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


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
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
                rowId: rowId,
                quantity: quantity
            },
            success: function(response) {
                // Cập nhật lại giá sản phẩm, tổng giỏ hàng, thuế và tổng tiền
                $('.cart_total_price[data-id="' + rowId + '"]').text(response.total_price); // Cập nhật giá sản phẩm
                $('#tong_gia').text(response.cart_total); // Cập nhật tổng giỏ hàng
                $('#subtotal').text(response.cart_subtotal); // Cập nhật tổng trước thuế
                $('#tax').text(response.cart_tax); // Cập nhật tiền thuế
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
            }
        });
    }
});

 
</script>
@endsection