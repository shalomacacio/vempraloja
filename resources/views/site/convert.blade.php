@extends('layouts.site')

@section('content')
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">BUSCAR OFERTA</h3>
                            </div>
                        <form action="{{ route('site.getOffer') }}" method="GET">
                            @csrf
							<div class="form-group">
                                <select class="input" name="storeId">
                                    @foreach ($stores as $store)
                                        <option value="{{$store->id}}"> {{ $store->name}} </option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
								<input class="input" type="text" name="sku" placeholder="Code">
                            </div>
                            <button > Buscar </button>
                        </form>
						</div>
                    </div>
                    @isset($offers)
                    @foreach ($offers as $offer)
                    <div class="product">
                        <div class="product-img">
                            <center><img src="{{ $offer->thumbnail }}" alt="" width="100px" height="100px"></center>
                            <div class="product-label">
                                @isset($offer->disc)
                                    <span class="sale">{{ $offer->disc }}</span>
                                @endisset 
                                @isset($offer->span)
                                    <span class="new">{{ $offer->span }}</span>
                                @endisset    
                            </div>
                        </div>
                        <div class="product-body">
                            {{-- <p class="product-category">{{ $offer->name }}</p> --}}
                            <h3 class="product-name"><a href="{{ $offer->link }}">{{ Str::limit($offer->name, 45) }}</a></h3>
                            <h4 class="product-price">R$ {{ $offer->price }}<del class="product-old-price">R$ {{ $offer->discount }}</del></h4>
                            <div class="product-rating">
                                @for($i = 0; $i < $offer->stars; $i++ )
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
                                    <a href="{{ $offer->link }}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> vem pra loja </button></a>
                                    </div>
                                </div>
                                @endforeach
                                @endisset
                                

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection

