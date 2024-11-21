
@extends('CunCon')
@section('content')


<style>
	#star-rating {
    font-size: 30px;
    color: #ccc; /* Màu của sao không chọn */
}

#star-rating .star:hover,
#star-rating .star.selected {
    color: gold; /* Màu của sao khi hover hoặc khi đã chọn */
}

#star-rating {
    display: flex; /* Sử dụng flexbox để hiển thị các sao theo hàng ngang */
    justify-content: flex-start; /* Đảm bảo các sao căn lề trái */
    gap: 5px; /* Khoảng cách giữa các sao */
}

#star-rating .star {
    font-size: 30px; /* Kích thước sao */
    cursor: pointer; /* Hiển thị con trỏ chuột khi hover */
    color: #ccc; /* Màu sao chưa chọn */
}

#star-rating .star:hover,
#star-rating .star.selected {
    color: gold; /* Màu vàng cho sao được hover hoặc đã chọn */
}

/* danh gia sao  */
.danhgia .stars {
    font-size: 20px;
    color: #ddd; /* Màu cho các sao chưa đầy */
	cursor: default; 

}

.danhgia .star.filled {
    color: #ffcc00; /* Màu vàng cho sao đã được đánh giá */
}

.danhgia p {
    font-size: 18px;
    margin: 10px 0;
    color: #333;
}


</style>
    <div class="padding-right" > 
	@foreach($product_details as $key => $value)
    <div class="product-details" >
        <!-- product-details -->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{asset('public/upload/product/'.$value->product_image)}}" alt="" />
             
            </div>
            <!-- <div id="similar-product" class="carousel slide" data-ride="carousel">
            
                <div class="carousel-inner">
                    <div class="item active">
                        <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                        <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                        <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                    </div>
                </div>
              
                <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div> -->
        </div>
        <div class="col-sm-7">
            <div class="product-information">
                <!-- product-information -->
                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                <h2>{{$value->product_name}}</h2>
                <p>ID SẢN PHẨM: {{$value->product_id}}</p>
                <img src="images/product-details/rating.png" alt="" />
				<form action="{{URL::to('/save-cart')}}" method="post">
					{{csrf_field()}}
                <span>
                    <span>GIÁ: {{number_format($value->product_price).' VNĐ'}} </span> <br>
                    <label>Số lượng:</label>
                    <input name="qty" type="number" min=1 value="1" />
					<input name="productid_hidden" type="hidden" min=1 value="{{$value->product_id}}" />
                    <button style="margin-left: 15px; margin-top: 3px;" type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                          Thêm vào giỏ hàng
                    </button>
                </span>
				</form>
                <p><b>Tình trạng:</b> Còn hàng</p>
				<p><b>Đã bán:</b> Còn hàng</p>
                <!-- <p><b>Condition:</b> New</p> -->
                <p><b>Danh mục:</b> {{$value->category_name}}</p>
                <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
            </div>
            <!-- product-information -->
        </div>
    </div>


					<div class="category-tab shop-details-tab" style="padding-right: 90px;"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Chi tiết</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Mô tả</a></li>
								<!-- <li><a href="#tag" data-toggle="tab">Tag</a></li> -->
								<li ><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								
							<p style="text-align: justify;">{!! $value->product_content !!}</p>
								
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<p>{!! $value->product_desc !!}</p>
							</div>
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									
																		<!-- vd -->
										<form action="{{URL::to('/ratings')}}" method="POST">
										@csrf
										<input type="hidden" name="product_id" value="{{$value->product_id}}">

										<div>
											<label for="rating">Đánh giá:</label>
											<div id="star-rating">
												<span class="star" data-value="1">&#9733;</span>
												<span class="star" data-value="2">&#9733;</span>
												<span class="star" data-value="3">&#9733;</span>
												<span class="star" data-value="4">&#9733;</span>
												<span class="star" data-value="5">&#9733;</span>
											</div>
											<input type="hidden" name="rating" id="rating" required>
										</div>

										<div>
											<label for="comment">Bình luận:</label>
											<textarea name="comment" id="comment" rows="4"></textarea>
										</div>

										<button type="submit">Gửi đánh giá</button>
									</form>


									<p class="danhgia">Đánh giá trung bình: 
								<span class="stars">
								<span class="stars" style="	pointer-events: none; ">
							@for ($i = 1; $i <= 5; $i++)
								<span class="star {{ ($formattedRating >= $i || ($formattedRating >= 2.5 && $i <= 3)) ? 'filled' : '' }}">&#9733;</span>
							@endfor
						</span>
						({{ $formattedRating }} / 5)
								</span>
								
							</p>

							<!-- Hiển thị số lượng đánh giá -->
							<p>{{ $totalReviews }} đánh giá</p>

							<!-- Hiển thị thông báo thành công -->
							@if(session('success'))
								<div class="alert alert-success">
									{{ session('success') }}
								</div>
							@endif

							@foreach($comments as $comment)
								<div class="comment">
									<p><strong>Người dùng: </strong> {{ $comment->customer_id }}</p>
									<p>{{ $comment->rating_comment }}</p>
								</div>
							@endforeach
																<!-- vd -->


    
									
									<div id="fb-root"></div> 
									

								 <!-- <div class="fb-comments" data-href="https://65b3-2001-ee0-4b52-7950-2762-fc92-42a-9bd4.ngrok-free.app/unitopppp/training/hoclaravel/chi-tiet-san-pham/1" data-width="100%" data-numposts="5"></div> -->

								
								 <div class="fb-comments"  data-href="https://65b3-2001-ee0-4b52-7950-2762-fc92-42a-9bd4.ngrok-free.app/{{ route('product_details', ['product_id' => $value->product_id]) }}"  data-width="100%" data-numposts="50"></div>

								
								</div>




							</div>
						
						</div>
					</div><!--/category-tab-->
					@endforeach






								



					<div class="recommended_items" style="padding-right: 50px;"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<!-- Nhóm đầu tiên của các sản phẩm liên quan -->
							<div class="item active">
								@foreach($relate as $key => $rlt)
									@if ($key % 3 == 0 && $key != 0)
										</div><div class="item"> <!-- Mỗi 3 sản phẩm tạo một nhóm mới -->
									@endif
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('public/upload/product/'.$rlt->product_image) }}" alt="" />
													<h2 style="font-size: 15px;">GIÁ: {{ number_format($rlt->product_price).' VNĐ' }}</h2>
													<p>{{ $rlt->product_name }}</p>
													<button type="button" class="btn btn-default add-to-cart">
														<i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng
													</button>
												</div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>

							
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
				


	

				<script>
					document.querySelectorAll('.star').forEach(star => {
    star.addEventListener('mouseover', function() {
        const ratingValue = this.getAttribute('data-value');
        document.querySelectorAll('.star').forEach(star => {
            if (star.getAttribute('data-value') <= ratingValue) {
                star.style.color = 'gold'; // Màu vàng cho các sao trước sao được hover
            } else {
                star.style.color = '#ccc'; // Màu xám cho các sao sau sao được hover
            }
        });
    });

    star.addEventListener('mouseout', function() {
        document.querySelectorAll('.star').forEach(star => {
            if (!star.classList.contains('selected')) {
                star.style.color = '#ccc'; // Reset lại màu các sao chưa được chọn
            }
        });
    });

    star.addEventListener('click', function() {
        const ratingValue = this.getAttribute('data-value');
        document.getElementById('rating').value = ratingValue; // Lưu giá trị sao vào input hidden

        document.querySelectorAll('.star').forEach(star => {
            if (star.getAttribute('data-value') <= ratingValue) {
                star.classList.add('selected'); // Đánh dấu sao đã chọn
                star.style.color = 'gold'; // Màu vàng cho sao đã chọn
            } else {
                star.classList.remove('selected'); // Loại bỏ dấu sao đã chọn
                star.style.color = '#ccc'; // Màu xám cho các sao chưa chọn
            }
        });
    });
});

				</script>

@endsection