
@extends('CunCon')
@section('content')
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
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input style="width: 300px;" type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>


    
									<!-- Facebook Comments Plugin -->
									 <div class="fb-comments" 
										data-href="https://www.example.com/current-page" 
										data-width="100%" 
										data-numposts="5">
									</div>
									<div id="fb-root"></div> 
									

									 <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="50"></div> 

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
@endsection