@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm mã giảm giá 
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
                                <form role="form" action="{{URL::to('/insert-ma-giam-gia')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"name='coupon_name' placeholder="Tên mã giảm giá">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mã giảm giá</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"name='coupon_code' placeholder="Mã giảm giá">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số lượng mã </label>
                                 
                                    <input type="text" class="form-control" id="exampleInputEmail1"name='coupon_time' placeholder="Số lượng mã">
                                </div>
                              
                               
                                <div class="form-group">
                                <label for="exampleInputPassword1">Tính năng mã</label>
                            <select name="coupon_condition" class="form-control input-sm m-bot15">
                                <option value="0">---Chọn---</option>
                                <option value="1">Giảm theo phần trăm</option>
                                <option value="2">Giảm theo số tiền</option>
                            </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số % hoặc tiền giảm</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"name='coupon_number' placeholder="Tên danh mục">
                                </div>

                                <button type="submit" class="btn btn-info" name='add_category_product'>Thêm mã</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
              </div>
@endsection     