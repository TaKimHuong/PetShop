@extends('CunCon')
@section('content')
<style>
	   .shopper-infoo {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* max-width: 600px; */
            width: 100%;
			
        }

        .shopper-infoo p {
            font-size: 24px;
            font-weight: bold;
            color: #333333;
            margin-bottom: 20px;
            text-align: center;
        }

		.shopper-infoo .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

		.shopper-infoo .col-sm-6 {
          
			width: 100%;
            min-width: 250px; /* Đảm bảo cột không quá nhỏ trên màn hình nhỏ */
        }

		.shopper-infoo .form-group label {
            font-weight: bold;
            color: #555555;
            display: block;
            margin-bottom: 5px;
			margin-left: 10px;
        }

		.shopper-infoo .form-group input , .shopper-infoo .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            background-color: #f9f9f9;
            color: #333333;
        }

		.shopper-infoo .form-group input[readonly] {
            background-color: #e9ecef;
            color: #495057;
        }
		.shopper-infoo .form-group input:focus, .shopper-infoo .form-group textarea:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Hiệu ứng bóng xanh khi nhấn vào */
            border-color: #80bdff; /* Thay đổi màu viền để phù hợp với hiệu ứng bóng */
        }
</style>
<section id="cart_items">
		<div>

	<?php

use Illuminate\Support\Facades\Session;

	// echo Session::get('customer_id');
	// echo Session::get('hoadon_id');
	?>
			<div class="register-req">
				<p style="font-weight: bold;">Thanh toán giỏ hàng!!</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-10">
						<div class="shopper-infoo">
									
					<p>THÔNG TIN HÓA ĐƠN</p>
					<div class="row">
						<div class="col-sm-6 form-group">
							<label>Tên người nhận:</label>
							<input type="text" readonly value="{{ $hoadon->hoadon_name }}">
						</div>
						<div class="col-sm-6 form-group">
							<label>Số điện thoại:</label>
							<input type="text" readonly value="{{ $hoadon->hoadon_phone }}">
						</div>
						<div class="col-sm-6 form-group">
							<label>Địa chỉ:</label>
							<input type="text" readonly value="{{ $hoadon->hoadon_address }}">
						</div>
						<div class="col-sm-6 form-group">
							<label>Email:</label>
							<input type="text" readonly value="{{ $hoadon->hoadon_email }}">
						</div>
						<div class="col-sm-6 form-group">
							<label>Ghi chú:</label>
							<textarea readonly rows="6">{{ $hoadon->hoadon_note }}</textarea>
						</div>
					</div>
			
							
						
						
					
						
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
						<h4><a href="" style="text-align: left; width: 200px;">{{$v_sanpham->name}}</a></h4>
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

			

						
					</body>
				</table>
				<!-- Tổng giỏ hàng -->
				<p style="font-size: 18px; font-weight: bold; text-align: right; margin-right: 15px;">Tổng tiền : {{ Cart::subtotal() }} đ</p>
			</div>
			
		</div>

		<form action="{{URL::to('noi-dat-hang')}}" method="POST">
			{{csrf_field()}}
		    <div class="payment-options">

			<span>Chọn hình thức thanh toán</span> <br>
					<span>

					<label><input value="1" type="radio"  name="payment_option">Sử dụng thẻ ngân hàng</label>
					<label><input value="2" type="radio" checked name="payment_option">Sử dụng tiền mặt</label>
					<input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
					</span>
			</div>
			</form>

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