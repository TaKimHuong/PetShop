@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật thương hiệu sản phẩm
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
                            @foreach ($edit_brand_product as $key=> $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$edit_value->brand_name}}" class="form-control" id="exampleInputEmail1"name='brand_product_name' placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea rows="8" style="resize: none " class="form-control" name= 'brand_product_desc' id="exampleInputPassword1">{{$edit_value->brand_desc}}</textarea>
                                </div>
                               
                                <button type="submit" class="btn btn-info" name='update_brand_product'>Cập nhật danh mục</button>
                            </form>
                            </div>
                        @endforeach
                        </div>
                    </section>

            </div>
              </div>
@endsection     