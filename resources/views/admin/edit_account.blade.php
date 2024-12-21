@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                          CHỈNH SỬA THÔNG TIN TÀI KHOẢN
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
                                <form role="form" action="{{URL::to('/update-taikhoan/'.$customer->customer_id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên người đăng ký</label>
                                        <input type="text" value="{{$customer->customer_name}}" class="form-control" id="exampleInputEmail1" name="customer_name" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gmail</label>
                                        <input type="text" value="{{$customer->customer_email}}" class="form-control" id="exampleInputEmail1" name="customer_email" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số điện thoại</label>
                                        <input type="text" value="{{$customer->customer_phone}}" class="form-control" id="exampleInputEmail1" name="customer_phone" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên đăng nhập</label>
                                        <input type="text" value="{{$customer->customer_name_login}}" class="form-control" id="exampleInputEmail1" name="customer_name_login" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mật khẩu</label>
                                        <input type="password" value="{{$customer->customer_password}}" class="form-control" id="exampleInputEmail1" name="customer_password" readonly>
                                    </div>
                                   
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Quyền hạn</label>
                                        <select name="customer_quyen" class="form-control input-sm m-bot15">
                                            
                                        @foreach($phan_quyen as $key=>$cate)
                                        @if($cate->ma_quyen == $customer->ma_quyen)
                                            <option selected value="{{$cate->ma_quyen}}">{{$cate->chi_tiet_ten_quyen}}</option>
                                        @else 
                                        <option value="{{$cate->ma_quyen}}">{{$cate->chi_tiet_ten_quyen}}</option>
                                        @endif
                                            @endforeach
                                        </select>
                                        </div>
                                        <button type="submit" class="btn btn-info" name='add_account'>Cập nhật tài khoản</button>
                                </form>
                            </div>
                        </div>

                        
                        
                    </section>

            </div>
              </div>
@endsection     