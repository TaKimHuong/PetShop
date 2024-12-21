@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     QUẢN LÝ TÀI KHOẢN
    </div>
    <div class="row w3-res-tb">
    
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
            <th style="width:20px;">
              STT
            </th>
            <th>Tên người đăng ký</th>
            <th>Gmail</th>
            <th>Số điện thoại</th>
            <th>Tên đăng nhập</th>
            <th>Quyền hạn</th>
          
            <th>Xem/Sửa/Xóa</th>
          
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          
        @foreach($all_account as $key => $account)
                    <tr>
                        <td>{{ ($all_account->currentPage() - 1) * $all_account->perPage() + $loop->iteration }}</td>
                        <td>{{ $account->customer_name }}</td>
                        <td>{{ $account->customer_email }}</td>
                        <td>{{ $account->customer_phone }}</td>
                        <td>{{ $account->customer_name_login }}</td>
                        <td>{{ $account->chi_tiet_ten_quyen }}</td>
                        <td>
                        <!-- Nút sửa -->
                        <a href="{{URL::to('/view-account/'.$account->customer_id)}}" class="btn btn-success btn-sm" style="margin-right: 5px;">
                            Xem
                        </a>
                        <a href="{{URL::to('/edit-account/'.$account->customer_id)}}" class="btn btn-primary btn-sm" style="margin-right: 5px;">
                            Sửa
                        </a>
                        <!-- Nút xóa -->
                        <a onclick="return confirm('Bạn có chắc là muốn xóa Tài Khoản này không?')" 
                        href="{{URL::to('/delete-account/'.$account->customer_id)}}" 
                        class="btn btn-danger btn-sm">
                            Xóa
                        </a>
                    </td>
                    </tr>
                @endforeach
          
          
        </tbody>
      </table>
    
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">5 sản phẩm cho mỗi trang</small>
        </div>
        <!-- <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div> -->
        <div class="col-sm-7 text-right text-center-xs">                
    <ul class="pagination pagination-sm m-t-none m-b-none">
        <!-- Nút Previous -->
        <li class="{{ $all_account->onFirstPage() ? 'disabled' : '' }}">
            <a href="{{ $all_account->previousPageUrl() }}">
                <i class="fa fa-chevron-left"></i>
            </a>
        </li>
        
        <!-- Số trang -->
        @for ($i = 1; $i <= $all_account->lastPage(); $i++)
            <li class="{{ $all_account->currentPage() == $i ? 'active' : '' }}">
                <a href="{{ $all_account->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <!-- Nút Next -->
        <li class="{{ $all_account->hasMorePages() ? '' : 'disabled' }}">
            <a href="{{ $all_account->nextPageUrl() }}">
                <i class="fa fa-chevron-right"></i>
            </a>
        </li>
    </ul>
</div>

      </div>
    </footer>
  </div>

@endsection     