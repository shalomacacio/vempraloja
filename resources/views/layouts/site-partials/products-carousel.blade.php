<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">

                <div class="section-title">

                    <div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
                                <img src="{{ asset('vendor/site/img/magalu.png')}}" alt="">  

							</div>
						</div>
					</div>
                    
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                            <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                            <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                            <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                            @foreach ($links as $link)
                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ $link->img }}" alt="">
                                        <div class="product-label">
                                           @isset($link->disc)
                                           <span class="sale">{{ $link->disc }}</span>
                                           @endisset 
                                           @isset($link->span)
                                           <span class="new">{{ $link->span }}</span>
                                           @endisset
                                            
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $link->category->name }}</p>
                                        <h3 class="product-name"><a href="{{ $link->link }}">{{ $link->name }}</a></h3>
                                        <h4 class="product-price">R$ {{ $link->price }}<del class="product-old-price">R$ {{ $link->price_old }}</del></h4>
                                        <div class="product-rating">
                                            @for($i = 0; $i < $link->stars; $i++ )
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </div>
                                        {{-- <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">meus favoritos</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div> --}}
                                    </div>
                                    <div class="add-to-cart">
                                    <a href="{{ $link->link }}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> vem pra loja </button></a>
                                    </div>
                                </div>
                                <!-- /product -->
                            @endforeach
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->