@extends('nhanvien_layout')
@section('nhanvien_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
    THÔNG TIN KHÁCH HÀNG
    </div>
   
    <div class="table-responsive">
    <?php
        use Illuminate\Support\Facades\Session;
            $message = Session::get('message');
            if ($message) {
                echo $message;
                Session::put('message', null);
            }
            
            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
          
            <th>Tên khách hàng</th>
           
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
         
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
     
          <tr>
            <td>{{$order_info->customer_name}}</td>
            <td>{{$order_info->customer_email}}</td>
            <td>{{$order_info->customer_phone}}</td>
          </tr>
          
     
          
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<br> 
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
    THÔNG TIN VẬN CHUYỂN
    </div>
   
    <div class="table-responsive">
    <?php
       
            $message = Session::get('message');
            if ($message) {
                echo $message;
                Session::put('message', null);
            }
            
            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
          
            <th>Tên người nhận đơn hàng</th>
           
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
         
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
     
          <tr>
          <td>{{$order_info->hoadon_name}}</td>
            <td>{{$order_info->hoadon_address}}</td>
            <td>{{$order_info->hoadon_phone}}</td>
          </tr>
          
     
          
          
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     XEM CHI TIẾT ĐƠN HÀNG
    </div>
   
    <div class="table-responsive">
    <?php
     
            $message = Session::get('message');
            if ($message) {
                echo $message;
                Session::put('message', null);
            }
            
            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
          
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá tiền</th>
            <th>Tổng tiền</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          
            
            
           
        @foreach($order_details as $key=>$order_bid)
          <tr>
           
            <td>{{$order_bid->product_name}}</td>
            <td>{{$order_bid->so_luong_san_pham}}</td>
            <td>{{$order_bid->product_price}}</td>
            <td>{{$order_bid->so_luong_san_pham*$order_bid->product_price}}</td>
         
           
           
          @endforeach
     
          
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
@endsection     