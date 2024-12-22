@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm sản phẩm
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
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"name='product_name' placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"name='product_price' placeholder="Giá sản phẩm">
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1"name='product_image'>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea rows=9 style="resize: none " class="form-control" name= 'product_desc' id="ckeditor1" placeholder="Mô tả sản phẩm"> </textarea>
                                </div>

                                <script>
                                    CKEDITOR.replace('ckeditor1');
                                </script>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea rows=9 style="resize: none " class="form-control" name= 'product_content' id="ckeditor2" placeholder="Nội dung sản phẩm"> </textarea>
                                </div>
                                <script>
                                    CKEDITOR.replace('ckeditor2');
                                </script>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                               
                            @foreach($cate_product as $key=>$cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
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

                                <button type="submit" class="btn btn-info" name='add_product'>Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
              </div>
@endsection     