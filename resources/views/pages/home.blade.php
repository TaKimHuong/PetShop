@extends('welcome')
@section('dog')

        <div>
            <h4>đang bán</h4>
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