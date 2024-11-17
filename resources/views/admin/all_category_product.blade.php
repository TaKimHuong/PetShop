@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      LIỆT KÊ DANH MỤC SẢN PHẨM
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
            <th>Tên danh mục</th>
            <th >Hiển thị</th>
          
            <th style="width: 20%;">Sửa/Xóa</th>
          </tr>
        </thead>
        <tbody>
          
             @foreach($all_category_product as $key=>$cate_pro)
            
           
           
          <tr>
            <td>{{ ($all_category_product->currentPage() - 1) * $all_category_product->perPage() + $loop->iteration }}</td>
            <td>{{$cate_pro->category_name}}</td>
            <td><span class="text-ellipsis">
                <?php
                if ($cate_pro->category_status==0) {
                  ?>
                 <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"> <span class="fa-thumb-styling fa fa-eye" style="font-size:20px; color: green"></span> </a>
               <?php
                } else {
                  ?>
                  <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"> <span class="fa-thumb-styling fa fa-eye-slash" style= "font-size:20px; color: green"></span> </a>
                <?php
                } 
                ?>
               
            </span></td>
           
            <!-- <td>
              <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không?')" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i> </a>
            </td> -->

            <td>
    <div class="d-flex align-items-center">
        <!-- Nút sửa -->
        <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" 
           class="btn btn-success btn-sm me-2">
            Sửa
        </a>
        <!-- Nút xóa -->
        <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không?')" 
           href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" 
           class="btn btn-danger btn-sm">
            Xóa
        </a>
    </div>
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
      
    <div class="col-sm-7 text-right text-center-xs">                
    <ul class="pagination pagination-sm m-t-none m-b-none">
        <!-- Nút Previous -->
        <li class="{{ $all_category_product->onFirstPage() ? 'disabled' : '' }}">
            <a href="{{ $all_category_product->previousPageUrl() }}">
                <i class="fa fa-chevron-left"></i>
            </a>
        </li>
        
        <!-- Số trang -->
        @for ($i = 1; $i <= $all_category_product->lastPage(); $i++)
            <li class="{{ $all_category_product->currentPage() == $i ? 'active' : '' }}">
                <a href="{{ $all_category_product->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <!-- Nút Next -->
        <li class="{{ $all_category_product->hasMorePages() ? '' : 'disabled' }}">
            <a href="{{ $all_category_product->nextPageUrl() }}">
                <i class="fa fa-chevron-right"></i>
            </a>
        </li>
    </ul>
</div>
</div>
    </footer>
  </div>

@endsection     