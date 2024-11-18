@extends('nhanvien_layout')
@section('nhanvien_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     DANH SÁCH CÁC MÃ GIẢM GIÁ
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
            <th style="width:20px;">
              STT
            </th>
            <th>Tên mã giảm giá</th>
            <th>Mã giảm giá</th>
            <th>Số lượng mã giảm giá</th>
            <th>Điều kiện giảm giá</th>
           
            <th>Số giảm</th>
          
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          
             @foreach($danhsach as $key=>$cou)
            
           
           
          <tr>
            <td>{{ ($danhsach->currentPage() - 1) * $danhsach->perPage() + $loop->iteration }}</td>
            <td>{{$cou->coupon_name}}</td>
            <td>{{$cou->coupon_code}}</td>
            <td>{{$cou->coupon_time}}</td>
           
            <td><span class="text-ellipsis">
                <?php
                if ($cou->coupon_condition==1) {
                  ?>
                 Giảm theo phần trăm
               <?php
                } else {
                  ?>
                  Giảm theo tiền
                <?php
                } 
                ?>
               
            </span></td>
            <td><span class="text-ellipsis">
                <?php
                if ($cou->coupon_condition==1) {
                  ?>
                 Giảm {{$cou->coupon_number}} %
               <?php
                } else {
                  ?>
                  Giảm {{$cou->coupon_number}}k
                <?php
                } 
                ?>
               
            </span></td>
           
           
           
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
      
    <div class="col-sm-7 text-right text-center-xs">                
    <ul class="pagination pagination-sm m-t-none m-b-none">
        <!-- Nút Previous -->
        <li class="{{ $danhsach->onFirstPage() ? 'disabled' : '' }}">
            <a href="{{ $danhsach->previousPageUrl() }}">
                <i class="fa fa-chevron-left"></i>
            </a>
        </li>
        
        <!-- Số trang -->
        @for ($i = 1; $i <= $danhsach->lastPage(); $i++)
            <li class="{{ $danhsach->currentPage() == $i ? 'active' : '' }}">
                <a href="{{ $danhsach->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <!-- Nút Next -->
        <li class="{{ $danhsach->hasMorePages() ? '' : 'disabled' }}">
            <a href="{{ $danhsach->nextPageUrl() }}">
                <i class="fa fa-chevron-right"></i>
            </a>
        </li>
    </ul>
</div>
</div>
    </footer>
  </div>

@endsection     