@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                          Cập nhật sản phẩm
                        </header>
                    <?php
                    use Illuminate\Support\Facades\Session;
                        $message = Session::get('message');
                        if ($message) {
                            echo $message;
                            Session::put('message', null);
                        }
                        
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                @foreach($edit_product as $key => $pro)
                                <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"name='product_name' value="{{$pro->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"name='product_price' value="{{$pro->product_price}}">
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1"name='product_image'>
                                    <img src="{{asset('public/upload/product/'.$pro->product_image) }}" height="100" width="100" style="margin-top: 10px;" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea rows=9 style="resize: none " class="form-control" name= 'product_desc' id="ckeditor4">{{$pro->product_desc}} </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea rows=9 style="resize: none " class="form-control" name= 'product_content' id="ckeditor3" >{{$pro->product_content}}  </textarea>
                                </div>
                                <script>
                                    CKEDITOR.replace('ckeditor3');
                                    CKEDITOR.replace('ckeditor4');
                                </script>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                
                            @foreach($cate_product as $key=>$cate)
                            @if($cate->category_id == $pro->category_id)
                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                            @else 
                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                            @endif
                                @endforeach
                            </select>
                                </div>
                             
                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Hiển thị</option>
                                <option value="1">Ẩn</option>
                            </select>
                                </div>

                                <button type="submit" class="btn btn-info" name='add_product'>Cập nhật sản phẩm</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
              </div>
@endsection     