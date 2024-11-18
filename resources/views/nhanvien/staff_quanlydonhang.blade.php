@extends('nhanvien_layout')
@section('nhanvien_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      LIỆT KÊ ĐƠN HÀNG
    </div>
    <div class="row w3-res-tb">
      <!-- <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div> -->
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
              <div style="display: flex; gap: 15px; margin-bottom: 20px;">
          <a href="{{ URL::to('/staff-chua-duyet') }}" 
              style="
                  padding: 10px 20px; 
                  font-size: 16px; 
                  background-color: #f44336; 
                  color: white; 
                  text-decoration: none; 
                  border-radius: 5px; 
                  transition: all 0.3s ease;">
             Chưa duyệt
          </a>
          <a href="{{ URL::to('/staff-da-duyet') }}" 
              style="
                  padding: 10px 20px; 
                  font-size: 16px; 
                  background-color: #4CAF50; 
                  color: white; 
                  text-decoration: none; 
                  border-radius: 5px; 
                  transition: all 0.3s ease;">
              Đã duyệt
          </a>
      </div>

        </tr>
          <tr>
            <!-- <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th> -->
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>Tổng tiền</th>
            <th>Tình trạng</th>
            <th>Duyệt đơn hàng</th>
            <th>Ngày đặt hàng</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          
             @foreach($all_order as $key=>$order)
            
           
           
          <tr>
            <!-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> -->
             <td>{{$loop->iteration}}</td>
            <td>{{$order->customer_name}}</td>
            <td>{{$order->tong_tien}}</td>
            <td>{{$order->dathang_status}}</td>
            <td>
            <!-- @if ($order->dathang_status === 'Đang chờ xử lý')
                <form action="{{URL::to('/duyet-hoa-don/'.$order->dathang_id)}}" method="POST">
                    @csrf
                    <button type="submit">Duyệt đơn hàng</button>
                </form>
                <form action="{{URL::to('/huy-hoa-don/'.$order->dathang_id)}}" method="POST" style="margin-top: 5px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="color: red;">Hủy</button>
                </form>
                @else
                <span>Không thể thao tác</span>
                @endif -->
                @if ($order->dathang_status === 'Đang chờ xử lý')
    <div style="display: flex; gap: 10px; align-items: center;">
        <form action="{{URL::to('/staff-duyet-hoa-don/'.$order->dathang_id)}}" method="POST">
            @csrf
            <button type="submit" 
                style="
                    padding: 10px 15px; 
                    font-size: 14px; 
                    background-color: #4CAF50; 
                    color: white; 
                    border: none; 
                    border-radius: 5px; 
                    cursor: pointer; 
                    transition: all 0.3s ease;">
                Duyệt
            </button>
        </form>
     
    </div>
@else
    <span>Đã duyệt đơn hàng</span>
@endif


            </td>
            <td>{{$order->ngay_dat}}</td>
         
           
            <td>
              <a href="{{URL::to('/staff-edit-order/'.$order->dathang_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
               
            </td>
          </tr>
          
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