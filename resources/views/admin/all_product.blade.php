@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      LIỆT KÊ SẢN PHẨM
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
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Hình sản phẩm</th>
            <th>Danh mục sản phẩm</th>
         
            <th>Hiển thị</th>
            <th>Sửa/Xóa</th>
          
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          
             @foreach($all_product as $key=>$pro)

          <tr>
            <td>{{ ($all_product->currentPage() - 1) * $all_product->perPage() + $loop->iteration }}</td>
            <td>{{$pro->product_name}}</td>
            <td>{{$pro->product_price}}</td>
            <td><img src="{{asset('public/upload/product/'.$pro->product_image) }}" height="100" width="100"></td>
 
            <td>{{$pro->category_name}}</td>
        
            <td><span class="text-ellipsis">
                <?php
                if ($pro->product_status==0) {
                  ?>
                 <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"> <span class="fa-thumb-styling fa fa-eye" style="font-size:20px; color: green"></span> </a>
               <?php
                } else {
                  ?>
                  <a href="{{URL::to('/active-product/'.$pro->product_id)}}"> <span class="fa-thumb-styling fa fa-eye-slash" style= "font-size:20px; color: green"></span> </a>
                <?php
                } 
                ?>
               
            </span></td>
           
            <!-- <td>
              <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này không?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i> </a>
            </td> -->
            <td>
    <!-- Nút sửa -->
    <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="btn btn-success btn-sm" style="margin-right: 5px;">
        Sửa
    </a>
    <!-- Nút xóa -->
    <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này không?')" 
       href="{{URL::to('/delete-product/'.$pro->product_id)}}" 
       class="btn btn-danger btn-sm">
        Xóa
    </a>
</td>
          </tr>
          
       @endforeach
          
          
        </tbody>
      </table>
      <!-- <div class="pagination">
                    {{ $all_product->links() }}
                </div> -->
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
        <li class="{{ $all_product->onFirstPage() ? 'disabled' : '' }}">
            <a href="{{ $all_product->previousPageUrl() }}">
                <i class="fa fa-chevron-left"></i>
            </a>
        </li>
        
        <!-- Số trang -->
        @for ($i = 1; $i <= $all_product->lastPage(); $i++)
            <li class="{{ $all_product->currentPage() == $i ? 'active' : '' }}">
                <a href="{{ $all_product->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <!-- Nút Next -->
        <li class="{{ $all_product->hasMorePages() ? '' : 'disabled' }}">
            <a href="{{ $all_product->nextPageUrl() }}">
                <i class="fa fa-chevron-right"></i>
            </a>
        </li>
    </ul>
</div>

      </div>
    </footer>
  </div>

@endsection     