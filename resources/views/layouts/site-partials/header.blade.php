		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="https://is.gd/D2UzkT"><i class="fa fa-whatsapp"></i> Grupo de Ofertas</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> sac@vempraloja.com.br</a></li>
						{{-- <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li> --}}
					</ul>
					<ul class="header-links pull-right">
						{{-- <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li> --}}
						<li><a href="#"><i class="fa fa-user-o"></i> Minha Conta</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="{{ asset('vendor/site/img/logo.png')}}" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="{{ route('site.search')}}" method="GET">
									@csrf
									<input class="input" placeholder="buscar aqui" name="name" required>
									<button class="search-btn">Buscar</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								{{-- <div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Ofertas Favoritas</span>
										<div class="qty">2</div>
									</a>
								</div> --}}
								<!-- /Wishlist -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->