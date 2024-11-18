@extends('welcome')
@section('dog')
<div>

<!-- @foreach($product_sales as $sale)
    <div class="product-item">

        <p>Sản phẩm: {{ $sale->product_name }}</p>
        <p>Tổng số lượng đã bán: {{ $sale->total_sold }}</p>
    </div>
@endforeach -->


            <h4>Nổi bật </h4>
        </div>
        <div class="list-dog">
        @foreach($feature_product as $key=> $prd)
            <div class="info-dog">
                <img src="{{asset('public/upload/product/'.$prd->product_image)}}" alt="AKITA INU" />
                <h6>{{$prd->product_name}}</h6>
                <div>
                    <div class="col40">
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$prd->product_id)}}">Xem chi tiết</a>
                    </div>
                    <div class="col60">
                        <i class="fas fa-star star1"></i>
                        <i class="fas fa-star star2"></i>
                        <i class="fas fa-star star3 "></i>
                        <i class="fas fa-star star4"> </i>
                        <i class="fas fa-star star5"></i>
                    </div>
                </div>
            </div>
           @endforeach
        </div>


        <!-- Bán chạy nhất  -->

        <div>
            <h4>Bán chạy nhất</h4>
        </div>
        <div class="list-dog">
        @foreach($product_sales as $key=> $prdd)
            <div class="info-dog">
                <img src="{{asset('public/upload/product/'.$prdd->product_image)}}" alt="AKITA INU" />
                <h6>{{$prdd->product_name}}</h6>
                <div>
                    <div class="col40">
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$prdd->product_id)}}">Xem chi tiết</a>
                    </div>
                    <div class="col60">
                        <i class="fas fa-star star1"></i>
                        <i class="fas fa-star star2"></i>
                        <i class="fas fa-star star3 "></i>
                        <i class="fas fa-star star4"> </i>
                        <i class="fas fa-star star5"></i>
                    </div>
                </div>
            </div>
           @endforeach
           
           
        </div>
        <div>
            <h4>Mới nhất</h4>
        </div>
        <div class="list-dog">
        @foreach($latest_products as $key=> $prdd)
            <div class="info-dog">
                <img src="{{asset('public/upload/product/'.$prdd->product_image)}}" alt="AKITA INU" />
                <h6>{{$prdd->product_name}}</h6>
                <div>
                    <div class="col40">
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$prdd->product_id)}}">Xem chi tiết</a>
                    </div>
                    <div class="col60">
                        <i class="fas fa-star star1"></i>
                        <i class="fas fa-star star2"></i>
                        <i class="fas fa-star star3 "></i>
                        <i class="fas fa-star star4"> </i>
                        <i class="fas fa-star star5"></i>
                    </div>
                </div>
            </div>
           @endforeach
           
           
        </div>
        <div>
            <h4>Đang bán</h4>
        </div>
        <div class="list-dog">
        @foreach($all_product as $key=> $prd)
            <div class="info-dog">
                <img src="{{asset('public/upload/product/'.$prd->product_image)}}" alt="AKITA INU" />
                <h6>{{$prd->product_name}}</h6>
                <div>
                    <div class="col40">
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$prd->product_id)}}">Xem chi tiết</a>
                    </div>
                    <div class="col60">
                        <i class="fas fa-star star1"></i>
                        <i class="fas fa-star star2"></i>
                        <i class="fas fa-star star3 "></i>
                        <i class="fas fa-star star4"> </i>
                        <i class="fas fa-star star5"></i>
                    </div>
                </div>
            </div>
           @endforeach
           
           
        </div>

        
        
@endsection