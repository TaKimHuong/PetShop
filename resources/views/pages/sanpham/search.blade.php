@extends('CunCon')
@section('content')
<div class="info_main">
            <h4>___________________________Kết quả tìm kiếm______________________</h4>
            <div class="info">
                @foreach($search_product as $key=> $product)
               
                <div class="info_product">
                    <img src="{{asset('public/upload/product/'.$product->product_image)}}" alt="hinhanh" />
                    <h6>{{$product->product_name}}</h6>
                    <div>
                        <i class="fas fa-star star1"></i>
                        <i class="fas fa-star star2"></i>
                        <i class="fas fa-star star3 "></i>
                        <i class="fas fa-star star4"> </i>
                        <i class="fas fa-star star5"></i>
                    </div>
                    <p>{{number_format($product->product_price)}}đ</p>
                    <div class="choose">
                        <a href="#" class="dathang">Đặt hàng</a>
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="chitiet">Chi tiết</a>
                    </div>
                
                </div>
                @endforeach
               
        

</div>
</div>

@endsection