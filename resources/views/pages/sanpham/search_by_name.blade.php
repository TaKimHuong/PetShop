@extends('CunCon')
@section('content')
<style>
    /* Ngôi sao */
.starr {
    font-size: 28px;
    color: #ddd; /* Màu sao rỗng */
    margin-right: 0px;
  
    pointer-events: none; /* Không cho hover hoặc click */
}

/* Sao được đánh giá */
.starr.filled {
    color:#FFFF00; /* Màu sao đã được đánh giá */
    
}
</style>
<div class="info_main">
            <h4 style="text-align: center;">Sản phẩm</h4>
           <h6 style="text-align: right; margin-right: 20px;">Số sản phẩm: {{$count_search_product}}</h6>
            <div class="info">
                @foreach($search_product as $key=> $product)
               
                <div class="info_product">
                    <img src="{{asset('public/upload/product/'.$product->product_image)}}" alt="hinhanh" />
                    <h6 style="height: 70px;">{{$product->product_name}}</h6>
                    <div>
                       
                        <div class="stars" style="margin-left: 10px;">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="starr {{ ($product->average_rating >= $i) ? 'filled' : '' }}" onmouseover="return false;">&#9733;</span>
                        @endfor
                    </div> 
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