@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                          XEM THÔNG TIN TÀI KHOẢN
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
                                <form role="form" action="" method="post">
                                 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên người đăng ký</label>
                                        <input type="text" value="{{$view_account->customer_name}}" class="form-control" id="exampleInputEmail1" name="category_product_name" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gmail</label>
                                        <input type="text" value="{{$view_account->customer_email}}" class="form-control" id="exampleInputEmail1" name="category_product_name" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số điện thoại</label>
                                        <input type="text" value="{{$view_account->customer_phone}}" class="form-control" id="exampleInputEmail1" name="category_product_name" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên đăng nhập</label>
                                        <input type="text" value="{{$view_account->customer_name_login}}" class="form-control" id="exampleInputEmail1" name="category_product_name" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mật khẩu</label>
                                        <input type="password" value="{{$view_account->customer_password}}" class="form-control" id="exampleInputEmail1" name="category_product_name" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Quyền hạn</label>
                                        <input type="text" value="{{$view_account->chi_tiet_ten_quyen}}" class="form-control" id="exampleInputEmail1" name="category_product_name" readonly>
                                    </div>
                                  
                                   
                                </form>
                            </div>
                        </div>

                        
                        
                    </section>

            </div>
              </div>
@endsection     