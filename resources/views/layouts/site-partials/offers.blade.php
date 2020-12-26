<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- STORE -->
            <div id="store" class="col-md-12">

              <!-- store products -->
                <div class="row">
                  @foreach ($ofertas as $offer)
                    <!-- product -->
                    <div class="col-md-3 col-xs-4">
                        <div class="product">
                            <div class="product-img">
                                <center><img src="{{ $offer->thumbnail }}" alt="" width="100px" height="100px"></center>
                                {{-- <div class="product-label">
                                    <span class="sale">-30%</span>
                                    <span class="new">NEW</span>
                                </div> --}}
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $offer->category }}</p>
                                <h3 class="product-name"><a href="{{ $offer->link }}">{{ Str::limit($offer->name, 45) }}</a></h3>
                                <h4 class="product-price">R$ {{ $offer->price }}</h4>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-whatsapp"></i><span class="tooltipp">Whatsapp</span></button>
                                    <button class="quick-view" onclick="sendFace({{ $offer }})"><i class="fa fa-facebook"></i><span class="tooltipp">Facebook</span></button>
                                    <button class="quick-view"><i class="fa fa-instagram"></i><span class="tooltipp">Instagram</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <a href="{{ $offer->link }}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> vem pra loja </button></a>                            
                            </div>
                        </div>
                    </div>
                    <!-- /product -->
                  @endforeach
                  <div class="clearfix visible-sm visible-xs"></div>
                </div>
              <!-- /store products -->

            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@section('javascript')
<script>

    function sendFace(oferta){
    if (navigator.share) {
        navigator.share({
        title: 'WebShare API Demo',
        url: 'https://codepen.io/ayoisaiah/pen/YbNazJ'
        }).then(() => {
        console.log('Thanks for sharing!');
        })
        .catch(console.error);
    } else {
        // fallback
    }
        
    }

</script>
    
@stop