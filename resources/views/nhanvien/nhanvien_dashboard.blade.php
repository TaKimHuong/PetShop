@extends('nhanvien_layout')
@section('nhanvien_content')
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
					<i class="fa fa-usd"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Doanh thu cửa hàng</h4>
					
				  </div>
				  <div class="col-md-12 market-update-left">
				  <h3 style="margin-top: 20px; font-size: 23px;">{{ number_format($tongtien, 0, ',', '.') }} VNĐ</h3>
				
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Khách hàng đã mua</h4>
						
						
					</div>
					<div class="col-md-12">
					<h3 style="margin-top: 10px; text-align: center;">{{$customerCount}}</h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Nhân viên cửa hàng</h4>
						
						
					</div>
					<div class="col-md-12">
					<h3 style="margin-top: 10px; text-align: center;">{{$totalEmployees}}</h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Hóa đơn chưa duyệt</h4>
						
						
					</div>
					<div class="col-md-12">
					<h3 style="margin-top: 10px; text-align: center;">{{$donhangCD}}</h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			
            <br>
            

		<!-- //market-->
		<div class="row">
			
		</div>
		<div class="agil-info-calendar">
		<!-- //calendar -->
			<div class="clearfix"> </div>
		</div>
			
		<div class="agileits-w3layouts-stats">
					<div class="col-md-5 stats-info widget">
						<div class="stats-info-agileits">
							<div class="stats-title">
								
							</div>
							<div class="stats-body">
								<table class="table stats-table ">
								<h4 class="title">ĐƠN ĐÃ DUYỆT GẦN NHẤT</h4>
								<thead>
									<tr>
										<th>KHÁCH HÀNG</th>
										<th>TỔNG TIỀN</th>
										<th>NGÀY DUYỆT</th>
										<th>CHI TIẾT</th>
									</tr>
								</thead>
								<tbody>
								@foreach($recent_orders as $index => $product)
								<tr>
								<td>{{ $product->customer_name }}</td>
								<td>{{ number_format($product->tong_tien, 0, ',', '.') }}</td>
								<td>{{ $product->ngay_duyet }}</td>
								<td> <a href="{{URL::to('/staff-edit-order/'.$product->dathang_id)}}" class="active styling-edit" ui-toggle-class="">
								<i class="fa fa-pencil-square-o text-success text-active"></i></a></td>
									
								</tr>
								@endforeach
								</tbody>
							</table>
							</div>
						</div>
					</div>
					<div class="col-md-7 stats-info stats-last widget-shadow">
						<div class="stats-last-agile">
							<table class="table stats-table ">
							<h4 class="title">SẢN PHẨM BÁN CHẠY NHẤT</h4>
								<thead>
									<tr>
										<th>STT</th>
										<th>HÌNH ẢNH</th>
										<th>TÊN SẢN PHẨM</th>
										<th>SỐ LƯỢNG ĐÃ BÁN</th>
									</tr>
								</thead>
								<tbody>
								@foreach($product_sales as $index => $product)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>
										<img src="{{asset('public/upload/product/'.$product->product_image) }}" alt="{{ $product->product_name }}" style="width: 50px; height: 50px;">
									</td>
									<td>{{ $product->product_name }}</td>
									<td>{{ $product->total_sold }}</td>
								</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div class="clearfix"> </div>



@endsection